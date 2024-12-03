@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task Düzenle</h5>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title', $task->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" required>{{ old('description', $task->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($users->isNotEmpty())
                            <div class="row mb-3">
                                <label for="user_id" class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" id="user_id" required>
                                        <option value="" disabled>Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror" id="status" required>
                                        <option value="" disabled>Select Status</option>
                                        <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sales_opportunity_id" class="col-sm-2 col-form-label">Sales Opportunity</label>
                                <div class="col-sm-10">
                                    <select name="sales_opportunity_id" class="form-select @error('sales_opportunity_id') is-invalid @enderror" id="sales_opportunity_id" required>
                                        <option value="" disabled>Select Sales Opportunity</option>
                                        @foreach ($salesOpportunities as $salesOpportunity)
                                            <option value="{{ $salesOpportunity->id }}" {{ old('sales_opportunity_id', $task->sales_opportunity_id) == $salesOpportunity->id ? 'selected' : '' }}>
                                                {{ $salesOpportunity->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sales_opportunity_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="due_date" class="col-sm-2 col-form-label">Due Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" value="{{ old('due_date', $task->due_date) }}">
                                    @error('due_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <div class="col-lg-6" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Opportunity Information</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Title</h6>
                        <p class="card-text">{{ $task->salesOpportunity->title ?? 'N/A' }}</p>

                        <h6 class="card-subtitle mb-2 text-muted">Customer</h6>
                        <p class="card-text ps-3">
                            Name: {{ $task->salesOpportunity->customer->name ?? 'N/A' }}<br>
                            Email: {{ $task->salesOpportunity->customer->email ?? 'N/A' }}<br>
                            Phone: {{ $task->salesOpportunity->customer->phone ?? 'N/A' }}<br>
                        </p>
            
                        <h6 class="card-subtitle mb-2 text-muted">Description</h6>
                        <p class="card-text">{{ $task->salesOpportunity->description ?? 'N/A' }}</p>
            
                        <h6 class="card-subtitle mb-2 text-muted">Value</h6>
                        <p class="card-text">{{ $task->salesOpportunity->value ?? 'N/A' }}</p>
            
                    </div>
                    <div class="card-footer text-muted">
                        <small>Last updated: {{ $task->salesOpportunity->updated_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
