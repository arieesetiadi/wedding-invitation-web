<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.part-meta')
    @include('parts.part-styles')

    @php
        $header = 'Billy & Diana | Wedding Invitation for 15th February 2025 6PM WIB at Park Hyatt Jakarta, Dining Room level 22';
    @endphp

    <meta name="description" content="{{ $header }}">
    <title>{{ $header }}</title>
</head>

<body>
    @include('parts.part-loading')
    @yield('content')
    @include('parts.part-scripts')
</body>

</html>
