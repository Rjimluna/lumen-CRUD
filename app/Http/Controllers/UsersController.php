<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllUsers() {
        return response()->json(Users::all());
    }

    public function showOneUser($id) {
        return response()->json(Users::find($id));
    }

    public function create(Request $request) {
        //validation
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);

        $users = Users::create($request->all());
        return response()->json($users, 201);
    }

    public function update($id, Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);

        $users = Users::findOrFail($id);
        $users->update($request->all());
        return response()->json($users, 200);
    }

    public function delete($id) {
        Users::findOrFail($id)->delete();
        return response('Deleted successfully', 200);
    }
}
