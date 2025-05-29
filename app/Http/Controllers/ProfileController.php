<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
{
    return view('profile.show', [
        'user' => Auth::user(),
    ]);
}

    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

   public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('profile_pictures', $filename, 'public');

        $data['profile_picture'] = $path;
    }

    $user->update($data);

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}

}
