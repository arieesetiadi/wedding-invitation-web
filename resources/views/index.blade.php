@extends('layouts.layout-main')

@section('content')
    <div class="onboarding">
        @include('sections.section-hero')
    </div>
    
    <main class="d-none">
        @include('sections.section-hero')
        @include('sections.section-about')
        @include('sections.section-gallery')
        @include('sections.section-countdown')
        @include('sections.section-maps')
        @include('sections.section-rsvp')
        @include('sections.section-wishes')
        @include('sections.section-footer')
    </main>
@endsection
