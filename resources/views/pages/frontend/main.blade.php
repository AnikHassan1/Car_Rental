@extends('layout.frontend-app')
@section('title',"Home-page")
@section('content')

@include('component.frontend.navvar')
@include('component.frontend.hero')
@include('component.frontend.works')
@include('component.frontend.easy')
@include('component.frontend.carListing')
@include('component.frontend.waiting')
@include('component.frontend.footer')
@endsection