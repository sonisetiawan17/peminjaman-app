<meta charset="utf-8" />
<title>Color Admin | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<link href="/assets/css/default/app.min.css" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== TOAST CDN ================== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    body {
        font-size: 15px;
    }

    .button-primary {
        padding: 8px 12px;
        background-color: #22c55e;
        color: white;
        border-radius: 6px;
        transition-duration: 300ms;
    }

    .button-primary:hover{
        background-color: rgba(16, 185, 129, 0.8);
    }

    .button-ghost {
        padding: 8px 12px;
        background-color: rgb(215, 216, 218, 0.7);;
        color: rgb(8, 8, 8);
        text-decoration: none;
        transition-duration: 300ms;
        border-radius: 6px;
    }

    .button-ghost:hover {
        background-color: rgba(215, 216, 218, 0.5);
        text-decoration: none;
        color: rgb(8, 8, 8);
    }

    .breadcrumb-item:hover {
        text-decoration: none !important;
    }
</style>
@stack('css')
