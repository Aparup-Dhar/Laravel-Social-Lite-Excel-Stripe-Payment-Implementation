<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;


class PlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plans = Plan::all();
        return view('plans', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        return view('show', compact('plan'));
    }
}
