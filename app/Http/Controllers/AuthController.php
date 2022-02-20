<?php

namespace App\Http\Controllers;

use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class   AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
//        $this->middleware('islogged', ['except' => ['login', 'register']]);

    }


    public function login(Request $request){

        $token = $this->authService->login($request);
        $result = [
            'token' => $token,

        ];
                    return (new GlobalApiResponse())->success('Logged in Successfylly',1,$result);

//        return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::INVALID_CREDENTIALS, 'Oops, an error occurred', $this->ordersService->getErrors());


    }
    public function userdetails(Request $request){
        $data =  User::all();
        return (new GlobalApiResponse())->success('Logged in Successfylly',1,$data);

    }
}
