<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserVerifiRequest;
use App\Mail\ConfirmEmail;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function createUser(UserRequest $request)
    {
        try {
            if (User::create($request->validated())) {
                return response()->json([
                    'status' => true,
                    'code' => 201,
                    'message' => "User Created Successfully!",
                ], 201);
            }
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                'code' => 422,
            ], 422);
        }
    }

    public function verifyUser(UserVerifiRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user && $request->validated()) {
                    $data = $request->validated();
                    if ($user->email_verified_at === null) {
                        $conf = new ConfirmEmail();
                        $token = md5(time() . $request->firstName . $request->lastName);
                        $data['email_verified_token'] = $token;
                        Mail::to($data['email'])->send($conf->with(['token' => $token]));
                    }
                    $user->update($data);
                    return response()->json([
                        'status' => true,
                        'code' => 201,
                        'message' => "User Created Successfully!",
                        'data' => $user
                    ]);
            } else  return response()->json([
                "status" => false,
                'code' => 422,
                "message" => "User Not Found"
            ], 422);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                'code' => 423,
                "message" => $exception->getMessage()
            ], 423);
        }
    }

    public function confirmEmail($token)
    {
        try {
            $user = User::where(['email_verified_token' => $token])->first();
            if ($user) {
                $user->email_verified_at = now();
                $user->verified_user = 3;
                $user->update();
                return view("Email.confirmed");

            } else return response()->json([
                "status" => false,
                'code' => 422,
                "message" => "User Not Found"
            ], 422);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => false,
                'code' => 423,
                "message" => $exception->getMessage()
            ], 423);
        }
    }

    public function approveVerificationUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->verified_user = 1;
            if ($user->update()) {
                return response()->json([
                    "status" => true,
                    'code' => 201,
                    "message" => "User Verified",
                    "data" => $user
                ], 201);
            } else return response()->json([
                "status" => false,
                'code' => 423,
                "message" => "Something vent wrong!"
            ], 423);
        } else  return response()->json([
            "status" => false,
            'code' => 422,
            "message" => "User Not Found"
        ], 422);
    }

    public function approveVerificationDriver($id)
    {
        $driver = User::find($id);
        if ($driver) {
            $driver->verified_user = 1;
            if ($driver->update()) {
                return response()->json([
                    "status" => true,
                    'code' => 201,
                    "message" => "User Verified",
                    "data" => $driver
                ], 201);
            } else return response()->json([
                "status" => false,
                'code' => 423,
                "message" => "Something vent wrong!"
            ], 423);
        } else  return response()->json([
            "status" => false,
            'code' => 422,
            "message" => "Driver Not Found"
        ], 422);
    }

    public function auth(AuthRequest $request)
    {
        if ($request->validated()) {
            $user = User::where('phone', $request->phone)->first();
            if (!$user) return response()->json(['status' => false, 'message' => 'Wrong Phone number'], 401);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['status' => false, 'message' => 'Wrong Password'], 401);
            }
            $token = $user->createToken('Bearer')->plainTextToken;
            return response()->json([
                'type' => 'Bearer',
                'token' => $token,
            ]);
        }
    }

    public function login()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(["status" => true,"message" => "Log outed!"]);
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        Auth::user()->currentAccessToken()->delete();
        User::destroy($user->id);
        return response()->json(["status" => true,"message" => "User Deleted!"]);
    }

}
