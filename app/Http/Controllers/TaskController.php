<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // $tasks = Task::latest()->get(); Este muestra todos los datos sin mas

        //Este muestra los datos pero con la paginacion ya configurada.
        $tasks = Task::latest()->paginate(3);
        //Se esta asignando la vista "index.blade.php" segun la ruta declarada tasks .......................................................................................................... tasks.index › TaskController@index
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        // Se esta asignando la vista "create.blade.php" segun la ruta declarada tasks/create ................................................................................................. tasks.create › TaskController@create
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //Con esta funcion se esta diciendo que el request tales componentes son necesarios para poder realizar la insercion
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        // dd($request->all());
        Task::create($request->all()); //Se esta haciendo la insersion de todos los datos recabados
        //Una vez que se realize la insercion con exito se hace el retorno al index con un mensaje de success
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) : View
    {
        return view('edit', ['tasks' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task) : RedirectResponse
    {
        //Con esta funcion se esta diciendo que el request tales componentes son necesarios para poder realizar la insercion
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        // dd($request->all());
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) : RedirectResponse
    {
        // dd($task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada.');
    }
}
