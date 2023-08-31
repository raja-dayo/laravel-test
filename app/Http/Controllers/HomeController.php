<?php

namespace App\Http\Controllers;
use App\Models\Consignment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $data = Consignment::all();
        
        return view('home.index',compact('data'));
    }
}