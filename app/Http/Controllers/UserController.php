<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('img'), $photoPath);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'photo' => $photoPath,
        ]);

        return redirect()->route('users.index')->with('success', 'user berhasil diciptakan tuan');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $filename);
            $user->photo = $filename;
        }        
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'user sudah diubah tuan');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user telah dihapus tuan');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
