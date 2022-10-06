<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $data['total_posts'] = count(Post::all());
        $data['total_categories'] = count(Category::all());
        $data['total_tags'] = count(Tag::all());
        $data['total_users'] = count(User::all());
        $data['posts'] = Post::with('user:id,name', 'category', 'tags')->latest('updated_at')->take(10)->get();
        $data['last_updated'] = Post::latest('updated_at')
        ->first()->updated_at;
        return view('backend.dashboard', $data);
    }

    public function profile()
    {
        alertUserCanNot('view.admin');
        return view('backend.profile.index', ['admin' => auth()->user()]);
    }
    public function editProfile()
    {
        abortIf('edit.admin');
        return view('backend.profile.edit', ['admin' => auth()->user()]);
    }
    public function updateProfile(Request $request)
    {
        abortIf('update.admin');
        $admin = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|max:15',
            'country' => 'required',
            'bio' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $data = $admin->update($request->except('image', '_token'));
        if ($request->hasFile('image')) {
            $image =  uploadImage($request->image, $admin->image);
            $admin->update([
                'image' => $image,
            ]);
        }
        if($data) flashSuccess('Profile Updated Successfully!');
        return back();
    }

    public function editProfilePassword()
    {
        abortIf('edit.admin');
        return view('backend.profile.edit-password');
    }
    public function updateProfilePassword(Request $request)
    {
        abortIf('update.admin.pass');
        $request->validate(
            [
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required', 'min:6', 'max:50'],
                'new_confirm_password' => ['required', 'same:new_password'],
            ],
            [
                'required' => 'The :attribute field can not be blank.',
            ]
        );

        $data = User::find(auth()->user()->id)->update(['password' => bcrypt($request->new_password)]);
        if($data) flashSuccess('Password Updated Successfully!');
        return back();
    }
}
