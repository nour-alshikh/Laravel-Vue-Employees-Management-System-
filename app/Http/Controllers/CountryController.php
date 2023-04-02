<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request){
        $countries = Country::get();
        if($request->has('search')){
            $countries = Country::where('name' , 'like' , "%{$request->search}%")->orWhere('country_code' , 'like' , "%{$request->search}%")->get();
        }
        return view('countries.index' , compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());

        return redirect(route('countries.index'))->with('message' , 'Country Created Successfully');
    }

    public function edit(Country $country){
        return view('countries.edit' , compact('country'));
    }

    public function update(CountryUpdateRequest $request , Country $country){
        $country->update([
            'name' => $request->name,
            'country_code' => $request->country_code,
        ]);

        return redirect(route('countries.index'))->with('message' , 'Country Updated Successfully');
    }

    public function destroy(Country $country){
        $country->delete();
        return redirect(route('countries.index'))->with('message' , 'Country Deleted Successfully');
    }

}
