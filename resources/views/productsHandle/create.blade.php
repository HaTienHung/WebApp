<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    input {
      width: 400px;
      height: 60px;
      overflow-wrap: break-word;
    }
  </style>
</head>

<body>
  <div style="top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position:absolute">
    <h1>Create product</h1>
    <div>
      @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      @if(session()->has('success'))
      <div>
        {{session('success')}}
      </div>
      @endif
    </div>
    <form method="post" action="{{route('product.store')}}">
      @csrf
      @method('post')
      <table>
        <tr>
          <th>Name</th>
          <td>
            <input type="text" name="name" placeholder="Name">
          </td>
        </tr>
        <tr>
          <th>Price</th>
          <td>
            <input type="text" name="price" placeholder="price">
          </td>
        </tr>
        <tr>
          <th>Colors</th>
          <td>
            <input type="text" name="colors" placeholder="colors">
          </td>
        </tr>
        <tr>
          <th>Sizes</th>
          <td>
            <input type="text" name="sizes" placeholder="sizes">
          </td>
        </tr>
        <tr>
          <th>Quantity</th>
          <td>
            <input type="text" name="quantity" placeholder="quantity">
          </td>
        </tr>
        <tr>
          <th>Description</th>
          <td>
            <input type="text" name="description" placeholder="Description">
          </td>
        </tr>
        <tr>
          <th>productImage</th>
          <td>
            <input class="h-20" type="text" name="productImage" placeholder="productImage">
          </td>
        </tr>
        <tr>
          <th>Category</th>
          <td>
            <input type="text" name="category" placeholder="category">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" value="save a new Product"></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>