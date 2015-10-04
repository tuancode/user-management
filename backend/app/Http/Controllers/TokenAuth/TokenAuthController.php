<?php

namespace App\Http\Controllers\TokenAuth;

use App\Exceptions\ApiException;
use App\Http\Controllers\RestfulController;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class TokenAuthController extends RestfulController
{

    protected $nameInputParams = ['email', 'password'];

    protected $rules = [
        'email'    => 'required|email|max:255',
        'password' => 'required',
    ];

    /**
     * Create token-based authentication by user information login request
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws TokenInvalidException
     * @throws \App\Exceptions\ValidationException
     */
    public function authenticate(Request $request)
    {
        $credentials = $this->getInput($request);
        $this->validator();

        if (!$token = JWTAuth::attempt($credentials))
        {
            throw new TokenInvalidException('Invalid Credentials');
        }

        return response()->json([
            'status' => 'success',
            'result' => [
                'access_token' => $token
            ]
        ]);
    }

    // TODO: To get user information from authentication
    public function getAuthenticatedUser()
    {
        if (!$user = JWTAuth::parseToken()->authenticate())
        {
            throw new ApiException('User not found', HttpResponse::HTTP_NOT_FOUND);
        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }


    // TODO: Register member for guest
    public function register(Request $request)
    {
        $credentials = $this->getInput($request);
        $this->validator();

        try
        {
            $user = User::create($credentials);
        }
        catch (Exception $e)
        {
            return response()->json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));
    }
}
