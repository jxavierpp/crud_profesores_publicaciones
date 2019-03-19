<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>
    <body>
        <header>
            @include('partials.navbar')
        </header>
        <div class="container" style="margin-top: 40px;">
            @yield('content')
        </div>
        @include('partials.javascript')
    </body>
</html>