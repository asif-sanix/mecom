<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    public function VendorDashboard(){

        return view('vendor.dashboard');

    }

    public function profile(Request $request)
    {
       $user = Auth::user();
       return view('vendor.auth.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->file('avatar')){

            $media_rename = $user->username .".".$request->file('avatar')->getClientOriginalExtension();

            $image = $request->file('avatar')->storeAs('admin/profile', $media_rename);

            $user->avatar = 'storage/'.$image;

        }
        $user->save();
        return redirect()->route('vendor.profile')->with(['class'=>'success','message'=>'Profile Updated Successfully.']);
    }

    public function passwordUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return redirect()->back()->with(['class'=>'error','message'=>'New password and current password not match']);
        }

        // Update The new password 
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('vendor.profile')->with(['class'=>'success','message'=>'Password Changed Successfully.']);;
    }

    public function login(){
        return view('vendor.auth.login');
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('vendor.login');
    }
}
