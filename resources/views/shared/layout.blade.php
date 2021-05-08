<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Simple Shoping')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @include('shared.style')
    @include('shared.script')
</head>

<body>
    <input type="hidden" value="{{URL::to('/')}}" id="baseUrl"/>
    @include('shared.navbar')
    <div class="container">
		<div class="women-product">
            @yield('content')
        </div>
        <div class="sub-cate">
            @include('shared.sidebar')
        </div>
        <div class="clearfix"> 
        </div> 
    </div>
    @include('shared.footer')
</body>

</html>