@include('backend.layouts.header')
<div id="wrapper">
    @include('backend.layouts.sidebar')
    <div id="wrapper_primary">
        <!-- content -->


        @yield('content')

        <!-- end content -->
    </div>
    <header id="wrapper_header"></header>
    <!-- end header -->

    <section></section>
    <!-- end section -->


    @include('backend.layouts.footer')
