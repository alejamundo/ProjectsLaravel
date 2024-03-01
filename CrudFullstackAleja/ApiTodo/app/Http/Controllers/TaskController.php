<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{

    public function index()
    {
        $task=Task::orderBy('id','desc')->get();

        return response()->json([
            'status'=>true,
            'data'=>$task
        ],200);
    }


    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|string|min:5|max:255',
            'description'=>'required|string|min:5',
            'status'=>'required',
            'categorie_id'=>'required|numeric'
        ];

        $validator=Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $task=new Task($request->input());
        $task->save();
        return response()->json([
            'status'=>true,
            'message'=>'Task created successfully'
        ],400);

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json([
            'status'=>true,
            'data'=>$task
        ],200);
    }


    public function update(Request $request, Task $task)
    {
        $rules=[
            'title'=>'required|string|min:5|max:255',
            'description'=>'required|string|min:5',
            'status'=>'required',
            'categorie_id'=>'required|numeric'
        ];

        $validator=Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $task->update($request->input());
        return response()->json([
            'status'=>true,
            'message'=>'Task update successfully'
        ],200);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Task deleted successfully'
        ],200);
    }

    //hacer que me muestre cuantas tareas perteneces a una categoria
    public function taskByCategory(){
        $data=Task::select('tasks.title','categories.name as Category ',DB::raw('COUNT(tasks.id) as task_count'))->join('categories','categories.id','=','tasks.categorie_id')->groupBy('categories.name','tasks.title')->get();
        return response()->json([
            'status'=>true,
            'data'=>$data
        ],200);
    }
}
