<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CURD App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Products</a>
          </li>
          
        </ul>
      
      </nav>

    <div class="container">

        <div class="text-end">
            <a  href="/products/create" class="btn btn-dark mt-2">New Product</a>
        </div>
        <h1>Products</h1>

         <table class="table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ( $products as $product )
          
    
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td> <img src="products/{{$product->image}}" alt=""class="rounded-circle" height="50" width="50" > </td>
        <td><a  href="/product/{{$product->id}}" class="btn btn-primary">Edit</a> <form action="/product/{{$product->id}}" method="post">@csrf  @method('DELETE')<button class="btn btn-danger">Delete</button></form>
        </td>
      </tr>
        @endforeach
        
    </tbody>
    
  </table>
  {!!$products->links()!!}
    </div>
    
</body>
</html>