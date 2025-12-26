<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Edit</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Add your CSS/JS here -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/css/toastr.min.css') }}">
</head>
<body>

   <!-- @include('header')
    @include('sidebar')-->

    <div class="content-body">
        @yield('content')
    </div>

   <!-- @include('footer')-->

   

</body>
</html>
