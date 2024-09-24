@extends('adminlte::page')

@section('title', 'Manage Users')

@section('content')
    <div class="container mt-3 my-3">
        <button type="button" class="btn btn-primary mt-3 my-3" data-toggle="modal" data-target="#userModal">
            <i class="fas fa-plus"></i> Create User
        </button>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary" title="View">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModal" 
                                onclick="editUser({{ $user }})" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="userForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Create User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group" id="passwordField">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <small id="passwordHint" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Profile Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    }
    .table {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .img-fluid {
        border-radius: 0.5rem;
    }
</style>
@endsection

@section('js')
    <script>
        $('#userModal').on('hidden.bs.modal', function () {
            $('#userForm').attr('action', '{{ route('users.store') }}');
            $('#userForm').trigger('reset');
            $('#userModalLabel').text('Create User');
            $('#passwordHint').text('');
            $('#userForm input[name="_method"]').remove();
        });

        function editUser(user) {
            $('#userModalLabel').text('Edit User');
            $('#userForm').attr('action', '/users/' + user.id);
            $('#userForm').append('<input type="hidden" name="_method" value="PUT">');
            $('#name').val(user.name);
            $('#email').val(user.email);
            $('#gender').val(user.gender);
            $('#passwordHint').text('kosongin kalo ga mau ganti pw');
        }

        function confirmDelete() {
            return confirm('are you sure about that?🤨');
        }
    </script>
@endsection
