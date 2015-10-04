<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class UserController extends RestfulController
{

    protected $nameInputParams = ['firstName', 'lastName', 'email', 'password'];

    protected $rules = [
        'firstName' => 'required|max:255',
        'lastName'  => 'required|max:255',
        'email'     => 'required|email|max:255|unique:users',
        'password'  => 'required|min:6',
    ];

    /**
     * Display a listing of user.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = (empty($request->input('limit'))) ? 5 : $request->input('limit');
        $user  = User::paginate($limit);

        return $this->responseApi($user->toArray());
    }

    /**
     * Store a newly created user in database.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->getInput($request);
        $this->validator();

        $user            = new User;
        $user->firstName = $request->input('firstName');
        $user->lastName  = $request->input('lastName');
        $user->email     = $request->input('email');
        $user->password  = bcrypt($request->input['password']);
        if ($user->save())
        {
            return $this->responseApi();
        }
    }

    /**
     * Display user information.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws ApiException
     */
    public function show($id)
    {
        if (!$user = User::find($id, ['id', 'firstName', 'lastName', 'email']))
        {
            throw new ApiException("User does not exist", HttpResponse::HTTP_NOT_FOUND);
        }

        return $this->responseApi($user);
    }

    /**
     * Update user in database
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws ApiException
     * @throws \App\Exceptions\ValidationException
     */
    public function update(Request $request, $id)
    {
        if (!$user = User::find($id))
        {
            throw new ApiException("User does not exist", HttpResponse::HTTP_NOT_FOUND);
        }

        $this->rules['email']    = 'required|email|max:255';
        $this->rules['password'] = 'min:6';
        $this->getInput($request);
        $this->validator();

        $user->firstName = $request->input('firstName');
        $user->lastName  = $request->input('lastName');
        $user->email     = $request->input('email');
        if ($request->input['password'])
        {
            $user->password = bcrypt($request->input['password']);
        }

        if ($user->save())
        {
            return $this->responseApi();
        }
    }

    /**
     * Remove user from database
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws ApiException
     */
    public function destroy($id)
    {
        if (!$user = User::find($id))
        {
            throw new ApiException("User does not exist", HttpResponse::HTTP_NOT_FOUND);
        }

        if ($user->delete())
        {
            return $this->responseApi();
        }
    }
}
