@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Customers
                            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-end">
                                <i class="bi bi-plus"></i> Add
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone ?? 'N/A' }}</td>
                                        <td>{{ $customer->company ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form id="deleteForm{{ $customer->id }}" 
                                                  action="{{ route('customers.destroy', $customer->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        id="deleteBtn{{ $customer->id }}">
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

                const customerId = this.id.replace('deleteBtn', '');
                const deleteForm = document.getElementById('deleteForm' + customerId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this customer?',
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
