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


     {{--  @if($message = session::get('success'))
      <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
      </div>
      @endif --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <form method="POST" action="/product/update/{{$product->id}}" enctype="multipart/form-data">
                
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$product->id}}"/>
                        <label for="">Name</label>
                        <input type="text" name="name"  class="form-control" value="{{$product->name}}" >
                        @if ($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="40" rows="5" >{{$product->description}}</textarea>                       
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>

                        <img class="rounded-circle" width="50" height="50"  src="{{asset('products/'.$product->image)}}" alt="">
                        <input type="file" name="image" class="form-control">
                    </div>
                    

                    <button type="submit" class="btn btn-dark">Update</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>