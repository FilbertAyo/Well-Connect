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
              <h1 class="h3 mb-3">NCD Orders</h1>
          </div>
              <div class="text-gray-300 btn-s">
                <a href="{{ route('order.index') }}" class="btn">Received</a>
                <a href="{{ url('/pending_order') }}" class="btn">Pending</a>
                <a href="{{ url('/completed_order') }}" class="btn act">Completed</a>

              </div>
              </div>

                  <div class="row">
                      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                          <div class="card flex-fill">

                              <table class="table table-hover my-0">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th class="d-none d-xl-table-cell">Name</th>
                                          <th class="d-none d-xl-table-cell">Address</th>
                                          <th class="d-none d-md-table-cell">Contacts</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                    $userOrdersDisplayed = [];
                                    @endphp

                                    @if($trashedOrder->count() > 0)
                                        @foreach ($trashedOrder as $order)
                                        @php
                                        // Create a unique key for each user order based on user_id and created_at timestamp
                                        $orderKey = $order->user_id . '_' . $order->created_at->timestamp;
                                    @endphp

                                            @if (!array_key_exists($orderKey, $userOrdersDisplayed))
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->user_name }}</td>
                                                    <td>{{ $order->user_address }}</td>
                                                    <td>{{ $order->user_email }}</td>
                                                    <td>
                                                            <span class="badge btn btn-success">completed</span>
                                                            <span class="badge btn btn-primary">{{ $order->deleted_at }}
                                                    </td>
                                                </tr>
                                                @php
                                                // Mark user_id as displayed
                                                $userOrdersDisplayed[$orderKey] = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="5">Processed order not found</td>
                                        </tr>
                                    @endif
                                </tbody>


                              </table>
                          </div>
                      </div>

                  </div>

              </div>
      </main>

  </div>
  </div>

  </x-app-layout>
