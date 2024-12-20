@extends('layouts.layout-main')

@section('content')
    {{-- <main class="d-none"> --}}
    <main>
        @include('sections.section-hero')
        @include('sections.section-about')
        @include('sections.section-gallery')
        @include('sections.section-countdown')
        @include('sections.section-maps')
        @include('sections.section-rsvp')
        {{-- @include('sections.section-quotes')
        @include('sections.section-gift')
        @include('sections.section-comments')
        @include('sections.section-footer') --}}
    </main>
@endsection
