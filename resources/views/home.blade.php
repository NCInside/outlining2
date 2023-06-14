@extends('components.layout')

@section('bg', "bg-home.png")

@section('content')

<div class='grid place-items-center w-full'>
    <div class='text-center pt-16'>
        <p class='text-white text-xl font-bold hebrew'>Welcome to<br/>Visual Communication Design’s</p>
        <p class='text-white text-6xl py-8 erica'>Outlining Design 2023</p>
        <p class='text-white text-md px-12 hebrew font-medium'>Welcome to the online exhibition of the final projects of the Visual Communication Design class of 2023.  This website showcases the work that our class of 2023 students has created over the course of their final year. The work on this website represents not only culminates our students skills in the field of graphic design, but also their abilities to solve problem using Visual communication Design skill both in their personal and family business.</p>
    </div>
    <div class='text-center pt-16 px-8 grid grid-cols-1 justify-center'>
        <p class='text-white erica text-2xl'>Highlights</p>
        {{-- <div id="highlightContainer" class="py-8 gap-x-12 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 justify-center place-items-center">
            <button id="prevButton" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16" disabled>
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            @foreach ($highlights as $key => $highlight)
                <div class="highlight-card" style="{{ $key >= 3 ? 'display:none' : '' }}">
                    <x-projectcard :project="$highlight" style="h-64 w-32 md:w-44" />
                </div>
                <div id={{ $highlight->title }} tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
            <div class="overflow-x-auto flex-shrink-0 flex gap-x-8 py-8" id="highlight-container">
                @foreach ($highlights as $key => $highlight)
                <div class="highlight-cards">
                    <x-projectcard :project="$highlight" style="w-72" />
                    {{-- <div class="modal w-full max-w-2xl max-h-full bg-white p-4 absolute top-1/2 left-1/2 transform transition-all duration-1000 ease-out -translate-x-1/2 -translate-y-full grid-cols-2 place-items-center justify-center z-50 opacity-0 hidden gap-x-4">
                        <div class="text-center">
                            <a href="{{ route('project.show', ['project' => $highlight]) }}">
                                <div class="w-full m-auto">
                                    <img class="object-cover" src="/storage/{{ $highlight->photo }}" alt="{{ $highlight->title }}">
                                </div>
                            </a>
                        </div>
                        <div class="grid grid-cols-2 rounded-lg bg-gradient-to-b from-[#865E9F] p-5 gap-x-6">
                            <div>
                                <p class="md:text-4xl sm:text-3xl text-md hebrew font-bold pb-1 md:pb-3">Contact: </p>
                                <p class="md:text-2xl sm:text-xl text-xs overflow-wrap break-words hebrew font-bold">{{ $highlight->ig }}</p>
                                <p class="md:text-2xl sm:text-xl text-xs overflow-wrap break-words hebrew font-bold">{{ $highlight->wa }}</p>
                            </div>
                            <div>
                                <p class="md:text-4xl sm:text-3xl text-md hebrew font-bold pb-3">Scan / click here!</p>
                                <a href={{ $highlight->qrlink }} target="_blank">
                                    <img src="/storage/{{ $highlight->qr }}" alt="{{ $highlight->title }}">
                                </a>
                            </div>
                        </div>
                    </div> --}}
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
    <div class='text-center pt-16'>
        <p class='text-white erica text-2xl'>Explore Outlining Design</p>
        <div class='grid gap-y-16 gap-x-8 min-[500px]:grid-cols-2 min-[930px]:grid-cols-3 grid-cols-1'>
            @foreach($categories as $category)
                <div class="flex flex-col relative mr-3">
                    <div class="m-6">
                        <a href="{{ route("category.show", ['category'=>$category]) }}">
                            <img src="/storage/{{ $category->logo}}" class="h-48 w-full hover:transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="pt-6">
                            <div class="whitespace-pre-wrap hebrew font-bold text-white text-lg">{{ $category->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>

<script>
    const buttonRight = document.getElementById('scrollRightBtn');
    const buttonLeft = document.getElementById('scrollLeftBtn');
    let scrollInterval;

    // const modals = document.querySelectorAll('.modal');
    // let timeout;

    // modals.forEach(modal => {
    //     const container = modal.parentElement;

    //     container.addEventListener('mouseenter', () => {
    //         modal.classList.remove('hidden');
    //         modal.classList.add('grid');
    //         timeout = setTimeout(() => {
    //         modal.classList.remove('-translate-y-full', 'opacity-0');
    //         modal.classList.add('-translate-y-1/2', 'opacity-100');
    //         }, 500);
    //     });
        
    //     container.addEventListener('mouseleave', () => {
    //         clearTimeout(timeout);
    //         modal.classList.remove('grid', 'opacity-100', '-translate-y-1/2');
    //         modal.classList.add('hidden', 'opacity-0', '-translate-y-full');
    //     });
    // })

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
        document.getElementById('highlight-container').scrollLeft += 10;
    }, 10);
    }

    function handleScrollLeft() {
    scrollInterval = setInterval(() => {
        document.getElementById('highlight-container').scrollLeft -= 10;
    }, 10);
    }

    function clearScrollInterval() {
    clearInterval(scrollInterval);
    }
</script>

{{-- <script>
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
</script> --}}

@endsection
