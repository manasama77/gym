<?php

namespace App\Http\Controllers;

use Exception;
use App\RoleType;
use App\GenderType;
use App\MemberType;
use App\Models\User;
use App\Models\InfoGym;
use App\MembershipStatus;
use App\Models\GymPackage;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Validation\ValidationException;

class LandingController extends Controller
{
    public function index()
    {
        $info_gym = InfoGym::first();
        return view('home', compact('info_gym'));
    }

    public function store(RegistrationRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

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

            DB::commit();
            return response()->json(['success' => 'Pendaftaran berhasil'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function success()
    {
        return view('registration_success');
    }

    public function gym_package(Request $request)
    {
        if (!$request->member_type) {
            return response()->json([]);
        }

        $gym_packages = GymPackage::where('member_type', $request->member_type)->get();
        return response()->json($gym_packages);
    }
}
