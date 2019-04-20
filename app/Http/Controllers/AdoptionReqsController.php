<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AdoptionReq;
use App\Animal;

class AdoptionReqsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            if(Auth::user()->access_level > 0) {
                $requests = AdoptionReq::orderBy('status', 'asc')->get();
                $animals = Animal::all();
                return view('adoptions.index')->with('requests', $requests, 'animals', $animals);
              }
                  else{
                    return redirect('/')->with('error', 'Must be Admin');
                }
            }
            else{
                return redirect('/')->with('error', 'Must be Admin');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($animal_id)
    {
        if(Auth::check()){ 
            $request = new AdoptionReq();
            $request->animal_id = (int) $animal_id;
            $request->user_id = (int) Auth::id();
            $request->status = 0;
            $activeReqs = AdoptionReq::where('user_id', '=', $request->user_id)->where('animal_id', '=', $request->animal_id)->where('status', '!=', 1)->get();
            if(count($activeReqs) == 0){
                $request->save();
                return redirect('/dashboard')->with('success', 'Adoption Request Sent!');
            }
            else{
                return redirect('/dashboard')->with('error', 'Duplicate Request!');
            }
        } else{
            return redirect('/')->with('error', 'Must be Admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Auth::check()){
        if(Auth::user()->access_level > 0) {

            $request = AdoptionReq::find($id);
            return view('adoptions.edit')->with('request', $request);
        }
        else{
            return redirect('/')->with('error', 'Must be Admin');
            }
        }
        else{
            return redirect('/')->with('error', 'Must be Admin');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Auth::check()){
            if(Auth::user()->access_level > 0) {
                $request = AdoptionReq::find($id);
                return view('adoptions.edit')->with('request', $request);
            }
            else{
                return redirect('/')->with('error', 'Must be Admin');
                }
            }
            else{
                return redirect('/')->with('error', 'Must be Admin');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            if(Auth::user()->access_level > 0) {
                $this->validate($request, [
                    'status' => 'required',
                ]);

                //create animal
                $adReq = AdoptionReq::find($id);
                $animal = Animal::find((int) $adReq->animal_id);
                $adReq->status = (int) $request->input('status'){0};
                $animal->status = $adReq->status;
                $animal->save();
                $adReq->save();
                
                return redirect('/adoptions')->with('success', 'Request Updated');
            }
            else{
                return redirect('/')->with('error', 'Must be Admin');
              }
            }
            else{
                return redirect('/')->with('error', 'Must be Admin');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
