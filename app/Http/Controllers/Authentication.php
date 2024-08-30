<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;// Import the LoginRequest class

class Authentication extends Controller
{
    public function index(){
        return view('frontend.HomeTemplate.index');
    }

    public function register_view(){
        return view('frontend.HomeTemplate.register');
    }
    
    public function login_view(){
        return view('frontend.HomeTemplate.login');
    }

    public function forgotpassword_view(){
        return view('frontend.HomeTemplate.forgotpassword');
    }

    

        //Method for admiministrator to Login
        public function loginsubmit(LoginRequest $request): RedirectResponse {
            // Attempt to authenticate the user
            try {
                $request->authenticate();
                $request->session()->regenerate();
                $user = $request->user();
        
                $notification = [
                    'message' => 'Successfully logged in',
                    'alert-type' => 'success'
                ];
        
                // Redirect based on user role
                if ($user->role === 'administrator') {
                    return redirect()->intended('/administrator/dashboard')->with($notification);
                }
                elseif($user->role === 'technician') {
                    return redirect()->intended('/technician/dashboard')->with($notification);
                }
                 elseif($user->role === 'engineer') {
                    return redirect()->intended('/engineer/dashboard')->with($notification);
                 }
        
                // Default redirection
                return redirect()->intended('/login')->with($notification);
        
            } catch (ValidationException $e) {
                // Set notification for authentication failure
                $notification = [
                    'message' => 'Incorrect email or password',
                    'alert-type' => 'error'
                ];
        
                // Redirect back with error notification
                return redirect()->back()
                                 ->withErrors(['email' => 'Invalid credentials'])
                                 ->withInput()
                                 ->with($notification);
            }
        }
         //Method to Register Users
         public function registersubmit(Request $request){
             // Validate input
             $validator = Validator::make($request->all(), [
                 'name' => 'required|string|max:255',
                 'email' => 'required|email|unique:users,email',
                 'phone' => 'required|numeric|digits_between:10,15',
                 'address' => 'required|string|max:255',
                 'password' => 'required|min:8',
             ]);
         
             if ($validator->fails()) {
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
         
             $notification3 = [
                 'message' => 'Successfully Registered',
                 'alert-type' => 'success'
             ];
         
             return redirect()->route('login_view')->with($notification3);
         }

        
}
