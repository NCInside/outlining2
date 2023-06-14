@extends('components.layout')

@section('bg', "/storage/$project->bg")

@section('content')

<div class="text-white">
    <div class="py-4">
        <button id="backButton" class="text-lg hebrew font-bold py-2 px-6 bg-gradient-to-r from-[#000000]">< Back</button>
    </div>
    <div class="flex flex-wrap-reverse w-full justify-around justify-items-center place-items-center pt-8 px-6">
        <div class="text-center md:text-left w-96 md:w-2/5 pt-12 md:pt-0">
            <p class="text-6xl erica">{{ $project->title }}</p>
            <br>
            <p class="text-lg hebrew font-bold">{{ $project->description }}</p>
        </div>
        <div class="w-96 md:w-2/5">
            <img src="/storage/{{ $project->photo }}" alt="{{ $project->title }}" class="m-auto">
        </div>
    </div>
    <div class='text-center grid grid-cols-1 justify-center pt-16 px-2'>
        <p class='erica text-2xl'>Final Project Gallery</p>
        {{-- <div id="galeryContainer" class="py-8 gap-x-12 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 justify-center place-items-center">
            <button id="prevButton" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16" disabled>
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            @foreach ($project->galeries as $key => $galery)
                <div class="galery-card" style="{{ $key >= 3 ? 'display:none' : '' }}">
                    <button data-modal-target={{ $galery->image }} data-modal-toggle={{ $galery->image }}>
                        <div class="h-64 w-32 md:w-44 bg-cover bg-no-repeat relative hover:transform hover:scale-110 transition duration-500" style="background-image: url(/storage/{{ $galery->image }})"></div>
                    </button>
                </div>
                <div id={{ $galery->image }} tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow flex justify-center items-center p-10">
                            <img src="/storage/{{ $galery->image }}" alt={{ $galery->image }}>
                        </div>
                    </div>
                </div>
            @endforeach
            <button id="nextButton" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 4.293a1 1 0 0 1 1.414 0L15 10l-5.293 5.293a1 1 0 0 1-1.414-1.414L12.586 10 7.293 4.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>         --}}
        <div class="relative">
            <div class="flex overflow-x-auto flex-shrink-0 gap-x-8 p-8" id="container">
                <div class="m-auto">
                    <div class="w-96">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe
                                src={{ $project->video }}
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
                @foreach ($project->galeries as $key => $galery)
                    <div class="galery-cards hover:transform hover:scale-110 transition duration-500">
                        <button data-modal-target={{ $galery->image }} data-modal-toggle={{ $galery->image }}>
                            <div class="relative w-80">
                                <img class="object-cover" src="/storage/{{ $galery->image }}" alt={{ $galery->image }}>
                            </div>
                        </button>
                    </div>
                    <div id={{ $galery->image }} tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow flex justify-center items-center p-10">
                                <img class="object-cover" src="/storage/{{ $galery->image }}" alt={{ $galery->image }}>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute inset-y-0 left-0 flex items-center">
                <button id="scrollLeftBtn" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center">
                <button id="scrollRightBtn" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 4.293a1 1 0 0 1 1.414 0L15 10l-5.293 5.293a1 1 0 0 1-1.414-1.414L12.586 10 7.293 4.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap-reverse w-full justify-center justify-items-center items-end place-items-center px-6 py-16">
        <div class="w-full md:w-5/12 pt-12 md:pt-0 flex flex-col gap-x-6 items-center min-[1198px]:pl-16">
            <div class="w-full pb-6 md:pb-12 md:pt-12 text-center md:text-left">
                <p class="md:text-6xl sm:text-5xl text-4xl erica pb-2 md:pb-6">{{ $project->name }}</p>
                <p class="md:text-2xl sm:text-xl text-lg erica">{{ $project->nim }}</p>
            </div>
            {{-- Contact Card --}}
            <div class="grid grid-cols-2 rounded-lg bg-gradient-to-b from-[#865E9F] p-5 w-full gap-x-6 min-[541px]:w-3/4 md:w-full">
                <div>
                    <p class="min-[1198px]:text-4xl md:text-2xl min-[404px]:text-3xl text-2xl hebrew font-bold pb-1 md:pb-3">Contact: </p>
                    <p class="min-[1198px]:text-2xl md:text-lg min-[404px]:text-xl text-lg overflow-wrap break-words hebrew font-bold">{{ $project->ig }}</p>
                    <p class="min-[1198px]:text-2xl md:text-lg min-[404px]:text-xl text-lg overflow-wrap break-words hebrew font-bold">{{ $project->wa }}</p>
                </div>
                <div>
                    <p class="min-[1198px]:text-4xl min-[404px]:text-3xl text-2xl hebrew font-bold pb-3">Scan / click here!</p>
                    <a href={{ $project->qrlink }} target="_blank">
                        <img src="/storage/{{ $project->qr }}" alt="{{ $project->title }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="w-96 md:w-7/12 h-full m-auto flex justify-center items-center">
            <img src="/storage/{{ $project->profile }}" alt="{{ $project->name }}" class="max-w-full max-h-full">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('backButton').addEventListener('click', function() {
            history.back();
        });

        const buttonRight = document.getElementById('scrollRightBtn');
        const buttonLeft = document.getElementById('scrollLeftBtn');
        let scrollInterval;

        buttonRight.addEventListener('mousedown', handleScrollRight);
        buttonLeft.addEventListener('mousedown', handleScrollLeft);
        buttonRight.addEventListener('touchstart', handleScrollRight);
        buttonLeft.addEventListener('touchstart', handleScrollLeft);

        buttonRight.addEventListener('mouseup', clearScrollInterval);
        buttonLeft.addEventListener('mouseup', clearScrollInterval);
        buttonRight.addEventListener('touchend', clearScrollInterval);
        buttonLeft.addEventListener('touchend', clearScrollInterval);

        function handleScrollRight() {
        scrollInterval = setInterval(() => {
            document.getElementById('container').scrollLeft += 10;
        }, 10);
        }

        function handleScrollLeft() {
        scrollInterval = setInterval(() => {
            document.getElementById('container').scrollLeft -= 10;
        }, 10);
        }

        function clearScrollInterval() {
        clearInterval(scrollInterval);
        }
    });
</script>

@endsection