<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all() ,
        [
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|unique:users,email|max:20',
            'password' => 'required|string|max:30|min:8',
            'role' => 'sometimes|string'
        ]);

        if($data->fails())
        {
            return response()->json(['success' => false , 'message' => 'data is not valid' , 'errors' => $data->errors()]);
        }

        $user = User::create($data);

        $user->assignRole($data['role']);

        return response()->json(['success' => true ,'user' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return response()->json(['success' => true ,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = Validator::make($request->all() ,
        [
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|unique:users,email|max:20',
            'password' => 'required|string|max:30|min:8',
            'role' => 'sometimes|string'
        ]);

        if($data->fails())
        {
            return response()->json(['success' => false , 'message' => 'data is not valid' , 'errors' => $data->errors()]);
        }

       $user->update($data);

       if($data['role'])
       {
        $user->assignRole($data['role']);
       }

        return response()->json(['success' => true ,'user' => $user]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return response()->json(['success' => true ,'message' => 'user deleted']);
    }
}
