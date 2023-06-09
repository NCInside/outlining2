@extends('components.layout')

@section('bg', ($category ? "/storage/".$category->bg : "bg-home.png"))

@section('content')

<h1>{{ $category ? $category->name : 'All' }}</h1>

@endsection