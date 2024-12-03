<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesOpportunityRequest;
use App\Models\Customer;
use App\Models\SalesOpportunity;
use Illuminate\Http\Request;

class SalesOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', SalesOpportunity::class);
        $salesOpportunities = SalesOpportunity::all();
        return view('sales-opportunities.index', compact('salesOpportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', SalesOpportunity::class);
        $customers = Customer::all();
        return view('sales-opportunities.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesOpportunityRequest $request)
    {
        $this->authorize('create', SalesOpportunity::class);
        $validated = $request->validated();
        SalesOpportunity::create($validated);

        return redirect()->route('sales-opportunities.index')->with('success', 'Sales Opportunity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($salesOpportunityId)
    {
        $this->authorize('view', SalesOpportunity::class);
        $salesOpportunity = SalesOpportunity::with('customer')->findOrFail($salesOpportunityId);
        return view('sales-opportunities.show', compact('salesOpportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesOpportunity $salesOpportunity)
    {
        $this->authorize('edit', SalesOpportunity::class);
        $customers = Customer::all(); 
        return view('sales-opportunities.edit', compact('salesOpportunity', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesOpportunityRequest $request, SalesOpportunity $salesOpportunity)
    {
        $this->authorize('edit', SalesOpportunity::class);
        $validated = $request->validated();

        $salesOpportunity->update($validated);

        return redirect()->route('sales-opportunities.index')->with('success', 'Sales Opportunity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesOpportunity $salesOpportunity)
    {
        $this->authorize('delete', SalesOpportunity::class);
        $salesOpportunity->delete();

        return redirect()->route('sales-opportunities.index')->with('success', 'Sales Opportunity deleted successfully.');
    }
}
