<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendees = Attendee::all();

        return view('attendees.dashboard', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:attendees,email',
            'approved' => 'required',
            'member_since' => 'required',
        ]);

        Attendee::create($request->all());

        return redirect()->route('attendees.index')
            ->with('success','Attendee created successfully.');


    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        return redirect()->route('attendees.index')
            ->with('delete','Attendee deleted successfully');
    }
}
