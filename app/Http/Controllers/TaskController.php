<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Models\Customer;
use App\Models\SalesOpportunity;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Task::class);
        // $tasks = Task::with(['user', 'salesOpportunity'])->get();
        // $tasks = Task::all();
        $tasks = auth()->user()->hasRole(['admin', 'manager']) 
        ? Task::all() 
        : Task::where('user_id', auth()->id())->get();
        // dd(auth()->user()->hasRole(['admin', 'manager']));

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Task::class);
        $users = auth()->user()->hasRole(['admin', 'manager']) 
        ? User::all() 
        : collect();
        // $customers = Customer::all();
        $salesOpportunities = SalesOpportunity::all();

        return view('tasks.create', compact('users', 'salesOpportunities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $this->authorize('create', Task::class);
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        // $task otomatik olarak ID'ye göre bağlanır
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('edit', $task);
        $users = auth()->user()->hasRole(['admin', 'manager']) 
        ? User::all() 
        : collect();
        $customers = Customer::all();
        $salesOpportunities = SalesOpportunity::all();

        return view('tasks.edit', compact('task','users' , 'customers', 'salesOpportunities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('edit', $task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
