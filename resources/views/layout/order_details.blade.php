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
                    <div id="map" style="height:300px;"></div>
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
                                        <th>{{ number_format($totalPrice, 2) }}</th>
                                      </tr>
                                    </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                      <div class="text-gray-300 btn-s flex justify-end">

                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn act">Complete Order</button>
                        </form>
                    </div>


                  </div>


          </main>


      </div>
      </div>







      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <!-- Include Leaflet Routing Machine CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([-6.7924, 39.2083], 12); // Centered on Dar es Salaam

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var markers = [
                { coords: [-6.771430, 39.241420], name: "Sinza" },
                { coords: [-6.752140, 39.268910], name: "Mikocheni" }
            ];

            var markerObjects = markers.map(function(marker) {
                return L.marker(marker.coords).addTo(map)
                    .bindPopup(marker.name);
            });

            // Add routing between Sinza and Mikocheni
            L.Routing.control({
                waypoints: [
                    L.latLng(-6.771430, 39.241420),
                    L.latLng(-6.752140, 39.268910)
                ],
                createMarker: function(i, waypoint, n) {
                    var marker = L.marker(waypoint.latLng).bindPopup(markers[i].name);
                    return marker;
                }
            }).addTo(map);
        });
    </script>


</x-app-layout>
