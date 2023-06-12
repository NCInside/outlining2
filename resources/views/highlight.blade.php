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
    <div class='text-center pt-16 px-2'>
        <p class='erica text-2xl'>Final Project Gallery</p>
        <div id="galeryContainer" class="py-8 gap-x-12 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 justify-center place-items-center">
            <button id="prevButton" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16" disabled>
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            @foreach ($project->galeries as $key => $galery)
                <div class="galery-card" style="{{ $key >= 3 ? 'display:none' : '' }}">
                    {{-- <img src="/storage/{{ $galery->image }}" alt="{{ $galery->project_id }}"> --}}
                    <button data-modal-target={{ $galery->image }} data-modal-toggle={{ $galery->image }}>
                        <div class="h-64 w-32 md:w-44 bg-cover bg-no-repeat relative hover:transform hover:scale-110 transition duration-500" style="background-image: url(/storage/{{ $galery->image }})"></div>
                    </button>
                </div>
                <div id={{ $galery->image }} tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
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
        </div>        
    </div>
    <div class="flex flex-wrap-reverse w-full justify-around justify-items-center items-end px-6 py-16">
        <div class="w-full md:w-2/5 pt-12 md:pt-0 flex flex-col gap-x-6 items-end">
            <div class="w-full pb-6 md:pb-12 md:pt-12 text-center md:text-left">
                <p class="md:text-6xl sm:text-5xl text-4xl erica pb-2 md:pb-6">{{ $project->name }}</p>
                <p class="md:text-2xl sm:text-xl text-lg erica">{{ $project->nim }}</p>
            </div>
            {{-- Contact Card --}}
            <div class="grid grid-cols-2 rounded-lg bg-gradient-to-b from-[#865E9F] p-5 w-full gap-x-6">
                <div>
                    <p class="md:text-4xl sm:text-3xl text-lg hebrew font-bold pb-1 md:pb-3">Contact: </p>
                    <p class="md:text-2xl sm:text-xl text-sm overflow-wrap break-words hebrew font-bold">{{ $project->ig }}</p>
                    <p class="md:text-2xl sm:text-xl text-sm overflow-wrap break-words hebrew font-bold">{{ $project->wa }}</p>
                </div>
                <div>
                    <p class="md:text-4xl sm:text-3xl text-lg hebrew font-bold pb-3">Scan / click here!</p>
                    <a href={{ $project->qrlink }} target="_blank">
                        <img src="/storage/{{ $project->qr }}" alt="{{ $project->title }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="w-96 md:w-3/5">
            <img src="/storage/{{ $project->profile }}" alt="{{ $project->name }}" class="m-auto">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('backButton').addEventListener('click', function() {
            history.back();
        });

        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");
        const galeryContainer = document.getElementById("galeryContainer");
        var showHighlight;
        let startIndex = 0;
        let endIndex = 2;
        
        function updateView() {
            const highlights = document.querySelectorAll("#galeryContainer .galery-card");
            
            // Hide all highlights
            highlights.forEach((highlight) => {
                highlight.style.display = "none";
            });
            
            // Show the relevant highlights based on the current indices
            for (let i = startIndex; i <= endIndex; i++) {
                highlights[i].style.display = "block";
            }
            
            // Enable/disable buttons based on indices
            prevButton.disabled = startIndex === 0;
            nextButton.disabled = endIndex === highlights.length - 1;
        }

        function updateShowHighlight() {
            var mediaWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (mediaWidth < 640) {
                showHighlight = 0;
            } else if (mediaWidth < 760) {
                showHighlight = 1;
            } else {
                showHighlight = 2;
            }

            endIndex = startIndex + showHighlight
            updateView()
        }
        
        updateShowHighlight();
        
        prevButton.addEventListener("click", function() {
            if (startIndex > 0) {
                startIndex--;
                endIndex--;
                updateView();
            }
        });
        
        nextButton.addEventListener("click", function() {
            const highlights = document.querySelectorAll("#galeryContainer .galery-card");
            
            if (endIndex < highlights.length - 1) {
                startIndex++;
                endIndex++;
                updateView();
            }
        });

        var resizeTimer;
        var threshold = 200; // Adjust the threshold value as needed
        window.addEventListener("resize", function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                updateShowHighlight();
            }, threshold);
        });
    });
</script>

@endsection