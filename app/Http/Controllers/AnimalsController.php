<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $search = \Request::get('search');
        if($search != ""){
            $animals = Animal::where('species', 'like','%'.$search)->get()->toArray();
            $animals2 = Animal::where('name', 'like','%'.$search)->get()->toArray();
            $animals = array_merge($animals, $animals2);
            return view('animals.index')->with('animals', $animals);
        }
        else{
            $animals = Animal::orderBy('name', 'asc')->get();
            return view('animals.index')->with('animals', $animals);
        }
    }

    public function search(Request $request){
        $search = $request->input('search');
        $animals = Animal::where('species', '=', ucwords($search));
        array_push($animals, Animal::where('name', '=', ucwords($search)));
        return view('animals.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'about' => 'required',
            'species' => 'required',
            'animal-img' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('animal-img')){
            //get full filename
            $filename = $request->file('animal-img')->getClientOriginalName();
            $rawName = pathinfo($filename, PATHINFO_FILENAME);
            $rawExt = $request->file('animal-img')->getClientOriginalExtension();
            $filenameForSave = $rawName.'-'.time().'.'.$rawExt;
            $filenameForSave = str_replace(' ', '', $filenameForSave);
            $path = $request->file('animal-img')->storeAs('public/animal_images', $filenameForSave);
        } else {
            $filenameForSave = 'defaultAnimalImg.png';
        }

        //create animal
        $animal = new Animal;

        $animal->name = ucwords($request->input('name'));
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex'){0};
        $animal->about = $request->input('about');
        $animal->status = 0;
        $animal->species = ucwords($request->input('species'));
        $animal->img_url = $filenameForSave;

        $animal->save();
        
        return redirect('/animals')->with('success', 'Animal Added');
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
        $animal = Animal::find($id);
        return view('animals.show')->with('animal', $animal);
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
        $animal = Animal::find($id);
        return view('animals.edit')->with('animal', $animal);
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
        //
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'about' => 'required',
            'species' => 'required',
            'animal-img' => 'image|nullable|max:1999'
            ]);
    
        if($request->hasFile('animal-img')){
            //get full filename
            $filename = $request->file('animal-img')->getClientOriginalName();
            $rawName = pathinfo($filename, PATHINFO_FILENAME);
            $rawExt = $request->file('animal-img')->getClientOriginalExtension();
            $filenameForSave = $rawName.'-'.time().'.'.$rawExt;
            $filenameForSave = str_replace(' ', '', $filenameForSave);
            $path = $request->file('animal-img')->storeAs('public/animal_images', $filenameForSave);
        } else {
            $animal = Animal::find($id);
            $filenameForSave = $animal->img_url;
        }

        //create animal
        $animal = Animal::find($id);

        $animal->name = ucwords($request->input('name'));
        $animal->age = (int) $request->input('age');
        $animal->sex = $request->input('sex'){0};
        $animal->about = $request->input('about');
        $animal->species = ucwords($request->input('species'));
        $animal->status = (int) $request->input('status');
        $animal->img_url = $filenameForSave;

        $animal->save();
        
        return redirect('/animals')->with('success', 'Animal Updated');
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
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('/animals')->with('success', 'Animal Deleted');
    }
}
