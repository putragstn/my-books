@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Books</h1>
    </div>
    {{-- End of Page Heading --}}

    {{-- Button --}}
    <div class="mb-3">
        <a href="/book/create" class="btn btn-primary">Add New Book</a>
    </div>
    {{-- End of Button --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Books</h6>
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Release Date</th>
                            <th>Page</th>
                            <th>Category</th>
                            <th>Status Baca</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Release Date</th>
                            <th>Page</th>
                            <th>Category</th>
                            <th>Status Baca</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="img/book-image/{{ $book->book_image }}" alt="{{ $book->book_image }}" width="75">
                                </td>
                                <td>{{ $book->book_title }}</td>
                                <td>{{ $book->author->author_name }}</td>
                                <td>{{ $book->publisher->publisher_name }}</td>
                                <td>{{ date('d-M-Y', strtotime($book->release_date)) }}</td>
                                <td>{{ $book->page }}</td>
                                <td>{{ $book->category->category_name }}</td>
                                <td>{{ $book->status_baca }}</td>
                                <td class="text-center" width="100px">
                                    {{-- Edit Button --}}
                                    <a href="/book/{{ $book->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                    {{-- Delete Button --}}
                                    <form action="/book/{{ $book->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">
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