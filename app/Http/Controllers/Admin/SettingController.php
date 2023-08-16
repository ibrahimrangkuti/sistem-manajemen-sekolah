<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('pages.admin.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'school_name' => ['string'],
            'headmaster' => ['string'],
            'address' => ['string']
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('img/logo'), $logoName);
            $validatedData['logo_path'] = 'img/logo/' . $logoName;
        }

        $validatedData['email'] = $request->email;
        $validatedData['phone'] = $request->phone;
        Setting::first()->update($validatedData);

        return back()->with('success', 'Pengaturan website berhasil diubah!');
    }
}
