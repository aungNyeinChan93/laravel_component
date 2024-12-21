<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index(){
        $users = User::latest()->simplePaginate(5);
        return view('user.index',compact('users'));
    }
}
