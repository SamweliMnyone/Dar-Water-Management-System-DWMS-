<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TechnicianController extends Controller
{
    public function techDashboard(){

        $id = Auth::id(); // Get the authenticated user's ID

        if (!$id) {
            // Handle the case where the user is not authenticated
            return redirect('/login')->with('message', 'You need to log in first.');
        }
        $administratorData = User::find($id); // Find the admin data
        
        return view('frontend.technician.child',compact('administratorData'));
    }


    public function logout(Request $request){
        // Get the currently authenticated user
        $user = Auth::user();

        // Delete all tokens associated with this user
        if ($user) {
            $user->tokens()->delete();
        }


        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        $request->session()->flush();

        // Clear browser cache using headers
        $response = redirect('/');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        // Redirect to login page
        return $response;
    }


    public function techProfile(){
        $id = Auth::id(); // Get the authenticated user's ID
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.technician.technician_profile',compact('administratorData'));
    }


    public function techProfileUpdate(Request $request) {
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


    public function techPasswordUpdate_view(Request $request) {
        $id = Auth::id(); // Get the authenticated user's ID
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.technician.changepassword',compact('administratorData'));
    }

    public function techPasswordUpdate(Request $request) {
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

    public function schedule()   {

        $id = Auth::id(); // Get the authenticated user's ID

        if (!$id) {
            // Handle the case where the user is not authenticated
            return redirect('/login')->with('message', 'You need to log in first.');
        }
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.technician.schedule',compact('administratorData'));
    }

    public function report_view(){
        $id = Auth::id(); // Get the authenticated user's ID

        if (!$id) {
            // Handle the case where the user is not authenticated
            return redirect('/login')->with('message', 'You need to log in first.');
        }
        $administratorData = User::find($id); // Find the admin data

        return view('frontend.technician.report',compact('administratorData'));
    }


    public function submit(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'region' => 'required|string|max:255',
        'ward' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'start' => 'required|date',
        'finish' => 'required|date|after_or_equal:start',
        'explproblem' => 'required|string',
        'labour' => 'required|string',
        'labour_cost' => 'required|numeric|min:0',
        'tools' => 'required|string',
        'tools_cost' => 'required|numeric|min:0',
    ]);

    try {
        // Get the currently authenticated user
        $user = Auth::user();

        // Create a new report and associate it with the authenticated user
        $user->reports()->create([
            'region' => $request->region,
            'ward' => $request->ward,
            'description' => $request->description,
            'start' => $request->start,
            'finish' => $request->finish,
            'explproblem' => $request->explproblem,
            'labour' => $request->labour,
            'labour_cost' => $request->labour_cost,
            'tools' => $request->tools,
            'tools_cost' => $request->tools_cost,
        ]);

        // Return a success notification
        $notification = [
            'message' => 'Report submitted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('techDashboard')->with($notification);

    } catch (\Exception $e) {
        // Return an error notification
        $notification = [
            'message' => 'Failed to submit the report. Please try again.',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }
}




public function viewReports()
{
    $id = Auth::id(); // Get the authenticated user's ID
    
    if (!$id) {
        // Handle the case where the user is not authenticated
        return redirect('/login')->with('message', 'You need to log in first.');
    }
    $administratorData = User::find($id);

    // Fetch reports with pagination, for example, 10 reports per page
    $reports = Report::where('user_id', Auth::id())->paginate(10);

    // Pass the paginated reports to the view
    return view('frontend.technician.view_reports', compact('reports','administratorData'));
}


                public function rep_show($id)
                {
                    $userId = Auth::id(); // Get the authenticated user's ID

                    if (!$userId) {
                        // Handle the case where the user is not authenticated
                        return redirect('/login')->with('message', 'You need to log in first.');
                    }

                    $administratorData = User::find($userId);
                    // Fetch the report by ID
                    $report = Report::findOrFail($id);

                    // Return the view with the report data
                    return view('frontend.technician.see_report', compact('report', 'administratorData'));
                }

}

