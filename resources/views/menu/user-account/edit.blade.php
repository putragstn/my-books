@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>
    {{-- End of Page Heading --}}


    <div class="row">
        <div class="col-sm-6">

            {{-- Card --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="user_image" class="col-sm-4 col-form-label">User Image</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user_image" name="user_image" value="{{ $user->user_image }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        {{-- @dd($role) --}}
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-4 col-form-label">Role User</label>
                            <div class="col-sm-8">
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $role)

                                        {{-- primary_key == foreign_key --}}
                                        {{-- If (role_id == id_role) --}}
                                        @if ($role->id == $user->role_id)
                                            <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group-row">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- End of Card --}}

        </div>
    </div>

    
@endsection