<?php

namespace App\Http\Controllers;

use App\RoleType;
use App\GenderType;
use App\MembershipStatus;
use App\MemberType;
use App\Models\User;
use App\Models\InfoGym;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    public function index()
    {
        $info_gym = InfoGym::first();
        return view('home', compact('info_gym'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:rfc,dns', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
            'name' => ['required', 'min:3'],
            'gym_package_id' => ['required', 'exists:gym_packages,id'],
            'gender' => ['required', 'exists:' . GenderType::class . ',value'],
            'member_type' => ['required', 'exists:' . MemberType::class . ',value'],
            'no_whatsapp' => ['required', 'min:10'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => "Password minimal %s karakter",
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.min' => "Konfirmasi password minimal %s karakter",
            'name.required' => 'Nama wajib diisi',
            'name.min' => "Nama minimal %s karakter",
            'gym_package_id.required' => 'Paket wajib dipilih',
            'gym_package_id.exists' => 'Paket tidak ditemukan',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'gender.exists' => 'Jenis kelamin tidak ditemukan',
            'member_type.required' => 'Jenis member wajib dipilih',
            'member_type.exists' => 'Jenis member tidak ditemukan',
            'no_whatsapp.required' => 'No Whatsapp wajib diisi',
            'no_whatsapp.min' => "No Whatsapp minimal %s karakter",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole(RoleType::USER->value);

        Membership::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'member_type' => $request->member_type,
            'join_date' => now(),
            'expired_date' => now(),
            'no_whatsapp' => $request->no_whatsapp,
            'status' => MembershipStatus::NEW ->value,
        ]);

        return redirect()->route('home.success')->with('success', 'Pendaftaran berhasil');
    }
}
