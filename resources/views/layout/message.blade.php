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

              <li class="sidebar-item active">
                  <a class="sidebar-link" href="{{ route('order.index') }}">
                      <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Order</span>
                  </a>
              </li>

              <li class="sidebar-item">
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
                          <a href="{{ route('chatify') }}" class="btn btn-primary">Messages</a>
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
              <h1 class="h3 mb-3">Messages</h1>
          </div>

              </div>

              <div class="col-md-12 col-xl-12">
                <div class="card">

                    <div class="card-body h-100">

                        <div class="d-flex align-items-start">

                            <div class="flex-grow-1">
                                <small class="float-end text-navy">5m ago</small>
                                <strong>Admin</strong>
                                <small class="text-muted">Today 7:51 pm</small><br />
                                Update your obesity stock

                            </div>
                        </div>


                        <hr />



                    </div>
                </div>
            </div>



              </div>
      </main>

  </div>
  </div>

  </x-app-layout>
