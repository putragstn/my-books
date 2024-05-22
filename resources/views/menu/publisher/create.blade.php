@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Publisher</h1>
    </div>
    {{-- End of Page Heading --}}


    <div class="row">
        <div class="col-sm-6">

            {{-- Card --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add New Publisher</h6>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('publisher.store') }}" method="POST">
                        @csrf
                        @method('post')

                        <div class="form-group row">
                            <label for="publisher_image" class="col-sm-4 col-form-label">Publisher Image</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="publisher_image" name="publisher_image" value="publisher_image.png">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher_name" class="col-sm-4 col-form-label">Publisher Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="publisher_name" name="publisher_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address">
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