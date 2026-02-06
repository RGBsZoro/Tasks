<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Products</title>

    <style>
        body {
            background-color: rgb(20, 19, 19);
            color: white;
        }
        .form-label {
            color: white;
        }
        .form-control, .form-select {
            background-color: rgb(50, 50, 50);
            color: white;
        }
        .form-control::placeholder, .form-select {
            color: rgba(255, 255, 255, 0.6);
        }
        .btn-primary {
            background-color: rgb(0, 123, 255);
            border-color: rgb(0, 123, 255);
        }
        .btn-primary:hover {
            background-color: rgb(0, 105, 217);
            border-color: rgb(0, 105, 217);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        {{-- Name EN --}}
        <div class="mb-3">
            <label class="form-label">Name (English)</label>
            <input 
                type="text" 
                class="form-control" 
                name="name[en]" 
                placeholder="Enter product name in English"
                value="{{ old('name.en') }}"
                required>
        </div>

        {{-- Name AR --}}
        <div class="mb-3">
            <label class="form-label">Name (Arabic)</label>
            <input 
                type="text" 
                class="form-control" 
                name="name[ar]" 
                placeholder="Enter product name in Arabic"
                value="{{ old('name.ar') }}"
                required>
        </div>

        {{-- Description EN --}}
        <div class="mb-3">
            <label class="form-label">Description (English)</label>
            <textarea 
                class="form-control" 
                name="description[en]" 
                rows="3"
                placeholder="Enter description in English">{{ old('description.en') }}</textarea>
        </div>

        {{-- Description AR --}}
        <div class="mb-3">
            <label class="form-label">Description (Arabic)</label>
            <textarea 
                class="form-control" 
                name="description[ar]" 
                rows="3"
                placeholder="Enter description in Arabic">{{ old('description.ar') }}</textarea>
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input 
                type="number" 
                step="0.01"
                class="form-control" 
                name="price" 
                placeholder="Enter price"
                value="{{ old('price') }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
