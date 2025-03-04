<?php

namespace App\Http\Controllers;

use App\LogMembershipStatusType;
use Illuminate\View\View;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\LogMembership;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard');
    }
}
