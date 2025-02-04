<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterationRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    public function register(UserRegisterationRequest $request) {
        try{
            $user = User::create($request->validated());
            return Response::json(["success" => true, "data" => [ "token" => $user->getLoginToken() ]]);
        }catch(Exception $e) {
            return Response::json(["success" => false, "message" => $e->getMessage()]);
        }
    }
    public function login(UserLoginRequest $request) {
        try{
            //User will always exists as as i have already checked in UserLoginRequest class
            $user = User::whereEmail($request->email)->first();
            if(!Hash::check($request->password, $user->password)){
                throw new Exception("Wrong Password!");
            }
            return Response::json(["success" => true, "data" => [ "token" => $user->getLoginToken() ]]);
        }catch(Exception $e) {
            return Response::json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    public function publicPage(Request $request){
        //user will always exists as its passed sanctum middleware
        $user = $request->user();
        $message = "Welcome, $user->name";
        return Response::json(["success" => true,"message" => $message]);
    }
}
