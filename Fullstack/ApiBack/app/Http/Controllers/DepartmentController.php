<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{

    public function index()
    {
        $departaments = Department::all();
        return response()->json($departaments);
    }

    public function store(Request $request)
    {
        //definir reglas a los campos
        $rules = ['name' => 'required|string|min:1|max:100'];
        $validator = Validator::make($request->input(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        //si los datos enviados son correctos
        $departments = new Department($request->input());
        $departments->save();
        return response()->json([
            'status' => true,
            'message' => 'Department Create success'
        ], 200);

    }


    public function show(Department $department)
    {
        return response()->json([
            'status'=>true,
            'data'=>$department
        ]);
    }


    public function update(Request $request, Department $department)
    {
        $rules=[
            'name'=>'required|string|min:1|max:100'
        ];
        $validator=Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $department->update($request->input());
        return response()->json([
            'status'=>true,
            'message'=>'Department update successfully'
        ],200);
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Department deleted successfully'
        ],200);
    }
}
