<?php

namespace App\Http\Controllers\Admin;

use App\Charts\UserChart;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        $usersChart = new UserChart;
        
        return view("admin.dashboard", ['usersChart' => $usersChart]);
    }
}
