<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $filename = "";
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalName();
            $filename = time().'_'.$extention;
            $file->move('uploads/avatar/',$filename);
        }

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            
            'avatar' => $filename
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);
    }
}