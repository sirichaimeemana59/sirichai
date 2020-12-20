<?php

namespace App\Http\Controllers;

use JWTAuth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Register\AuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;

class AuthController extends Controller
{
    public $token = true;

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'firstname' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

        if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);

        }


        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->token) {
           // return $this->login($request); Error
        }

//        return response()->json([
//            'success' => true,
//            'data' => $user
//        ], Response::HTTP_OK);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Invalid Email or Password',
//            ]);
            return redirect('/');
        }
//
//        return response()->json([
//            'success' => true,
//            'token' => $jwt_token,
//        ]);
        return view('index.home_index');
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }
}
