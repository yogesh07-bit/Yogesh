

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>
            @foreach ($data['company_data'] as $item)
                @if ($item->info_type == "site_title")
                    {{ $item->data }}
                @endif
            @endforeach
        </title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('/public/favicon.png')}}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

         <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/font-electro.css') }}">

        <link rel="stylesheet" href="{{ asset('public/assets/vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/fancybox/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/slick-carousel/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/theme1.css') }}">
    </head>