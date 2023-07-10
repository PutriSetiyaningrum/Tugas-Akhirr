<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERBASI INDRAMAYU</title>

    @include("layouts.partials.css.style_css")

    <link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/toastr/toastr.min.css">

    @yield("css")
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include("layouts.partials.header.navbar")

        @include("layouts.partials.sidebar.sidebar")
        @yield('content')
        {{-- @include('panitia.footer') --}}


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        @include("layouts.partials.js.style_js")

        @yield("js")

        <script>
            $(function() {

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                var toastData = @json(session('message'));

                if (toastData != null) {
                    Toast.fire({
                        icon: 'success',
                        title: toastData
                    })
                }
            });

        </script>

    </body>
    </html>
