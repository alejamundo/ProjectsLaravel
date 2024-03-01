<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;

class TaskController extends Controller
{
    //Funciones crud
    public function index(): View {
        $tasks=Task::latest()->paginate(3);
        return view('index',['tasks'=>$tasks]);
    }

    public function store(Request $request): RedirectResponse{

        //validaciones
        $dataValidate=$request->validate([
            'title'=>'required|string|min:5',
            'description'=>'nullable|string',
            'status'=>'required|in:Completada,En progreso,Pendiente'
        ]);
        //crear instacia de modelo
        $task=new Task($dataValidate);

        //almacenar tarea en la bd
        $task->save();
        //dd($request);
        return redirect()->route('index')->with('success','Tarea creada con exito');
    }

    public function edit($id): View{
        //encuentro tarea
        $task = Task::find($id);
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task): RedirectResponse{
        //validaciones
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Obtén los datos de la solicitud
        $data = $request->only(['title', 'description', 'status']);

        // Actualiza el modelo Task con los nuevos datos
        $task->update($data);
        return redirect()->route('index')->with('success', 'Tarea actualizada con éxito');
    }

    public function delete($id):RedirectResponse{
        $task=Task::find($id);
        $task->delete();
        return redirect()->route('index')->with('success','Tarea eliminada');
    }


}
