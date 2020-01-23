<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Client;
use App\Pet;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::all()->count();
        $data['pets'] = Pet::all()->count();
        $data['appointments'] = Appointment::where('date', '>=', NOW())->get();

        // dd($data['appointments']->count());

        return view('office/index',$data);
    }



}
