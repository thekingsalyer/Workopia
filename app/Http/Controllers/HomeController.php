<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\View\View;

class HomeController extends Controller
{
public function index(): View 
{
     // @desc    Show home index view
    // @route   GET /
    $jobs =Job::latest()->limit(6)->get();
    return view('pages.index')->with('jobs',$jobs);

}
}
