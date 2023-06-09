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
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if ($errors->has('logo'))
                    <p class="text-danger">{{ $errors->first('logo') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">BG</label>
                <input type="file" name="bg" class="form-control">
                @if ($errors->has('bg'))
                    <p class="text-danger">{{ $errors->first('bg') }}</p>
                @endif
            </div>
        
            <button type="submit" class="bg-green-300 rounded p-3 mt-5 hover:bg-green-500 hover:ring-2 hover:ring-green-500">Submit</button>
        
        </form>
    </div>
</body>
</html>