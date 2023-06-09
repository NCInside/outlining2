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
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
    
            @csrf
            <div class="mb-3">
                <label for="">BG</label>
                <input type="file" name="bg" class="form-control">
                @if ($errors->has('bg'))
                    <p class="text-danger">{{ $errors->first('bg') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500l"></textarea>
                @if ($errors->has('description'))
                    <p class="text-danger">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Photo</label>
                <input type="file" name="photo" class="form-control">
                @if ($errors->has('photo'))
                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Video</label>
                <input type="text" name="video" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('video'))
                    <p class="text-danger">{{ $errors->first('video') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">NIM</label>
                <input type="text" name="nim" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('nim'))
                    <p class="text-danger">{{ $errors->first('nim') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Profile</label>
                <input type="file" name="profile" class="form-control">
                @if ($errors->has('profile'))
                    <p class="text-danger">{{ $errors->first('profile') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">IG</label>
                <input type="text" name="ig" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('ig'))
                    <p class="text-danger">{{ $errors->first('ig') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">WA</label>
                <input type="text" name="wa" class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($errors->has('wa'))
                    <p class="text-danger">{{ $errors->first('wa') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">QR</label>
                <input type="file" name="qr" class="form-control">
                @if ($errors->has('qr'))
                    <p class="text-danger">{{ $errors->first('qr') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Highlight</label>
                <input type="checkbox" name="highlight" id="highlight" value="1">
            </div>
            <div class="mb-3">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="bg-green-300 rounded p-3 mt-5 hover:bg-green-500 hover:ring-2 hover:ring-green-500">Submit</button>
        
        </form>
    </div>
</body>
</html>