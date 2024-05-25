@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Publisher</h1>
    </div>
    {{-- End of Page Heading --}}


    <div class="row">
        <div class="col-sm-6">

            {{-- Card --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Publisher</h6>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('publisher.update', $publisher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{-- Alert Form Validation Edit --}}
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
                        {{-- End of Alert Form Validation Edit --}}

                        <div class="form-group row">
                            <label for="publisher_image" class="col-sm-4 col-form-label">Publisher Image</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="publisher_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">{{ $publisher->publisher_image }}</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Format gambar yang dibolehkan jpeg, png, jpg, gif, svg | Max: 5MB</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher_name" class="col-sm-4 col-form-label">Publisher Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="publisher_name" name="publisher_name" value="{{ $publisher->publisher_name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address" value="{{  $publisher->address }}">
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