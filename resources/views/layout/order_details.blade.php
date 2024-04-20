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
                      <a class="sidebar-link" href="{{ url('/dashboard') }}">
                          <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Order</span>
                      </a>
                  </li>

                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{ url('/stock') }}">
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
                      <div class="">
                  <h1 class="h3 mb-3">Moses Bunango</h1>
              </div>
              <div class="text-gray-300 btn-s">
                <a href="{{ url('/dashboard') }}" class="btn act">Back</a>
            </div>
        </div>

        <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">mwananchi,ubungo,Dar es salaam : +25573223273</h5>
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

                              </div>
                          </div>
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
