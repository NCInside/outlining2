@props(['project'])

<a href="{{ route('project.show', ['project' => $project]) }}">
    <div class="h-64 w-48 bg-cover bg-no-repeat relative hover:transform hover:scale-110 transition duration-500" style="background-image: url(/storage/{{ $project->photo }})">
        <div class="absolute bottom-0 bg-gradient-to-b from-[#000000] text-left w-full pl-3 pt-1 pb-4">
            <p class="text-white text-xl font-bold">{{ $project->title }}</p>
            <p class="text-white font-semibold">{{ $project->name }}</p>
        </div>
    </div>
</a>