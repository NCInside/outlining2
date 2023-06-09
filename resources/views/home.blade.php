@extends('components.layout')

@section('bg', "bg-home.png")

@section('content')

<div class='grid place-items-center w-full'>
    <div class='text-center pt-16'>
        <p class='text-white text-xl font-semibold'>Welcome to<br/>Visual Communication Design's</p>
        <p class='text-white text-6xl py-8 font-bold'>Outlining Design 2023</p>
        <p class='text-white text-md px-12'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class='text-center pt-16 px-8'>
        <p class='text-white font-semibold text-2xl'>Highlights</p>
        <div id="highlightContainer" class="py-8 gap-x-12 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 justify-center place-items-center">
            <button id="prevButton" class="bg-gray-200 rounded-full p-0 w-16 h-16" disabled>
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            @foreach ($highlights as $key => $highlight)
                <div class="highlight-card" style="{{ $key >= 3 ? 'display:none' : '' }}">
                    <x-projectcard :project="$highlight" />
                </div>
                {{-- @php
                    $showHighlight = '';
                @endphp
                <div class="highlight-card {{ $showHighlight }}">
                    <x-projectcard :project="$highlight" />
                </div> --}}
            @endforeach
            <button id="nextButton" class="bg-gray-200 rounded-full p-0 w-16 h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 4.293a1 1 0 0 1 1.414 0L15 10l-5.293 5.293a1 1 0 0 1-1.414-1.414L12.586 10 7.293 4.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>        
    </div>
    <div class='text-center pt-16'>
        <p class='text-white font-semibold text-2xl'>Explore Outlining Design</p>
        <div class='grid gap-y-16 gap-x-8 min-[500px]:grid-cols-2 min-[930px]:grid-cols-3 grid-cols-1'>
            @foreach($categories as $category)
                <div class="flex flex-col relative mr-3">
                    <div class="m-6">
                        <a href="{{ route("category.show", ['category'=>$category]) }}">
                            <img src="/storage/{{ $category->logo}}" class="h-48 w-full hover:transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="pt-6">
                            <div class="whitespace-pre-wrap font-semibold text-white text-lg">{{ $category->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");
        const highlightContainer = document.getElementById("highlightContainer");
        var showHighlight;
        let startIndex = 0;
        let endIndex = 2;
        
        function updateView() {
            const highlights = document.querySelectorAll("#highlightContainer .highlight-card");
            
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
            const highlights = document.querySelectorAll("#highlightContainer .highlight-card");
            
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
