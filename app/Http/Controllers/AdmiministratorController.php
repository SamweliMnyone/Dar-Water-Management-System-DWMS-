<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdmiministratorController extends Controller
{

            public function index(){

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id); // Find the admin data
                $count_technician = User::where('role', 'technician')->count();
                $count_engineer = User::where('role', 'engineer')->count();
                $count_administrator = User::where('role', 'administrator')->count();

                return view('frontend.administrator.child',compact('administratorData','count_technician','count_administrator','count_engineer'));
            }

            //Method to Logout Adminstrator Dashboard   
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

            //Method to update Administrator profile
            public function AdministratorProfile(){

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id); // Find the admin data

                return view('frontend.administrator.administrator_profile',compact('administratorData'));
            }


            public function admin_schedule(){

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id); // Find the admin data

                return view('frontend.administrator.schedule',compact('administratorData'));
            }

            // Store a new event
            public function store(Request $request)
                {
                    $event = Event::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    return response()->json($event);
                }


                public function AD_index()
                {
                    // Fetch all events
                    return response()->json(Event::all());
                }
                
                public function AD_store(Request $request)
                {
                    $event = Event::create($request->all());
                    return response()->json($event);
                }
                
                public function AD_update(Request $request, $id)
                {
                    $event = Event::find($id);
                    $event->update($request->all());
                    return response()->json($event);
                }
                
                public function AD_destroy($id)
                {
                    $event = Event::find($id);
                    $event->delete();
                    return response()->json(['message' => 'Event deleted successfully']);
                }
                

            //Method to update Admin Profile
            public function AdministratorProfileUpdate(Request $request) {
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

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
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
            
             //Method to update Admin Password 
             public function PasswordUpdate(Request $request) {

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id); // Find the admin data

                return view('frontend.administrator.changepassword',compact('administratorData'));
             }


            public function AdministratorPasswordUpdate(Request $request) {
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

            
            public function view_tech(Request $request)   {

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id);
                $search_text = $request->input('search');
    
                $user = User::where('role', 'technician')
                            ->when($search_text, function ($query, $search_text) {
                                return $query->where('name', 'LIKE', "%{$search_text}%");
                                            //  ->orWhere('reg_no', 'LIKE', "%{$search_text}%");
                            })
                            ->paginate(6);
    
                if ($request->ajax()) {
                    return response()->json([
                        'html' => view('frontend.administrator.partials.tech_table_rows', compact('user'))->render(),
                    ]);
                }
    
                return view('frontend.administrator.view_technician', compact('administratorData', 'user', 'search_text'));
            }

            public function view_eng(Request $request)
            {

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id);
                $search_text = $request->input('search');
    
                $user = User::where('role', 'engineer')
                            ->when($search_text, function ($query, $search_text) {
                                return $query->where('name', 'LIKE', "%{$search_text}%");
                                            //  ->orWhere('reg_no', 'LIKE', "%{$search_text}%");
                            })
                            ->paginate(6);
    
                if ($request->ajax()) {
                    return response()->json([
                        'html' => view('frontend.administrator.partials.engineer_table_rows', compact('user'))->render(),
                    ]);
                }
    
                return view('frontend.administrator.view_engineer', compact('administratorData', 'user', 'search_text'));
            }

            public function view_admin(Request $request) {

                $id = Auth::id(); // Get the authenticated user's ID

                if (!$id) {
                    // Handle the case where the user is not authenticated
                    return redirect('/login')->with('message', 'You need to log in first.');
                }
                $administratorData = User::find($id);
                $search_text = $request->input('search');
    
                $user = User::where('role', 'administrator')
                            ->when($search_text, function ($query, $search_text) {
                                return $query->where('name', 'LIKE', "%{$search_text}%");
                                            //  ->orWhere('reg_no', 'LIKE', "%{$search_text}%");
                            })
                            ->paginate(6);
    
                if ($request->ajax()) {
                    return response()->json([
                        'html' => view('frontend.administrator.partials.administrator_table_rows', compact('user'))->render(),
                    ]);
                }
    
                return view('frontend.administrator.view_administrator', compact('administratorData', 'user', 'search_text'));
            }
            
            
            public function destroy($id) {
              // Attempt to find the user by ID and delete it
                    $student = User::findOrFail($id);
                    $student->delete();
            
                    // Success notification
                    $notification = [
                        'message' => 'User deleted successfully',
                        'alert-type' => 'success'
                    ];
                
            
                // Redirect back to the previous page with the notification message
                return redirect()->back()->with($notification);
            }
            
            

            public function tech_update(Request $request, $id) {
                // Validate incoming data
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                    'phone' => 'required|string|max:20',
                    'address' => 'required|string|max:255',
                ]);
            
                // Find the user by ID
                $user = User::findOrFail($id);
            
                // Check if data has changed
                $dataChanged = $user->name !== $request->name ||
                               $user->email !== $request->email ||
                               $user->phone !== $request->phone ||
                               $user->address !== $request->address;
            
                if ($dataChanged) {
                    // Update user data
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                    ]);
            
                    // Success notification
                    $notification = [
                        'message' => 'Sucessfully updated',
                        'alert-type' => 'success'
                    ];
                } else {
                    // Warning notification if no changes were made
                    $notification = [
                        'message' => 'No changes updated',
                        'alert-type' => 'warning'
                    ];
                }
            
                // Redirect back with the notification
                return redirect()->back()->with($notification);
            }
            
            



            public function add_tech(Request $request){
                            // Validate input
                        $validator = Validator::make($request->all(), [

                            'name' => 'required|string|max:255',
                            'email' => 'required|email|unique:users,email',
                            'phone' => 'required|numeric|digits_between:10,15',
                            'address' => 'required|string|max:255',
                            'password' => 'required|min:8',
                        ]);

                        if ($validator->fails()) {

                            $notification = [
                                'message' => 'Successfully Registered',
                                'alert-type' => 'error'
                            ];
                            return redirect()->back()
                                            ->withErrors($validator)
                                            ->withInput()
                                            ->with('alert-type', 'error');
                        }

                        
                        // Save the data to the database
                        $data = [
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'phone' => $request->input('phone'),
                            'address' => $request->input('address'),
                            'role'=> 'technician',
                            'password' => bcrypt($request->input('password')),

                        ];

                        User::create($data);

                        $notification = [
                            'message' => 'Successfully Registered',
                            'alert-type' => 'success'
                        ];

                        return redirect()->route('view_tech')->with($notification);
                            
           }



           public function add_admin(Request $request){
                        // Validate input
                    $validator = Validator::make($request->all(), [

                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:users,email',
                        'phone' => 'required|numeric|digits_between:10,15',
                        'address' => 'required|string|max:255',
                        'password' => 'required|min:8',
                    ]);

                    if ($validator->fails()) {

                        $notification = [
                            'message' => 'Successfully Registered',
                            'alert-type' => 'error'
                        ];
                        return redirect()->back()
                                        ->withErrors($validator)
                                        ->withInput()
                                        ->with('alert-type', 'error');
                    }

                    
                    // Save the data to the database
                    $data = [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'phone' => $request->input('phone'),
                        'address' => $request->input('address'),
                        'role'=> 'administrator',
                        'password' => bcrypt($request->input('password')),

                    ];

                    User::create($data);

                    $notification = [
                        'message' => 'Successfully Registered',
                        'alert-type' => 'success'
                    ];

                    return redirect()->route('view_tech')->with($notification);
                        
            }

           


            public function add_eng(Request $request){
                // Validate input
            $validator = Validator::make($request->all(), [

                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|digits_between:10,15',
                'address' => 'required|string|max:255',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {

                $notification = [
                    'message' => 'Successfully Registered',
                    'alert-type' => 'error'
                ];
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('alert-type', 'error');
            }

            
            // Save the data to the database
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'role'=> 'engineer',
                'password' => bcrypt($request->input('password')),

            ];

            User::create($data);

            $notification = [
                'message' => 'Successfully Registered',
                'alert-type' => 'success'
            ];

            return redirect()->route('view_tech')->with($notification);
                
    }



   }


      



