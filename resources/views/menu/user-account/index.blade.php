@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Accounts</h1>
    </div>
    {{-- End of Page Heading --}}

    {{-- Button --}}
    <div class="mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i> Add New User Account</a>
    </div>
    {{-- End of Button --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Accounts</h6>
        </div>
        <div class="card-body">

            {{-- Alert --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            {{-- End of Alert --}}

            <div class="table-responsive mt-1" >
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role User</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="img/{{ $user->user_image }}" alt="{{ $user->user_image }}" width="75">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->role_name }}</td>
                                <td class="text-center">
                                    {{-- Jika Role Usernya Admin dan sedang login, maka Kosongin --}}
                                    {{-- auth()->user->name : untuk mengambil nama user yg sedang login --}}
                                    {{-- lalu akan dicocokan dengan user yang usernamenya sama  --}}
                                    @if ($user->role_id === 1 && auth()->user()->name == $user->name)
                                        -
                                    @else
                                        {{-- Edit Button --}}
                                        <a href="/user/{{ $user->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                        {{-- Delete Button --}}
                                        <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection