<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    
    <style>
        .pagination .page-link {
            background-color: #222;
            color: #fff;
            border-color: #444;
        }

        .pagination .page-link:hover {
            background-color: #333;
        }

        .pagination .active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff !important;
        }
    </style>


<body style="background-color: rgb(20, 19, 19)">
    <div class="container mt-5">
        <h1 class="text-white mb-4">Products List</h1>
        
        <!-- Search Form -->
        <form method="GET" action="{{ route('products.search') }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products..." name="search" aria-label="Search for products...">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </div>
        </form>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name en</th>
                    <th scope="col">Name ar</th>
                    <th scope="col">Description en</th>
                    <th scope="col">Description ar</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created At</th>  
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->getTranslation('name' , 'en') }}</td>
                        <td>{{ $product->getTranslation('name' , 'ar') }}</td>
                        <td>{{ $product->getTranslation('description' , 'en') }}</td>
                        <td>{{ $product->getTranslation('description' , 'ar') }}</td>
                        <td>{{ $product->price }}$</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>

        {{-- <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </ul>
        </nav> --}}

    </div>
</body>
</html>
