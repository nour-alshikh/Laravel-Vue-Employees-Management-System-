<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\CityStoreRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cities = City::all();
        if($request->has('search')){
            $cities = City::where('name' , 'like' ,"%{$request->search}%")->get();
        }
        return view('cities.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('cities.create' , compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        return redirect( route('cities.index') )->with('message' , 'City Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit' ,compact('city' , 'states'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityStoreRequest $request, City $city)
    {
        $city->update([
            'name' =>$request->name,
            'state_id' =>$request->state_id,
        ]);
        return redirect( route('cities.index') )->with('message' , 'City Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect( route('cities.index') )->with('message' , 'City Deleted Successfully');
    }
}
