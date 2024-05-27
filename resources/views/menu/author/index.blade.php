@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Authors</h1>
    </div>
    {{-- End of Page Heading --}}

    {{-- Button --}}
    <div class="mb-3">
        <a href="/author/create" class="btn btn-primary">Add New Author</a>
    </div>
    {{-- End of Button --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Authors</h6>
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
                            <th>Date of Birth</th>
                            <th>Sex</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Sex</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="img/author-image/{{ $author->author_image }}" alt="{{ $author->author_name }}" width="100">
                                </td>
                                <td>{{ $author->author_name }}</td>
                                <td>{{ date('d-M-Y', strtotime($author->date_of_birth)) }}</td>
                                <td>{{ $author->sex }}</td>
                                <td>{{ $author->country }}</td>
                                <td class="text-center">
                                    {{-- Edit Button --}}
                                    <a href="/author/{{ $author->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                    {{-- Delete Button --}}
                                    <form action="/author/{{ $author->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this author?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection