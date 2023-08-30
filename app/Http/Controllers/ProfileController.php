<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $validatedData = $request->validate([
            // 'nik' => ['numeric', 'unique:users,nik,' . $user->id],
            'name' => ['string'],
            // 'email' => ['email', 'unique:users,email,' . $user->id],
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img/photos'), $photoName);
            $validatedData['photo'] = 'img/photos/' . $photoName;
        }

        $validatedData['phone'] = $request->phone;
        $validatedData['gender'] = $request->gender;
        $validatedData['phone'] = $request->phone;
        $validatedData['place_of_birth'] = $request->place_of_birth;
        $validatedData['date_of_birth'] = $request->date_of_birth;
        $validatedData['address'] = $request->address;
        $user->update($validatedData);

        return redirect()->route('profile')->with('success', 'Profil berhasil diubah!');
    }

    public function changePassword(Request $request)
    {
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with('failed', 'Password lama salah!');
        }

        if (Hash::check($request->new_password, Auth::user()->password)) {
            return back()->with('failed', 'Password baru tidak boleh sama dengan sebelumnya!');
        }

        $user = User::findOrFail(Auth::user()->id);
        $user->password = bcrypt($request->new_password);
        $user->update();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
