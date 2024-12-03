<?php

namespace App\Http\Controllers;

use App\Http\Requests\InteractionRequest;
use App\Models\User;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Interaction::class);
        $interactions = auth()->user()->hasRole(['admin', 'manager']) 
        ? Interaction::all() 
        : Interaction::where('user_id', auth()->id())->get();

        return view('interactions.index', compact('interactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Interaction::class);
        $customers = Customer::all();
        $users = auth()->user()->hasRole(['admin', 'manager']) 
        ? User::all() 
        : collect();
        return view('interactions.create', compact('customers','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InteractionRequest $request)
    {
        $this->authorize('create', Interaction::class);
        // $customer->interactions()->create($validated);
        Interaction::create($request->validated());

        return redirect()->route('interactions.index')->with('success', 'Interaction added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interaction $interaction)
    {
        $this->authorize('view', $interaction);
        return view('interactions.show', compact('interaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interaction $interaction)
    {
        $this->authorize('edit', $interaction);
        $customers = Customer::all();
        $users = User::all();
        $users = auth()->user()->hasRole(['admin', 'manager']) 
        ? User::all() 
        : collect();
        return view('interactions.edit', compact('interaction','users','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InteractionRequest $request, Interaction $interaction)
    {
        $this->authorize('edit', $interaction);
        $interaction->update($request->validated());

        return redirect()->route('interactions.index')->with('success', 'Interaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interaction $interaction)
    {
        $this->authorize('delete', $interaction);
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success', 'Interaction deleted successfully.');
    }
}
