<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Company;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /*
     * get all users
     * @return Collection
     */

    public function index()
    {
        return User::all();
    }

    /*
     * get one user
     * @param int $id
     * @return Collection
     */

    public function show($id)
    {
        return User::find($id);
    }

    /*
     * get all users applicattion
     */

    public function lists()
    {
        $users = User::getList();
        return view('users', ['users' => $users]);
    }

    /*
     * edit user
     */

    public function edit($id)
    {
        $user = User::find($id);
        $companies = Company::getList();
        return view('user-edit', ['user' => $user, 'companies' => $companies]);
    }

    /**
     * Create user
     * @param Request $request
     * @return json
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'email' => 'required|email|unique:users',
                    'company_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /*
     * new user
     */

    public function newUser()
    {
        $companies = Company::getList();
        return view('user-create', ['companies' => $companies]);
    }

    /**
     * Update user
     *
     * @param Request $request
     * @param int $id
     * @return json
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'email' => 'required|email',
                    'company_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json('User does not exist', 404);
        }
        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Delete user
     *
     * @param Request $request
     * @param int $id
     * @return json
     */
    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json('User does not exist', 404);
        }
        $user->delete();

        return response()->json(null, 204);
    }

}
