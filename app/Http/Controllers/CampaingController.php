<?php

namespace App\Http\Controllers;

use App\Models\Campaing;
use Illuminate\Http\Request;

class CampaingController extends Controller
{
    public function index()
    {

        $campings = Campaing::all();

        return view('campaings.home-campaing', compact('campings'));
    }

}
