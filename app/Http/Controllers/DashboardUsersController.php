<?php

namespace App\Http\Controllers;

// use Log;
use App\Models\User;
// use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'title' => 'User Account',
            'active' => 'My Account', 
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit Profile',
            'active' => 'My Account',
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Debugging statement to check if the method is called
        // Log::info('Update method called for user: ' . $user->id);

        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:10,13',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'gender' => 'required'
        ];

        $validatedData = $request->validate($rules);

        // try {
        //     $validatedData = $request->validate($rules);
        //     // Debugging statement to check if validation passes
        //     Log::info('Validation passed for user: ' . $user->id);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Log validation errors
        //     Log::error('Validation failed for user: ' . $user->id, $e->errors());
        //     return redirect()->back()->withErrors($e->errors())->withInput();
        // }

        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete($user->photo);
            }

            $validatedData['photo'] = $request->file('photo')->store('profile-photos');
        }

        if($request->username) {
            $validatedData['username'] = $request->username;
        }

        if($request->email) {
            $validatedData['email'] = $request->email;
        }

        if($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        User::where('id', Auth::user()->id)->update($validatedData);

        // Debugging statement to check if update is successful
        // Log::info('User updated: ' . Auth::user()->id);
        
        return redirect('/dashboard')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->photo) {
            Storage::delete($user->photo);
        }

        User::destroy(Auth::user()->id);

        return redirect('/')->with('success', 'User account has been deleted!');
    }

    public function Allusers() {
        Gate::authorize('viewAny', User::class);

        $users = User::all();

        return view('dashboard.admin.users.index', [
            'title' => 'All Users',
            'active' => 'All Users',
            'users' => $users
        ]);
    }

    public function Adminedituser(User $user) {
        Gate::authorize('update', $user);

        return view('dashboard.admin.users.edit', [
            'title' => 'Edit User',
            'active' => 'All Users',
            'user' => $user
        ]);
    }

    public function Adminupdateuser(Request $request, User $user) {
        Gate::authorize('update', $user);

        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:10,13',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'gender' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete($user->photo);
            }

            $validatedData['photo'] = $request->file('photo')->store('profile-photos');
        }

        if($request->username) {
            $validatedData['username'] = $request->username;
        }

        if($request->email) {
            $validatedData['email'] = $request->email;
        }

        if($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $valid = User::where('id', $user->id)->update($validatedData);

        if($valid) {
            return redirect()->route('dashboard.admins.users.index')->with('success', 'User updated successfully!');
        }
        else {
            return redirect()->back()->withInput()->withErrors($validatedData);
        }

    }
}
