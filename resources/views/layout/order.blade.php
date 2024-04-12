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
              <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">
                <span data-feather="home"></span>
                Order
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/stock') }}">
                <span data-feather="file"></span>
               Stock
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/routes">
                <span data-feather="shopping-cart"></span>
                Message
              </a>
            </li>


          </ul>
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-3">

        <div class="headstock">
            <div class="s">
               <h1>Order</h1>
            </div>
          <div class="text-gray-300 btn-s">
            <a href="" class="btn act">Received</a>
            <a href="" class="btn">Processed</a>
            <a href="" class="btn">Pending</a>
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
                        <th class="product-name">Name</th>
                        <th class="product-price">Order-ID</th>
                        <th class="product-address">Addres</th>
                        <th class="product-address">Contacts</th>
                        <th class="product-remove">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Moses Bunango</td>
                            <td>O-234234</td>
                            <td>mwananchi, Ubungo ,Dar es salaam</td>
                            <td>+2557 322 2345</td>
                            <td> <a href="{{ url('/view') }}" class="badge btn btn-info ">View Order</a> <a href="" class="badge btn btn-danger">Pending</a></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>

      </main>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
