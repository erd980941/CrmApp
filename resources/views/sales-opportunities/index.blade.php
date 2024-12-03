@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Sales Opportunities
                            <a href="{{ route('sales-opportunities.create') }}" class="btn btn-primary btn-sm float-end">
                                <i class="bi bi-plus"></i> Add
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesOpportunities as $opportunity)
                                    <tr>
                                        <td>{{ $opportunity->customer->name }}</td>
                                        <td>{{ $opportunity->title }}</td>
                                        <td>{{ $opportunity->description ?? 'N/A' }}</td>
                                        <td>{{ $opportunity->value ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($opportunity->status) }}</td>
                                        <td>
                                            <a href="{{ route('sales-opportunities.edit', $opportunity->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form id="deleteForm{{ $opportunity->id }}" 
                                                  action="{{ route('sales-opportunities.destroy', $opportunity->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        id="deleteBtn{{ $opportunity->id }}">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert ile silme işlemini tetikleme
        document.querySelectorAll('[id^="deleteBtn"]').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const opportunityId = this.id.replace('deleteBtn', '');
                const deleteForm = document.getElementById('deleteForm' + opportunityId);
                

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this opportunity?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'No, cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>
@endsection
