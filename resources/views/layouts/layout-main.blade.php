<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.part-meta')
    @include('parts.part-styles')
    
    <title>Billy & Diana | Wedding Invitation</title>
</head>

<body>
    @include('parts.part-loading')
    @include('parts.part-onboarding')

    @yield('content')

    @include('parts.part-scripts')
</body>

</html>
