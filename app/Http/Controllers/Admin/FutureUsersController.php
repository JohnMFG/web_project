<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FutureUsersController extends Controller
{
    function list(){
        $data = Http::get('https://60ae3b9680a61f0017332c7c.mockapi.io/users')->json();
        return view('admin/future_users', ['data'=>$data]);
    }
}
