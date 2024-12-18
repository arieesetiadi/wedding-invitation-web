@extends('layouts.layout-main')

@section('content')
    <main class="d-none">
        <!-- Hero Section -->
        @include('sections.section-hero')

        <!-- About Section -->
        @include('sections.section-about')

        <!-- Gallery Section -->
        @include('sections.section-gallery')

        <!-- Countdown Section -->
        @include('sections.section-countdown')

        <!-- Maps Section -->
        @include('sections.section-maps')

        <!-- Quotes Section -->
        @include('sections.section-quotes')

        <!-- Gift Section -->
        @include('sections.section-gift')

        <!-- RSVP Section -->
        @include('sections.section-rsvp')

        <!-- Comments Section -->
        @include('sections.section-comments')

        <!-- Footer -->
        @include('sections.section-footer')
    </main>
@endsection
