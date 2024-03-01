<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
       $employess=Employee::select('employees.*','departments.name as department')->join('departments','departments.id','=','employees.depatament_id')->paginate(10);
       return response()->json($employess);
    }


    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|string|min:1|max:100',
            'email'=>'required|email|max:80',
            'phone'=>'required|max:15',
            'departament_id'=>'required|number'
        ];
        $validator=Validator::make($request->input(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $employes=new Employee($request->input());
        $employes->save();
        return response()->json([
            'status'=>true,
            'message'=>'Employees create successfully'
        ],200);
    }


    public function show(Employee $employee)
    {
        return response()->json([
            'status'=>true,
            'data'=>$employee
        ],200);

    }


    public function update(Request $request, Employee $employee)
    {
        $rules=[
            'name'=>'required|string|min:1|max:100',
            'email'=>'required|email|max:80',
            'phone'=>'required|max:15',
            'departament_id'=>'required|number'
        ];
        $validator=Validator::make($request->input(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $employee->update($request->input());
        return response()->json([
            'status'=>true,
            'message'=>'Employeed updated successfully'
        ],200);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'status'=>true,
            'message'=>'employeed deleted successfully'
        ],200);
    }
    public function EmployeesByDepartament(){
        $employees = Employee::select(DB::raw('COUNT(employees.id) as count,department'), 'departments.name')
        ->join('departments', 'departments.id', '=', 'employees.depatament_id')
        ->groupBy('departments.name')
        ->get();
        return response()->json($employees);
    }

    public function all(){
        $employees=Employee::select('employees.*','department.name as department')->join('departments','departments.id','=','employeed.depatament_id')->get();
        return response()->json($employees);
    }
}
