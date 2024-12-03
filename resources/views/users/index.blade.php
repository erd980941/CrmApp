@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Users
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-end">
                                <i class="bi bi-plus"></i> Ekle
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>Name</b></th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>{{ ucfirst($user->status) }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                                <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" id="deleteBtn{{ $user->id }}">Delete</button>
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
        document.querySelectorAll('[id^="deleteBtn"]').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();  // Varsayılan davranışı (formun gönderilmesini) engelle

                const userId = this.id.replace('deleteBtn', ''); // Butonun ID'sinden kullanıcı ID'sini çıkarıyoruz
                const deleteForm = document.getElementById('deleteForm' + userId); // İlgili formu buluyoruz

                // SweetAlert modal'ını tetikliyoruz
                Swal.fire({
                    title: 'Emin misiniz?',
                    text: 'Bu kullanıcıyı silmek istediğinizden emin misiniz?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Evet, sil',
                    cancelButtonText: 'Hayır, iptal et',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();  // Kullanıcı onaylarsa formu gönderiyoruz
                    }
                });
            });
        });
    </script>
@endsection
