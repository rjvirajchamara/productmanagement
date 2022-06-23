<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Product Update</title>
</head>
<body>
<div class="col-md-4 m-auto border mt-3 p-2 border-info" >
 <form action="{{url('productupdates')}}" method="POST" enctype="multipart/form-data">
     @csrf

    <div class="mb-2">
        @foreach ($product as $products)
        <label>Product Name</label>
        <input type="text" name="name" value="{{ $products->name }}" class="form-control" id="name" >
        <input type="hidden" name="id" value="{{ $products->id }}" class="form-control" id="id" >
       </div>
       <div class="mb-2">
        <label>Product Price</label>
        <input type="text" name="price" value="{{ $products->price}}" class="form-control" id="price" >
       </div>
       <div class="mb-2">
        <label>Product image</label>
        <input type="file" name="image" value="{{ $products->img_url}}" class="form-control" id="image" >
       </div>
       @endforeach
       <center>
        <br>
       <button type="submit" class="btn btn-outline-success">Update Record</button>
       </center>
    </form>
 </form>
</div>
</body>
</html>
</x-app-layout>
