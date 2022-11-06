<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * index para mostrar todas las tareas
     * store para guardar una tarea
     * update para actualizar
     * destroy elimina una tarea
     * show para mostrar una tarea
     * edit para mostrar formulario de edicon
     */

    public function store(Request $request)
    {
        # code...
        $request->validate([
            //validacion del campo
            'title' => 'required|min:3 '
        ]);

        // creamos el objeto y asignamos valores
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada');
    }
    public function index()
    {
        # code...
        $todos =  Todo::all(); //traer todas las tareas de la db
        return view('todo.index', ['todos' => $todos]);
    }

    public function show($id)
    {
        # code...
        $todo = Todo::find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        # code...
        $todo =  Todo::find($id); //traer todas las tareas de la db
        $todo->title = $request->title;
        $todo->save();
        // return view('todo.index', ['success' => 'Updated']);
        return redirect()->route('todos')->with(['success' => 'Updated']);
    }

    public function destroy($id)
    {
        # code...
        $todo =  Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with(['success' => 'Tasks Deleted']);
    }
}
