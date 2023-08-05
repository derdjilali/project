@extends('layouts.template')

@section('styling')
    @include('includes.parts.style')
@endsection


@section('title')
    {{ 'Algeria Venture' }}
@endsection


@section('header')
    @include('includes.parts.cursor')
    @include('includes.parts.preloader')
@endsection


@section('navbar')
    @include('includes.parts.navbar')
@endsection


@section('content')

    @include('includes.views.home.welcome')
    @include('includes.views.home.hero')
    @include('includes.views.home.about')
    @include('includes.views.home.dg')
    @include('includes.views.home.articles')
    @include('includes.views.home.what-we-do')
    @include('includes.views.home.numbers')
    @include('includes.views.home.services')
    @include('includes.views.home.domiciliation')
    @include('includes.views.home.challenges')
    @include('includes.views.home.events')

@endsection


@section('footer')
    @include('includes.parts.footer')
@endsection


@section('scripts')
    @include('includes.parts.scripts')
@endsection
