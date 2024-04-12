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
            <div class="flex">
               <h1 class="ss">NCD Orders</h1>
            </div>
          <div class="text-gray-300 btn-s">
            <a href="{{ url('/dashboard') }}" class="btn act">Back</a>
        </div>
        </div>

<div class="s flex">
    <h1>Moses Bunango</h1> <span>(mwananchi,ubungo,Dar es salaam : +25573223273)</span>
</div>

<div class="cont">

</div>

<div class="headstock mt-4">
    <div class="s">
       <h1>Order List</h1>
    </div>
  <div class="text-gray-300 btn-s">
   Verify prescription:  <a href="" class="badge btn-primary">Prescription</a>
</div>
</div>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th class="product-name">NCD Name</th>
        <th class="product-price">Quantity</th>
        <th class="product-price">Price</th>
      </tr>
    </thead>
    <tbody>
        <t>
        <td>1</td>
        <td class="product-name">Obesity</td>
        <td class="product-price">2</td>
        <td class="product-price">30000/=</td>
      </tr>
      <t>
        <td>2</td>
        <td class="product-name">Sugar dosage</td>
        <td class="product-price">1</td>
        <td class="product-price">90000/=</td>
      </tr>
    </tbody>


</table>

<div class="headstock">
    <div class="s">
       <h1>Total Price</h1>
    </div>
  <div class="text-gray-300 btn-s">
    <a href="" class="btn">120000/=</a>
</div>
</div>



      </main>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
