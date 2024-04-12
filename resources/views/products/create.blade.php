@extends('layout.stock')

@section('body')


<div class="add_form hidden">

<form  action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
     {!!  csrf_field() !!}

        <div class="mb-3">
            <label for="price" class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" placeholder="product_name" required>
          </div>

          <div class="mb-3">
            <label for="productCode" class="form-label">Price (each product)</label>
            <input type="text" class="form-control" name="price" placeholder="Price" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Quantity</label>
            <input type="text"  class="form-control" name="quantity" placeholder="Quantity" required>
          </div>


        <div class="mb-3">
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" placeholder="description" required>
          </div>


<div class="flex justify-end">
    <button class="btn act">Add</button>
  </div>

    </form>

    </div>


@endsection
