<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title> Add New Product</title>
</head>
<body>

<!-- Button trigger modal -->
<br>
<center>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{url('insertProduct')}}" method="POST" enctype="multipart/form-data">
              @csrf
             <div class="mb-2">
              <input type="text" class="form-control" placeholder="Enter Product Name" name="name" id="name">
             </div>
            <div class="mb-2">
              <input type="text" class="form-control" placeholder="Enter Product Price" name="price" id="Price">
             </div>
             <div class="mb-2">
                <input type="file" class="form-control"  name="image" id="image">
               </div>
               <button type="submit" class="btn btn-outline-success">Add Record</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
</center>
   <div class="container">
       <table class="table mt-5">
        <thead class="bg-danger text-whith fw-bold">

            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Status</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </thead>
        <tbody>
        @foreach($products as $product)

            <tr>
            <td>
            <img width="70" height="50" controls  src="images/{{$product->img_url}}" alt="">
            </td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->price}}</th>
            <td>
                @if($product->status)
                <a href="/deactive/{{$product->id}}" class="btn btn-danger">Inactive</a></th>
                @else
                <a href="/active/{{$product->id}}" class="btn btn-success ">active</a></th>
                @endif
                <td>
            <a href="/update_product/{{$product->id}}"  class="btn btn-primary">Edit</a>
            <td>
            <a href="/delete_product/{{$product->id}}" class="btn btn-danger">Delete</a></th>
            </tr>
          @endforeach

        </tbody>
      </table>
      {{$products->links() }}
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
</x-app-layout>

