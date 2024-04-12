
<x-app-layout>


    <div class="py-0">

            <div class="bg-white overflow-hidden shadow-sm ">



  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item itemdash">
              <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">
                <span data-feather="home"></span>
                Order
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/stock') }}">
                <span data-feather="file"></span>
               Stock
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/routes">
                <span data-feather="shopping-cart"></span>
                Messages
              </a>
            </li>


          </ul>
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-3">

        <div class="headstock">
            <div class="s">
               <h1>NCD Medicine Details</h1>
            </div>
          <div class="text-gray-900 ">
            <a href="{{ url('/stock') }}" class="cloth btn act">Go back</a>
        </div>
        </div>


    <div class="col-md-12">


                <div class="mb-3">
                    <label for="name" class="form-label">NCD Medicine name</label>
                    <input type="text" class="form-control" name="name" placeholder="product_name" value="{{ $product->name }}" readonly>
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


      </main>
        </div>
    </div>
    </div>

    </div>


</x-app-layout>





