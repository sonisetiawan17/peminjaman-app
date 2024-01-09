<meta charset="utf-8" />
<title>Color Admin | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
{{-- <link href="/assets/css/default/app.min.css" rel="stylesheet" /> --}}
<link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

<!-- ================== END BASE CSS STYLE ================== -->
<style>
body{
    font-size: 15px;
}
</style>
@stack('css')
