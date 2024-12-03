@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Opportunity Düzenle</h5>

                        <form method="POST" action="{{ route('sales-opportunities.update', $salesOpportunity->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title', $salesOpportunity->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" required>{{ old('description', $salesOpportunity->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror" id="status" required>
                                        <option value="open" {{ old('status', $salesOpportunity->status) == 'open' ? 'selected' : '' }}>Open</option>
                                        <option value="closed" {{ old('status', $salesOpportunity->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                                        <option value="in-progress" {{ old('status', $salesOpportunity->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
                                <div class="col-sm-10">
                                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" id="customer_id" required>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id', $salesOpportunity->customer_id) == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="value" class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="number" name="value" class="form-control @error('value') is-invalid @enderror" id="value"
                                        value="{{ old('value', $salesOpportunity->value) }}" required>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('sales-opportunities.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="col-lg-6" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Information</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Name</h6>
                        <p class="card-text">{{ $salesOpportunity->customer->name ?? 'N/A' }}</p>
            
                        <h6 class="card-subtitle mb-2 text-muted">Email</h6>
                        <p class="card-text">{{ $salesOpportunity->customer->email ?? 'N/A' }}</p>
            
                        <h6 class="card-subtitle mb-2 text-muted">Phone</h6>
                        <p class="card-text">{{ $salesOpportunity->customer->phone ?? 'N/A' }}</p>
            
                        <h6 class="card-subtitle mb-2 text-muted">Address</h6>
                        <p class="card-text">{{ $salesOpportunity->customer->address ?? 'N/A' }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <small>Last updated: {{ $salesOpportunity->customer->updated_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
