<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('administrador')->only(['create', 'store', 'destroy']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = new User($request->all());
        $user->password = Hash::make($user->password);
        try{
            $result = $user->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($user -> id > 0) {
            $response = ['op' => 'store', 'r' => $result, 'id' => $user->id];
            return redirect('backend/usuario')->with($response);
        } else {
            return back() -> withInput()->with(['error' => 'algo ha fallado']);
            //return back() -> withInput()->withErrors(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $current_user = request()->user();
        if($current_user->id != $user->id && $user->id == 2) {
            return redirect('backend/usuario');
        }
        return view('backend.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $current_user = request()->user();
        if($current_user->id != $user->id && $user->id == 1) {
            return redirect('backend/usuario');
        }
        $this->validatorEdit($request->all(), $user->id)->validate();
        $result = $user->update($request->all());
        $user->email = $request->email;
        $user->name = $request->name;
        if($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        try {
            $user->save;
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['usererror' => '...']);
        }
        $response = ['op' => 'update', 'r' => $result, 'id' => $user->id];
        return redirect('backend/usuario')->with($response);
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $current_user = request()->user();
        $result = 0;
        if($current_user->id != $user->id && $user->id != 1) {
            try {
                $result = $user->delete();
            } catch(\Exception $e) {
                $result = 0;
            }
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => 'no lo uso'];
        return redirect('backend/usuario')->with($response);
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
    
    protected function validatorEdit(array $data, $id)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);
    }
}