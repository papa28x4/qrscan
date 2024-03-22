<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cache;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    public function show(User $user)
    {
        // auth()->user()->notifications->where('id', $user->notification_id)->markAsRead();
        return view('backend.users.show', compact('user'));
    }

    public function create()
    {
        $types = User::$EMPLOYEESTATUS;
        $departments = Department::all();
        return view('backend.users.create', compact('departments', 'types'));
    }

    public function store(ProfileRequest $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filenameWithExt = $file->getClientOriginalName();
            $path_info = pathinfo($filenameWithExt);
            $filename = str::slug(time() .'-'. $path_info['filename']).'.'.$path_info['extension'];
            $avatar = Storage::putFileAs('user/avatar', $file, $filename);
        }else{
            $avatar = null;
        }

        // return [$avatar, $path];
        $input = array_merge(
            $request->validated(),
            [
               'avatar' => $avatar,
               'password' => Hash::make('12345678')
            ]
        );

        User::create($input);

        return redirect()->route('users.index')->with('profile-updated', "User Profile has been created");
    }

    public function edit(User $user)
    {
        // returns $user;
        $types = User::$EMPLOYEESTATUS;
        $departments = Department::all();
        return view('backend.users.edit', compact('user', 'departments', 'types'));
    }

    public function editProfile()
    {
        return view('backend.users.edit-profile');
    }

    public function update(ProfileRequest $request, User $user)
    {

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filenameWithExt = $file->getClientOriginalName();
            $path_info = pathinfo($filenameWithExt);
            $filename = str::slug(time() .'-'. $path_info['filename']).'.'.$path_info['extension'];
            $avatar = Storage::putFileAs('user/avatar', $file, $filename);
        }else{
            $avatar = $user->avatar;
        }

        // return [$avatar, $path];
        $update = array_merge(
            $request->validated(),
            [
               'avatar' => $avatar
            ]
        );

        $user->update($update);

        return redirect()->route('users.edit', $user->slug)->with('profile-updated', "Profile has been successfully updated");
    }

    public function updateProfile(ProfileRequest $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filenameWithExt = $file->getClientOriginalName();
            $path_info = pathinfo($filenameWithExt);
            $filename = str::slug(time() .'-'. $path_info['filename']).'.'.$path_info['extension'];
            $avatar = Storage::putFileAs('user/avatar', $file, $filename);
        }else{
            $avatar = auth()->user()->avatar;
        }

        // return [$avatar, $path];
        $update = array_merge(
            $request->validated(),
            [
               'avatar' => $avatar
            ]
        );

        $request->user()->update($update);
        return redirect()->route('user.profile.edit')->with('profile-updated', "Your profile has been successfully updated");
    }

    public function editPassword(){
        return view('backend.users.edit-password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'confirm_new_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('user.password.edit')->with('password-updated', "Password update successful");
    }

     /**
     * Show user online status.
     *
     */
    public function userOnlineStatus()
    {
        $users = User::all();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }
}
