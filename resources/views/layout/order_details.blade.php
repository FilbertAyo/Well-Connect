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
                      <div class="mb-3">
                  <h1 class="h3 d-inline align-middle">{{ $order->user_name }}</h1>
                  <a href="{{ $order->prescription }}" class="badge bg-primary  ms-3">prescription</a>
              </div>
              <div class="text-gray-300 btn-s">
                <a href="{{ route('order.index') }}" class="btn act">Back</a>
            </div>
        </div>

        <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">{{ $order->user_address }} : {{ $order->user_email }}</h5>
                </div>
                <div class="card-body px-4">
                    <div id="world_map" style="height:300px;"></div>
                </div>
            </div>
        </div>

                      <div class="row">
                          <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                              <div class="card flex-fill">

                                <table class="table table-hover my-0">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th class="product-name">NCD Name</th>
                                        <th class="product-price">Category</th>
                                        <th class="product-price">Price</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                        @if($orderedMedicine->count()>0)
                                        @foreach ($orderedMedicine as $order)

                                        <t>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="product-name">{{ $order->medicineName }}</td>
                                        <td class="product-price">{{ $order->medicineCategory }}</td>
                                        <td class="product-price">{{ $order->medicinePrice }}</td>
                                      </tr>

                                         @endforeach
                                         @endif
                                      <tr>
                                        <th></th>
                                        <th>TOTAL PRICE</th>
                                        <th></th>
                                        <th>120,000</th>
                                      </tr>
                                    </tbody>
                                </table>


                              </div>
                          </div>
                      </div>

                      <div class="text-gray-300 btn-s flex justify-end">
                        <a href="" class="btn act">Complete order</a>
                    </div>


                  </div>


          </main>


      </div>
      </div>







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                coords: [31.230391, 121.473701],
                name: "Shanghai"
            }, {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            }, {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            }, {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            }, {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            }, {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            }, {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            }, {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            }, {
                coords: [51.507351, -0.127758],
                name: "London"
            }, {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>


</x-app-layout>
