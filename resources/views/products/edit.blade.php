
<x-app-layout>



    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
          <div class="sidebar-content js-simplebar">
              <a class="sidebar-brand" href="index.html">
                  <span class="align-middle">Well-Connect</span>
              </a>

              <ul class="sidebar-nav">
                  <li class="sidebar-header">
                      Pages
                  </li>

                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{ url('/dashboard') }}">
                          <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Order</span>
                      </a>
                  </li>

                  <li class="sidebar-item active">
                      <a class="sidebar-link" href="{{ url('/stock') }}">
                          <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Stock</span>
                      </a>
                  </li>


                  <div class="sidebar-cta">
                      <div class="sidebar-cta-content">
                          <strong class="d-inline-block mb-2">Chat</strong>
                          <div class="mb-3 text-sm">
                              Do you face a problem? Check out the system admin.
                          </div>
                          <div class="d-grid">
                              <a href="upgrade-to-pro.html" class="btn btn-primary">Messages</a>
                          </div>
                      </div>
                  </div>
          </div>
      </nav>

      <div class="main">

          @include('layouts.navigation')


          <main class="content">

              <div class="container-fluid p-0">

                  <div class="headstock">
                      <div class="">
                  <h1 class="h3 mb-3">Edit NCD Medicine Details</h1>
              </div>
              <div class="text-gray-300 ">
                <a href="{{ route('stock.index') }}" class="cloth btn act">Go back</a>
            </div>
                  </div>


                      <div class="row">
                          <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                              <div class="card flex-fill p-3">

                                    <form action="{{ route('stock.update', $product->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')


                                                <div class="mb-3">
                                                    <label for="name" class="form-label">NCD Medicine name</label>
                                                    <input type="text" class="form-control" name="medicine_name" placeholder="product_name" value="{{ $product->medicine_name }}">
                                                    @if ($errors->has('medicine_name'))
                                                    <div class="alert alert-danger">
                                                   invalid name of medicine
                                                    </div>
                                                    @endif
                                                  </div>

                                                  <div class="mb-3">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}">
                                                    @if ($errors->has('price'))
                                                    <div class="alert alert-danger">
                                                   invalid price format
                                                    </div>
                                                    @endif
                                                  </div>

                                                  <div class="mb-3">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="text"  class="form-control" name="quantity" placeholder="Quantity" value="{{ $product->quantity }}">
                                                    @if ($errors->has('quantity'))
                                                    <div class="alert alert-danger">
                                                   invalid input
                                                    </div>
                                                    @endif
                                                  </div>

                                                  <div class="mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <input type="text"  class="form-control" name="category" placeholder="category" value="{{ $product->category }}">
                                                    @if ($errors->has('category'))
                                                    <div class="alert alert-danger">
                                                   invalid category input
                                                    </div>
                                                    @endif
                                                  </div>

                                                  <div class="mb-3">
                                                    <label for="quantity" class="form-label">Description</label>
                                                    <input type="text"  class="form-control" name="description" placeholder="Description" value="{{ $product->description }}">
                                                    @if ($errors->has('description'))
                                                    <div class="alert alert-danger">
                                                   invalid description
                                                    </div>
                                                    @endif
                                                  </div>

                                                  <div class="flex justify-end">
                                                    <button class="cloth btn act">Update</button>
                                                  </div>

                                            </form>

                          </div>

                      </div>

                  </div>

              </div>
          </main>

      </div>
    </div>

</x-app-layout>





