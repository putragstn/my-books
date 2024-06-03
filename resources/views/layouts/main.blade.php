
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BM | {{ $title }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/jpg" href="icon-open-book.png"/>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('template/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('template/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ URL::asset('template/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    {{-- Page Wrapper --}}
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')
        {{-- End of Sidebar --}}

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content --}}
            <div id="content">

                {{-- Izin tanya, gimana caranya passing data tapi pake data yg dinamis engga statis ? --}}
                @include('layouts.partials.topbar', ['book' => 12345])

                {{-- Container --}}
                <div class="container-fluid">

                    @yield('container')

                </div>
                {{-- End of Container --}}

            </div>
            {{-- End of Main Content --}}

            {{-- Footer --}}
            @include('layouts.partials.footer')
            {{-- End of Footer --}}

        </div>
        {{-- End of Content Wrapper --}}

    </div>
    {{-- End of Page Wrapper --}}

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Logout Modal --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    {{-- Logout --}}
                    <form action="/logout" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                    {{-- End of Logout --}}
                </div>
            </div>
        </div>
    </div>
    {{-- End of Logout Modal --}}
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('template/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('template/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('template/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('template/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('template/sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('template/sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('template/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('template/sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('template/sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ URL::asset('template/sb-admin-2/js/demo/datatables-demo.js') }}"></script>

    {{-- Script JS For Display File Input Name --}}
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>

</body>

</html>