<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function profile(){
        return view('backend.profile.index', ['admin' => auth()->user()]);
    }
    public function editProfile(){
        return view('backend.profile.edit', ['admin' => auth()->user()]);
    }
    public function updateProfile(Request $request){
        $admin = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->id,
            'phone' => 'nullable|max:15',
            'country' => 'required',
            'bio' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'bio' => $request->bio,
        ]);
        if($request->hasFile('image')){
            $image =  uploadImage($request->image);
            $admin->update([
                'image' => $image,
            ]);
        }
        return back();
    }
}
