@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publisher</h1>
    </div>
    {{-- End of Page Heading --}}

    {{-- Button --}}
    <div class="mb-3">
        <a href="{{ route('publisher.create') }}" class="btn btn-primary">Add New Publisher</a>
    </div>
    {{-- End of Button --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Publisher</h6>
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
                            <th>Publisher</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Publisher</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($publishers as $publisher)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center"><img src="img/{{ $publisher->publisher_image }}" alt="{{ $publisher->publisher_name }}" width="100"></td>
                                <td>{{ $publisher->publisher_name }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td class="text-center">
                                    {{-- Edit Button --}}
                                    <a href="/publisher/{{ $publisher->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                    {{-- Delete Button --}}
                                    <form action="/publisher/{{ $publisher->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this publisher?')">
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