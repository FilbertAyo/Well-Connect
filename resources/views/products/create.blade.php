@extends('layout.stock')

@section('body')


<div class="add_form hidden">

<form  action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
     {!!  csrf_field() !!}

        <div class="mb-3">
            <label for="medicine_name" class="form-label">medicine name</label>
            <input type="text" class="form-control" name="medicine_name" placeholder="medicine_name" required>
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
            <label for="category" class="form-label">Category</label>
            <input type="text"  class="form-control" name="category" placeholder="category" required>
          </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" placeholder="description" required>
          </div>


<div class="flex justify-end">
    <button class="btn act">Add</button>
  </div>

    </form>

    </div>


@endsection
