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
            color: white; /* تغيير لون النص إلى الأبيض */
        }
        .form-label {
            color: white; /* تغيير لون تسميات الحقول إلى الأبيض */
        }
        .form-control, .form-select {
            background-color: rgb(50, 50, 50); /* لون خلفية الحقول */
            color: white; /* لون نص الحقول */
        }
        .form-control::placeholder, .form-select {
            color: rgba(255, 255, 255, 0.6); /* لون النص في الحقول الفارغة */
        }
        .btn-primary {
            background-color: rgb(0, 123, 255); /* لون زر الإرسال */
            border-color: rgb(0, 123, 255); /* لون حدود الزر */
        }
        .btn-primary:hover {
            background-color: rgb(0, 105, 217); /* لون الزر عند التحويم */
            border-color: rgb(0, 105, 217); /* لون حدود الزر عند التحويم */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create Products</h1>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the project name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter the price" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Accessories">Accessories</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter a description" rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
 </body>
</html>
