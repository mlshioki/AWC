<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{

    public function index(Resquest $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate($qtd_por_pagina);
        return view('users.index', compact('data'))->
        with('i', ($request->input('page',1)-1)* $qtd_por_pagina);
    }

 
    public function create()
    {   
        //lista a paginacao por nome
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact($roles));
    }


    public function store(Request $request)
    {
        //armazena os dados do usuario
        $this->validate($request, 
                        ['name'=> 'required',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|same:confirm-password',
                        'roles' => 'required']);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('sucess', 'Usuario criado com sucesso');


    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

  
    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'usuario removido com sucesso');
    }
}
