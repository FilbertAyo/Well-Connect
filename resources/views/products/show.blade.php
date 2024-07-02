
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
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('stock.management') }}">
                        <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Store</span>
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
                      <div class="mb-3 ">
                  <h1 class="h3 d-inline align-middle">NCD Medicine Details</h1>


                  @if($product->status === 'low')
                  <span class="badge btn-danger text-white ms-2">
                    Your stock is running {{ $product->status }}
                </span>
                @else
                <span class="badge btn-success text-white ms-2">
                    Your stock is {{ $product->status }} for current demand.
                </span>
                @endif



              </div>
              <div class="text-gray-300 ">
                <a href="{{ route('stock.index') }}" class="cloth btn act">Go back</a>
            </div>
                  </div>


                      <div class="row">
                          <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                              <div class="card flex-fill">
                                <div class="p-3">

                <div class="mb-3">
                    <label for="name" class="form-label">NCD Medicine name</label>
                    <input type="text" class="form-control" name="name" placeholder="product_name" value="{{ $product->medicine_name }}" readonly>
                  </div>

                                      <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}/=" readonly>
                                      </div>

                                      <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text"  class="form-control" name="quantity" placeholder="Quantity" value="{{ $product->quantity }}" readonly>
                                      </div>

                                      <div class="mb-3">
                                        <label for="quantity" class="form-label">Category</label>
                                        <input type="text"  class="form-control" name="category" placeholder="Category" value="{{ $product->category }}" readonly>
                                      </div>

                                      <div class="mb-3">
                                        <label for="quantity" class="form-label">Description</label>
                                        <input type="text"  class="form-control" name="description" placeholder="Description" value="{{ $product->description }}" readonly>
                                      </div>


                                      <div class="cr mt-4">
                                        <div class="">
                                          <label class="form-label">created At</label>
                                          <span class="badge bg-warning" readonly> {{ $product->created_at }}</span>
                                        </div>

                                        <div class="">
                                          <label class="form-label">Updated At</label>
                                          <span class="badge bg-warning" readonly> {{ $product->updated_at }}</span>
                                        </div>
                                    </div>

                              </div>
                          </div>

                      </div>

                  </div>
              </div>
          </main>

        </div>
    </div>





</x-app-layout>





