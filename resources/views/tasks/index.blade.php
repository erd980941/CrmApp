@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Tasks
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-end">
                                <i class="bi bi-plus"></i> Add Task
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->salesOpportunity->customer->name ?? 'N/A' }}</td>
                                        <td>{{ $task->user->name ?? 'N/A' }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($task->status) }}</td>
                                        <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form id="deleteForm{{ $task->id }}" 
                                                  action="{{ route('tasks.destroy', $task->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        id="deleteBtn{{ $task->id }}">
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

                const taskId = this.id.replace('deleteBtn', '');
                const deleteForm = document.getElementById('deleteForm' + taskId);
                

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this task?',
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
