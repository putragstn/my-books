@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Book</h1>
    </div>
    {{-- End of Page Heading --}}


    <div class="row">
        <div class="col-sm-6">

            {{-- Card --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Create New Book</h6>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        {{-- Alert Form Validation --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- End of Alert Form Validation --}}

                        {{-- Untuk memberikan user_id yang sedang menginput buku --}}
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="form-group row">
                            <label for="book_image" class="col-sm-4 col-form-label">Book Image</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="book_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Format gambar yang dibolehkan jpeg, png, jpg, gif, svg | Max: 5MB</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_title" class="col-sm-4 col-form-label">Book Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_title" name="book_title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_id" class="col-sm-4 col-form-label">Author</label>
                            <div class="col-sm-8">
                                <select name="author_id" id="author_id" class="form-control">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher_id" class="col-sm-4 col-form-label">Publisher</label>
                            <div class="col-sm-8">
                                <select name="publisher_id" id="publisher_id" class="form-control">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="release_date" class="col-sm-4 col-form-label">Release Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="release_date" name="release_date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="page" class="col-sm-4 col-form-label">Page</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="page" name="page">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_baca" class="col-sm-4 col-form-label">Status Baca</label>
                            <div class="col-sm-8">
                                <select name="status_baca" id="status_baca" class="form-control">
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group-row">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- End of Card --}}

        </div>
    </div>

    
@endsection