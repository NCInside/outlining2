<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Outlining</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div class="min-h-screen bg-cover bg-no-repeat overflow-x-hidden" style="background-image: url(@yield('bg'))">
        <nav x-data="{ open: false }" class="bg-gradient-to-b from-[#000000] text-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex justify-between">
                        <div class="shrink-0 flex items-center">
                            <a href="/" class='text-white text-4xl erica'>Outlining<br/>Design</a>
                        </div>
                        <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                            <x-navlink :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-navlink>
                            <x-navlink :href="route('project.index')" :active="request()->routeIs('project.index')">
                                Student’s<br>Final Project
                            </x-navlink>
                            <x-navlink :href="route('about')" :active="request()->routeIs('about')">
                                About<br>Outlining
                            </x-navlink>
                        </div>
                    </div>

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-dropdown-link :href="route('home')">
                        {{ __('Home') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('project.index')">
                        {{ __("Student's Final Project") }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('about')">
                        {{ __("About Outlining") }}
                    </x-dropdown-link>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="flex justify-center bg-gradient-to-t py-6 from-[#000000] gap-x-8">
                <a href=""><img src="{{ asset('iglogo.svg') }}" alt="IG"></a>
                <a href=""><img src="{{ asset('utublogo.svg') }}" alt="YT"></a>
                <a href=""><img src="{{ asset('fblogo.svg') }}" alt="FB"></a>
                <a href=""><img src="{{ asset('walogo.svg') }}" alt="WA"></a>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>