<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

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
            <li class="nav-item actv">
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
               <h1>Stock</h1>
            </div>

           
          <div class="text-gray-300 ">
            <a href="" class="cloth btn act">Add item</a>
        </div>
        </div>

    <div class="col-md-12">

                <div class="site-blocks-table">

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                    </div>
                      @endif

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th class="product-name">NCD Name</th>
                        <th class="product-price">Price</th>
                        <th class="product-price">Quantity</th>
                        <th class="product-description">Description</th>
                        <th class="product-remove">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @if($product->count()>0)
                        @foreach ($product as $prod)

                      <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td class="product-name">
                            {{ $prod->name }}
                        </td>
                        <td>{{ $prod->price }}/=</td>
                        <td>{{ $prod->quantity }}</td>
                        <td class="product-name">
                            {{ $prod->description }}
                        </td>
                        <td>
                            <a href="{{ route('stock.show', $prod->id) }}" class="badge btn btn-info ">Details</a>
                            <a href="{{ route('stock.edit', $prod->id) }}" class="badge btn btn-primary  ">Edit</a>
                            <a href="" class="badge btn btn-danger">

                                <form action="{{ route('stock.destroy',$prod->id) }}" method="POST" type= "button" class=" height-auto p-0" onsubmit="return confirm('Delete')">
                                    @csrf
                                    @method('DELETE')

                                                        <button class="">Delete</button>
                                                    </form>

                            </a>


                        </td>
                      </tr>

                      @endforeach
                      @else
                      <tr>
                        <td class="text-center" colspan="5">Product not found</td>
                    </tr>
                @endif

                    </tbody>
                  </table>
                </div>
            </div>

            <div class="container py-7">
                @yield('body')
              </div>

      </main>
        </div>
    </div>
    </div>

    </div>


</x-app-layout>
