<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $fundService;

    public function __construct(UserService $userFundsService)
    {
        $this->fundService = $userFundsService;
    }

    public function depositView()
    {
        return view('wallet');
    }

    public function depositAmount(Request $request): RedirectResponse
    {
        $this->fundService->addUserBalance($request['amount']);

        return redirect(route('balance.deposit'));
    }
}
