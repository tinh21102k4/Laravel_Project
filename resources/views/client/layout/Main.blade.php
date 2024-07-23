<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Reader | Hugo Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    @include('client.layout.css')

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        @include('client.layout.Header')
    </header>
    <!-- /navigation -->
    <!-- start of banner  and start main-->
    @yield('content-client')

    <footer class="footer">
        @include('client.layout.Footer')
    </footer>
    @include('client.layout.Js')

</html>
