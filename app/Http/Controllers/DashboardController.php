<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CommunityEvent;

class DashboardController extends Controller
{
   public function index(){
    $events = CommunityEvent::all();
    return view('dashboard',compact('events'));
}
}
