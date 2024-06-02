<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title') - {{ config('app.name') }}</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('assets/css/styles2.css') }}">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="{{ asset('assets/css/heading.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/body.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style-custom.css') }}">
    </head>
    <body id="page-top">
        @include('layout-usr.navbar')
        <header class="masthead bg-primary text-center">
            <div class="container d-flex flex-column">
                @yield('content-dalam')
            </div>
        </header>
        @include('layout-usr.footer')
        <!-- Copyright Section-->
        <section class="copyright py-4 text-center text-white">
            <div class="container"><small class="pre-wrap">Copyright ©</small></div>
        </section>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        @stack('js-before-scripts')
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts2.js') }}"></script>
        
        <!-- Page Specific JS File -->
        @stack('js-after-scripts')
    </body>
</html>