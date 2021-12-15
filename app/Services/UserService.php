<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getFundsOfUser(): int
    {
        return Auth::user()->getBalance();
    }

    public function addUserBalance($amount): void
    {
        Auth::user()->addBalance($amount);
        Auth::user()->save();
    }

    public function decreaseUserBalance($amount): void
    {
        Auth::user()->decreaseBalance($amount);
        Auth::user()->save();
    }
}
