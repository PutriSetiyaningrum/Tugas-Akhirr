<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERBASIIMY | Dashboard Panitia</title>

    @include("layouts.partials.css.style_css")

    @yield("css")
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include("layouts.partials.header.navbar")

        @include("layouts.partials.sidebar.sidebar")
        @yield('content')
        @include('panitia/footer')


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        @include("layouts.partials.js.style_js")

        @yield("js")
    </body>
    </html>
