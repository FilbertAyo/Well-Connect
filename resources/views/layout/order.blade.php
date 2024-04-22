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
            <h1 class="h3 mb-3">NCD Orders</h1>
        </div>
            <div class="text-gray-300 btn-s">
                <a href="" class="btn act">Received</a>
                <a href="" class="btn">Processed</a>
                <a href="" class="btn">Pending</a>
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
                                        <th class="d-none d-xl-table-cell">order-ID</th>
                                        <th class="d-none d-xl-table-cell">Address</th>
                                        <th class="d-none d-md-table-cell">Contacts</th>
                                        <th>Status</th>
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

                </div>

            </div>
    </main>

</div>
</div>

</x-app-layout>
