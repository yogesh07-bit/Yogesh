<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
        content="Vinayak admin panel">
    <meta name="keywords"
        content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('public/admin/assets/images/logo/favicon-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/admin/assets/images/logo/favicon-icon.png') }}"
        type="image/x-icon">
    <title>Vinayak admin dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/icofont.css') }}">


    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/flag-icon.css') }}"> -->
    <!-- Feather icon-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/feather-icon.css') }}"> -->


    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/sweetalert2.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('public/admin/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/datatables.css') }}">
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
</head>

<body>

    @guest
    @yield('login')
    @endguest

    @auth
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('admin.partials.header')

        <!-- Page Body Start-->

        <div class="page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="page-body">

                @yield('styles')
                @yield('content')
                @yield('scripts')

            </div>
            @include('admin.partials.footer')
        </div>
    </div>
    @endauth

    <div class="dynamic-modal-target position-fixed modal-center" id="modal">
        <div class="d-grid grid-1-fr modal modal-center dynamic-modal-target-inner">
            <div class="modal-header modal-center-header justify-content-between  d-flex align-items-center px-3"></div>
            <div class="modal-body modal-center-body overflow-y-scroll scroll-bar"></div>
            <div class="modal-footer modal-center-footer"></div>
        </div>
    </div>
    <!-- latest jquery-->
    < src="{{ asset('public/admin/assets/js/jquery-3.5.1.min.js') }}"></>
    <!-- Bootstrap js-->
    <script src="{{ asset('public/admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('public/admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('public/admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('public/admin/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->

    <script src="{{ asset('public/admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/owlcarousel/owl-custom.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/dashboard/dashboard_2.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/sweet-alert/app.js') }}"></script>
    <!-- Plugins JS Ends-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Theme js-->
    <script src="{{ asset('public/admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/theme-customizer/customizer.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.dynamic-modal-target', function(e) {
                $(this).hide();
            });

            $(document).on('click', '.dynamic-modal-target-inner', function(e) {
                e.stopPropagation();
            });
            $(document).on('click', ".close-btn", function(event) {
                event.preventDefault();
                $(this).parents(".shadow-modal").hide();
                $(this).parents("#modal").hide();
            });

            setTimeout(function() {
                let alert = document.querySelector('.alert-dismissible');
                if (alert) {
                    // Bootstrap 5 fade out
                    alert.classList.remove('show');
                    alert.classList.add('hide');

                    // Remove the element after animation (optional)
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);


            // $('.datepicker').datepicker({
            //     format: 'dd/mm/yyyy',
            //     autoclose: true,
            //     todayHighlight: true
            // });
        });
    </script>
</body>

</html>
