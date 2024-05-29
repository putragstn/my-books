@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>
    {{-- End of Page Heading --}}

    {{-- Button --}}
    <div class="mb-3">
        <a href="/category/create" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i> Create New Category</a>
    </div>
    {{-- End of Button --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
        </div>
        <div class="card-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="table-responsive mt-1" >
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Category Name</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Category Name</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td class="text-center">
                                    {{-- Edit Button --}}
                                    <a href="/category/{{ $category->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                    {{-- Delete Button --}}
                                    <form action="/category/{{ $category->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
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