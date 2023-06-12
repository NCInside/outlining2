@extends('components.layout')

@section('bg', ($category ? "/storage/".$category->bg : "bg-home.png"))

@section('content')

<div class="text-center pt-8">
    <p class="text-white text-6xl erica">{{ $category ? $category->name : 'All' }}</p>
    <div class='grid gap-y-16 gap-x-8 min-[500px]:grid-cols-2 min-[930px]:grid-cols-3 grid-cols-1 px-12 py-8'>
        @foreach($projects as $project)
            <x-projectcard :project="$project" style="w-auto h-96 shadow-md" />
        @endforeach 
    </div>
    <div class="my-12 grid place-items-center w-full">
        {{ $projects->links('vendor.pagination.tailwind') }}
    </div>
</div>

@endsection