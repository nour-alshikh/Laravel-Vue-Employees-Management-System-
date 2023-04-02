<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeSingleResource;

class ApiEmployeeController extends Controller
{

    public function index (Request $request)
    {
        $employees = Employee::all();
        if($request->search){
            $employees = Employee::where('first_name' , 'like' ,"%{$request->search}%")->get();
        }elseif($request->department_id){
            $employees = Employee::where('department_id' , 'like' ,"%{$request->department_id}%")->get();
        }
        return EmployeeResource::collection($employees);
    }

    public function store (EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->validated());
        return response()->json($employee);
    }

    public function update (EmployeeStoreRequest $request , Employee $employee)
    {
        $employee = $employee->update($request->validated());
        return response()->json($employee);
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return response()->json("Employee Deleted");
    }

    public function show(Employee $employee){
        return new EmployeeSingleResource($employee);
    }
}
