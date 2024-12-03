@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Interactions
                            <a href="{{ route('interactions.create') }}" class="btn btn-primary btn-sm float-end">
                                <i class="bi bi-plus"></i> Add Interaction
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Notes</th>
                                    <th>Interaction Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($interactions as $interaction)
                                    <tr>
                                        <td>{{ $interaction->customer->name ?? 'N/A' }}</td>
                                        <td>{{ $interaction->user->name ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($interaction->type) }}</td>
                                        <td>{{ $interaction->notes ?? 'N/A' }}</td>
                                        <td>{{ $interaction->interaction_date ? \Carbon\Carbon::parse($interaction->interaction_date)->format('Y-m-d H:i') : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('interactions.edit', $interaction->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form id="deleteForm{{ $interaction->id }}" 
                                                  action="{{ route('interactions.destroy', $interaction->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        id="deleteBtn{{ $interaction->id }}">
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

                const interactionId = this.id.replace('deleteBtn', '');
                const deleteForm = document.getElementById('deleteForm' + interactionId);
                

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this interaction?',
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
