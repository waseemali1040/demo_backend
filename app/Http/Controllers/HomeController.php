<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\libs\Response\GlobalApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;


class HomeController extends Controller
{
    public function getUserList(){
        $users= User::all();
        $datatable = Datatables::of($users)->rawColumns(['content']);
//        return collect($datatable->make(true)->getData());
        return (new GlobalApiResponse())->success('Users list',1,collect($datatable->make(true)->getData()));

    }
 public function userCreate()
 {
    $user =  User::create([
         'name' => 'A new user',
         'email' => 'newuser'.rand(10,100).'@gmail.com',
         'password' => Hash::make(rand(1000,1000000)),
     ]);
    event(new UserCreated($user));
 }
}
