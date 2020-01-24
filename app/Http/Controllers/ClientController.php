<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Client;
use App\Pet;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Config;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::all();
        return view('office/clients/index',$data);
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $pets = Pet::where("clientId",$id)->with("Appointments")->get();
        $appointments = [];

        $data['client'] =$client;
        $data['pets'] = $pets;

        foreach($pets as $pet){

        $futureAppointments = Appointment::where('petId', $pet->id)->orderBy('date','desc')->get();
            foreach($futureAppointments as $app){
                $appointments[] = [
                    "date" => $app->date,
                    "time" => $app->time,
                    "pet" => $pet->name,
                    "status" => $app->status,
                    "notes" => $app->notes,
                    "comments" => $app->clientComments
                ];
            }
        }


        $data['appointments'] = $appointments;

        return view('office/clients.edit', $data);
    }

    public function create()
    {
        $pets = null;
        return view('office/clients.create', compact('pets'));
    }

    public function store(Request $request){
        $Client = new Client();

        $Client->first_name = $request->first_name;
        $Client->last_name = $request->last_name;
        $Client->birth_date = $request->birth_date;
        $Client->genre = $request->genre;

        $Client->email = $request->email;
        $Client->phone2 = $request->phone2;

        $Client->address = $request->address;
        $Client->city = $request->city;
        $Client->notes = $request->notes;

        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Client->avatar);
            $Client->avatar = 'public/uploads/images/'. $filename;
        }

        $Client->save();
        return redirect('clients')->with('Message','Card created successfully');
    }

    public function update(Request $request, $id)
    {
        $Client = Client::findOrFail($id);
        $Client->first_name = $request->first_name;
        $Client->last_name = $request->last_name;
        $Client->birth_date = $request->birth_date;
        $Client->genre = $request->genre;

        $Client->email = $request->email;
        $Client->phone2 = $request->phone2;

        $Client->address = $request->address;
        $Client->city = $request->city;
        $Client->notes = $request->notes;


        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/images/', $filename);
            File::delete($Client->avatar);
            $Client->avatar = 'uploads/images/'. $filename;
        }

        $Client->save();
        return redirect('clients')->with('Message','Card created successfully');
        return view('clients');
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('clients')->with('Message','Card deleted successfully');
    }



}
