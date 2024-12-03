@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Interaction</h5>

                        <form method="POST" action="{{ route('interactions.store') }}">
                            @csrf
                            <!-- Customer -->
                            <div class="row mb-3">
                                <label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
                                <div class="col-sm-10">
                                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" id="customer_id" required>
                                        <option value="" disabled selected>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- User -->
                            <div class="row mb-3">
                                <label for="user_id" class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" id="user_id" required>
                                        <option value="" disabled selected>Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="row mb-3">
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-select @error('type') is-invalid @enderror" id="type" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="call" {{ old('type') == 'call' ? 'selected' : '' }}>Call</option>
                                        <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                        <option value="meeting" {{ old('type') == 'meeting' ? 'selected' : '' }}>Meeting</option>
                                        <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="row mb-3">
                                <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                                <div class="col-sm-10">
                                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Interaction Date -->
                            <div class="row mb-3">
                                <label for="interaction_date" class="col-sm-2 col-form-label">Interaction Date</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="interaction_date" class="form-control @error('interaction_date') is-invalid @enderror" id="interaction_date"
                                        value="{{ old('interaction_date') }}">
                                    @error('interaction_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
