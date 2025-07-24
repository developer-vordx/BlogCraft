<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Services\Auth\PasswordResetService;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    protected $service;

    public function __construct(PasswordResetService $service)
    {
        $this->service = $service;
    }


    public function sendResetLink(ForgotPasswordRequest $request)
    {
        $response = $this->service->sendResetLink($request->validated());

        if ($response['success']) {

            return redirect($response['redirect'])->with('success', $response['message']);
        }
        return redirect()->route('login')->with('error', $response['message']);
    }
}
