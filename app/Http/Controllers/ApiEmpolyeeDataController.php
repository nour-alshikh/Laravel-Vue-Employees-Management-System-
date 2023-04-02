<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class ApiEmpolyeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function states(Country $country)
    {
        return response()->json($country->states);
    }

    public function cities(State $state)
    {
        return response()->json($state->cities);
    }

    public function departments()
    {
        return response()->json(Department::all());
    }
}
