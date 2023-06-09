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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div class="p-10">
        <form action="{{ route('galery.store') }}" method="POST" enctype="multipart/form-data">
    
            @csrf
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
                @if ($errors->has('image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="project">Project:</label>
                <select name="project" id="project" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="bg-green-300 rounded p-3 mt-5 hover:bg-green-500 hover:ring-2 hover:ring-green-500">Submit</button>
        
        </form>
    </div>
</body>
</html>