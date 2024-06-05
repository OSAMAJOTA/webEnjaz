<?php

namespace App\Http\Controllers;
use App\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Account::with('children')->whereNull('parent_id')->get();
        return view('tree.tree', compact('accounts'));
    }
}
