<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
    <div id="wrapper">  
        @include('layout.sidebar')

        @yield('content')

        
    </div>
    @include('layout.footer')
</body>
</html>