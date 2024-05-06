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
                      <a class="sidebar-link" href="{{ route('order.index') }}">
                          <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Order</span>
                      </a>
                  </li>

                  <li class="sidebar-item active">
                      <a class="sidebar-link" href="{{ route('stock.index') }}">
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
                              <a href="{{ url('/chat') }}" class="btn btn-primary">Messages</a>
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
                  <h1 class="h3 mb-3">Available Stock</h1>
              </div>
              <div class="text-gray-300 ">
                <button type="button" class="btn cloth btn act" data-toggle="modal" data-target="#exampleModal">
                    Add stock
                  </button>
            </div>
                  </div>


                      <div class="row">
                          <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                              <div class="card flex-fill">
                                <div class="site-blocks-table">

                                    @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                    </div>
                                      @endif

                                  <table class="table my-0">
                                      <thead>
                                          <tr>
                                              <th></th>
                                              <th>No.</th>
                                              <th class="d-none d-xl-table-cell">NCD Name</th>
                                              <th class="d-none d-xl-table-cell">Price</th>
                                              <th class="d-none d-xl-table-cell">Quantity</th>
                                              <th class="d-none d-md-table-cell">Description</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                        @if($product->count()>0)
                        @foreach ($product as $prod)

                      <tr>
                        @if($prod->status === 'low')
                        <td>
                                <img src="/image/sdfs.gif" alt="" class="img-fluid rounded-circle" style="width: 30px;">
                    </td>
                    @else
                    <td>

                    </td>
                    @endif
                        <td>{{ $loop->iteration }}</td>

                        <td class="product-name">
                            {{ $prod->medicine_name }}
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
                        <td class="text-center" colspan="8">NCD medicine not found</td>
                    </tr>
                @endif

                                      </tbody>
                                  </table>
                              </div>
                          </div>

                      </div>

                  </div>
              </div>
          </main>

        </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new stock</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form  action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
                    {!!  csrf_field() !!}

                       <div class="mb-3">
                           <label for="price" class="form-label">Medicine name</label>
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
                           <label for="title" class="form-label">Description</label>
                           <textarea type="text" class="form-control" name="description" placeholder="description" required></textarea>
                         </div>


               <div class="flex justify-end">
                   <button class="btn act">Add</button>
                 </div>

                   </form>


            </div>

          </div>
        </div>
      </div>



</x-app-layout>
