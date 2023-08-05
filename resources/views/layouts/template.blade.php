<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-------------------------- Style links --------------------->

    @yield('styling')

    <!-------------------------------------------------------------->

    <title>
        @yield('title')
    </title>
</head>

<body>
    @yield('header')

    <div id="smooth-wrapper">

        @yield('navbar')





        <div id="swupMain" class="mil-main-transition">
            <div id="smooth-content" class="mil-content">


                @yield('content')



                @yield('footer')

            </div>
        </div>
    </div>
    @yield('scripts')

</body>

</html>
