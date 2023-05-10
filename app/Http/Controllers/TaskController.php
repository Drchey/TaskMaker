<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  We are Using the Welcome Page As Task's Index in this Tutorial
        return view('welcome', [
            'tasks' => Tasks::orderBy('order')
                ->filter(request(['project']))
                ->paginate(3),
            'projects' => Projects::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the Form Fields
        $fields = $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'project_id' => 'required',
        ]);

        // Add Order
        $fields['order'] = Tasks::max('order') + 1;

        // Create the Validated Fields

        Tasks::create($fields);

        return back()->with('message', 'New Task Created!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        // Validate the Form Fields
        $fields = $request->validate([
            'name' => ['required'],
            'priority' => 'required',
        ]);

        // Create the Validated Fields

        $task->update($fields);

        return back()->with('message', 'Task Updated!');
    }

    public function order(Request $request, Tasks $task)
    {
        $task->order = $request->order;
        $task->save();

        return response()->json('message', 'ReOrdered');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        return back()->with('message', 'Task deleted');
    }
}