<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index(): View{
        return view('index');
    }

    public function login(Request $request): RedirectResponse{
        //almaceno los datos de entrada
        $email=$request->input('email');
        $pswd=$request->input('password');
        //realizo la consulta que cncuerde con el email
        $user=User::where('email',$email)->first();

        if ($user && Hash::check($pswd,$user->password)) {
           return redirect()->route('task.index')->with('success','Bienvenid@: '.$user->name)->with('user_id',$user->id);
        }else{
            return redirect()->route('user.index')->with('error','No se puede iniciar sesión ');
        }

    }

    public function register():View{
        return view('user.register');
    }

    public function store(Request $request): RedirectResponse{
        //gcreo usuario
        $user=new User();
        //traigo datos de la petición post
        $name=$request->input('name');
        $email=$request->input('email');
        $pswd=$request->input('password');
        //encrito pswd
        $pswdEncry=bcrypt($pswd);

        //asigno datos a objeto USER
        $user->name=$name;
        $user->email=$email;
        $user->password=$pswdEncry;

        //almaceno en la BD
        $user->save();
        return redirect()->route('user.index')->with('success','Usuario: '.$name.' creado con exito');
    }

}
