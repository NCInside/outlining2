@extends('components.layout')

@section('bg', ($category ? "/storage/".$category->bg : "bg-home.png"))

@section('content')

<div class="text-center pt-8">
    <p class="text-white text-6xl erica">{{ $category ? $category->name : 'All' }}</p>
    <div class='grid gap-y-8 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 px-12 py-8 place-items-center'>
        @foreach($projects as $project)
            <x-projectcard :project="$project" style="shadow-md w-[330px] sm:w-[275px] min-[740px]:w-[300px] min-[835px]:w-[350px] min-[975px]:w-[400px] lg:w-[300px] min-[1198px]:w-[350px] min-[1388px]:w-[400px] min-[1578px]:w-[450px]" />
        @endforeach 
    </div>
    <div class="my-12 grid place-items-center w-full">
        {{ $projects->links('vendor.pagination.tailwind') }}
    </div>
</div>

@endsection