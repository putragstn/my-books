@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Author</h1>
    </div>
    {{-- End of Page Heading --}}


    <div class="row">
        <div class="col-sm-6">

            {{-- Card --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Create New Author</h6>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
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

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Author Image</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="author_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Format gambar yang dibolehkan jpeg, png, jpg, gif, svg | Max: 5MB</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_name" class="col-sm-4 col-form-label">Author Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="author_name" name="author_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-sm-4 col-form-label">Date of Birth</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-sm-4 col-form-label">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sex" class="col-sm-4 col-form-label">Sex</label>
                            <div class="col-sm-8">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
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