<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EngineerController extends Controller
{
    public function engineerDashboard(){

        $id = Auth::id(); // Get the authenticated user's ID

        if (!$id) {
            // Handle the case where the user is not authenticated
            return redirect('/login')->with('message', 'You need to log in first.');
        }
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.engineer.child',compact('administratorData'));
    }

    public function eng_schedule(){

        $id = Auth::id(); // Get the authenticated user's ID

        if (!$id) {
            // Handle the case where the user is not authenticated
            return redirect('/login')->with('message', 'You need to log in first.');
        }
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.engineer.schedule',compact('administratorData'));
    }

    
    //Method to Logout Adminstrator Dashboard   
    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //Hapa unaweka path kwamba hio logout imdirect wapi
        return redirect('/login');
    }

    public function engineerProfile(){
        $id = Auth::id(); // Get the authenticated user's ID
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.engineer.engineer_profile',compact('administratorData'));
    }


    public function engineerProfileUpdate(Request $request) {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|numeric|digits_between:1,10|min:10',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional: Validate photo upload
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert-type', 'error');
        }

        // Get the authenticated user's ID
        $id = Auth::user()->id;
        $adminUpdate = User::find($id);
        $changes = false;

        // Check and track changes
        if ($adminUpdate->name !== $request->name) {
            $adminUpdate->name = $request->name;
            $changes = true;
        }

        if ($adminUpdate->email !== $request->email) {
            $adminUpdate->email = $request->email;
            $changes = true;
        }

        if ($adminUpdate->phone !== $request->phone) {
            $adminUpdate->phone = $request->phone;
            $changes = true;
        }

        if ($adminUpdate->address !== $request->address) {
            $adminUpdate->address = $request->address;
            $changes = true;
        }

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $adminUpdate->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $adminUpdate->photo = $filename;
            $changes = true;
        }

        // Handle no changes scenario
        if (!$changes) {
            return redirect()->back()->with('message', 'No any changes occurs!!!')
                                ->with('alert-type', 'warning');
        }

        // Save the updated user model
        $adminUpdate->save();

        // Notify success
        return redirect()->back()->with('message', 'Admin Profile Updated Successfully')
                                ->with('alert-type', 'success');
    }


    public function PasswordUpdate_view(Request $request) {
        $id = Auth::id(); // Get the authenticated user's ID
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.engineer.changepassword',compact('administratorData'));
    }

    public function engPasswordUpdate(Request $request) {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get authenticated user
        $user = Auth::user();

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except(['current_password', 'new_password', 'new_password_confirmation']))
                ->with('alert-type', 'error');
        }

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->withInput($request->except(['current_password', 'new_password', 'new_password_confirmation']))
                ->with('alert-type', 'error');
        }

        // Check if new password is different from the current password
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()
                ->with('message', 'No changes detected. New password cannot be the same as the current password.')
                ->with('alert-type', 'warning');
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        $notification = [
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        ];

        // Redirect back to the previous page with the notification message
        return redirect()->back()->with($notification);
    }

    public function engineerIndex()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You need to log in first.');
        }
    
        $id = Auth::id(); // Get the authenticated user's ID
        $administratorData = User::find($id); // Find the admin data
    
        // Retrieve all reports with pagination
        $reports = Report::with('technician') // Assuming a relationship named 'technician'
                    ->paginate(10);
    
        // Return the view with the reports and administrator data
        return view('frontend.engineer.approve_report', compact('reports', 'administratorData'));
    }

    public function updateStatus($id)
        {
            $report = Report::findOrFail($id);
            $report->status = 'Approved'; // Update to the desired status
            $report->save();

            return redirect()->back()->with('message', 'Report status updated successfully.');
        }

        
            public function show($id)
            {
                $report = Report::find($id);
            
                if (!$report) {
                    return response()->json(['error' => 'Report not found'], 404);
                }
            
                return response()->json($report);
        }
        
    
}
