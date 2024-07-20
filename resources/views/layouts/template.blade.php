<!DOCTYPE html>
<html lang="en">


@include('includes.head')

<body>
    <div class="container-xxl bg-white p-0">
        @include('includes.navBar')

        @yield('content')
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>