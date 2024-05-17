<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Well-Connect</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

     {{-- added  --}}

     <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">

     <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}">
     <link rel="shortcut icon" href="{{ asset('static/img/icons/icon-48x48.png') }}" />
     <link rel="canonical" href="{{ asset('https://demo-basic.adminkit.io/') }}" />
     <link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">





     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
       integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
       integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
       crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
       integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
       crossorigin="anonymous"></script>

     <link rel="stylesheet" href="{{ asset('css/all_dash.css') }}">

<link rel="stylesheet" href="/css/style.css">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased dark:bg-white dark:text-dark/50">


        <div class="min-h-screen bd">


            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->

            <main>


                <div class="wrapper">
                  <nav id="sidebar" class="sidebar js-sidebar">
                    <div class="sidebar-content js-simplebar">
                        <a class="sidebar-brand" href="index.html">
                            <span class="align-middle">Well-Connect Admin</span>
                        </a>

                        <ul class="sidebar-nav">
                            <li class="sidebar-header">
                                Pages
                            </li>

                            <li class="sidebar-item active">
                                <a class="sidebar-link" href="{{ url('/dashboard') }}">
                                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pharmacy</span>
                                </a>
                            </li>


                            <div class="sidebar-cta">
                                <div class="sidebar-cta-content">
                                    <strong class="d-inline-block mb-2">Chat</strong>
                                    <div class="mb-3 text-sm">
                                        Is there stock shortage? alert the pharmacy admin.
                                    </div>
                                    <div class="d-grid">
                                        <a href="{{ url('/admin_chat') }}" class="btn btn-primary">Messages</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </nav>

                <div class="main">


                  <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                      <!-- Primary Navigation Menu -->
                      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                          <div class="flex justify-between h-16">
                              <div class="flex">
                                  <!-- Logo -->
                                  <div class="shrink-0 flex items-center">
                                      <a class="sidebar-toggle js-sidebar-toggle">
                                          <i class="hamburger align-self-center"></i>
                                      </a>
                                  </div>

                                  <!-- Navigation Links -->
                                  {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                      <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                          {{ __('Dashboard') }}
                                      </x-nav-link>
                                  </div> --}}
                              </div>

                              <!-- Settings Dropdown -->
                              <div class="hidden sm:flex sm:items-center sm:ms-6">
                                  <x-dropdown align="right" width="48">
                                      <x-slot name="trigger">
                                          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                              <div>{{ Auth::user()->name }}</div>

                                              <div class="ms-1">
                                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                  </svg>
                                              </div>
                                          </button>
                                      </x-slot>

                                      <x-slot name="content">
                                          <x-dropdown-link :href="route('profile.edit')">
                                              {{ __('Profile') }}
                                          </x-dropdown-link>

                                          <!-- Authentication -->
                                          <form method="POST" action="{{ route('logout') }}">
                                              @csrf

                                              <x-dropdown-link :href="route('logout')"
                                                      onclick="event.preventDefault();
                                                                  this.closest('form').submit();">
                                                  {{ __('Log Out') }}
                                              </x-dropdown-link>
                                          </form>
                                      </x-slot>
                                  </x-dropdown>
                              </div>

                              <!-- Hamburger -->
                              <div class="-me-2 flex items-center sm:hidden">
                                  <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                      <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                          <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                          <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </div>

                      <!-- Responsive Navigation Menu -->
                      <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                          <div class="pt-2 pb-3 space-y-1">
                              <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                  {{ __('Dashboard') }}
                              </x-responsive-nav-link>
                          </div>

                          <!-- Responsive Settings Options -->
                          <div class="pt-4 pb-1 border-t border-gray-200">
                              <div class="px-4">
                                  <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                  <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                              </div>

                              <div class="mt-3 space-y-1">
                                  <x-responsive-nav-link :href="route('profile.edit')">
                                      {{ __('Profile') }}
                                  </x-responsive-nav-link>

                                  <!-- Authentication -->
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf

                                      <x-responsive-nav-link :href="route('logout')"
                                              onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                          {{ __('Log Out') }}
                                      </x-responsive-nav-link>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </nav>



                    <main class="content">

                        <div class="container-fluid p-0">

                            <div class="headstock">
                                <div class="flex">
                            <h1 class="h3 mb-3">Pharmacy Verification</h1>


                            <div class="">

                                  @if($pharmacy->status === 'pending')
                  <span class="badge btn-danger text-white ms-2">
                   This pharmarcy is not registered
                </span>
                @else
                <span class="badge btn-success text-white ms-2">
                  This pharmacy is already registered
                </span>
                @endif

                            </div>


                        </div>

                        <div class="text-gray-300 btn-s">

                            <a href="{{ route('admin.index') }}" class="btn act" >
                               Go back
                            </a>
                         </div>
                            </div>


                                <div class="row">
                                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                        <div class="card flex-fill p-3">

                                            <div class="col-md mb-3">
                                                <label for="quantity" class="form-label">Pharmacy Image</label>
                                                <img  class="form-control" name="un_pharmacy_image" src="{{ asset('pharmacy_image/'.$pharmacy->un_pharmacy_image) }}" style="height: auto;" readonly>
                                              </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Pharmacy Name</label>
                                                    <input type="text" class="form-control" name="pharmacyName"  value="{{ $pharmacy->pharmacyName }}" readonly>
                                                  </div>

                                                  <div class="mb-3 flex gap-2">

                                                    <div class="col-md-6">
                                                        <label for="quantity" class="form-label">Pharmacy Email</label>
                                                        <input type="text"  class="form-control" name="contact" value="{{ $pharmacy->pharmacyEmail }}" readonly>
                                                      </div>

                                                      <div class="col-md">
                                                        <label for="quantity" class="form-label">Phone Number</label>
                                                        <input type="text"  class="form-control" name="contact" value="{{ $pharmacy->contact }}" readonly>
                                                      </div>

                                                </div>
                                                  <div class="mb-3">
                                                    <label for="price" class="form-label">Location</label>
                                                    <div class="flex gap-2">
                                                    <input type="text" class="form-control" name="street" value="{{ $pharmacy->street }}" readonly>
                                                    <input type="text" class="form-control" name="region" value="{{ $pharmacy->region }}" readonly>
                                                    <input type="text" class="form-control" name="city" value="{{ $pharmacy->city }}" readonly>
                                                </div>
                                                  </div>
                                                  <div class="mt-4 cr">
                                                    <div>
                                                        <label for="quantity" class="form-label">Licence:  </label>
                                                        <a href="{{ asset('cert_image/' . $pharmacy->certification) }}" class="badge bg-primary">Download Licence</a>
                                                      </div>
                                                    <div>
                                                      <label class="form-label">created At</label>
                                                      <span class="badge bg-warning" readonly>{{ $pharmacy->created_at }} </span>
                                                    </div>
                                                </div>

                                                @if($pharmacy->status === 'pending')

                                                <div class="flex items-center justify-end mt-4">
                                                    <button class="btn cloth act" data-toggle="modal" data-target="#exampleModal">
                                                     Register
                                                    </button>

                                                 </div>

                                                 @endif


                                        </div>
                                    </div>

                                </div>

                            </div>
                    </main>

                </div>
                </div>

                          </main>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pharmacy Registration</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">


        <form method="POST" action="{{ route('reg.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <input type="hidden" name="pid" value="{{ $pharmacy->id }}">
            <div>
                <label for="name">Pharmacy Name</label>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $pharmacy->pharmacyName }}" required autofocus autocomplete="name" readonly/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"  value="{{ $pharmacy->pharmacyEmail }}" required autocomplete="username" readonly/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="location" :value="__('location')" />
                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ $pharmacy->street }},{{ $pharmacy->region }},{{ $pharmacy->city }} " required autocomplete="username" />
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>



            <div class="mt-4">
                <label for="current_image">Current Pharmacy Image</label>
                @if($pharmacy->un_pharmacy_image)
                    <img src="{{ asset('pharmacy_image/'.$pharmacy->un_pharmacy_image) }}" style="height: auto;" class="block w-full" alt="Pharmacy Image">
                @else
                    <p>No image available</p>
                @endif
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="file">New Pharmacy Image (Optional)</label>
                <input id="file" type="file" name="file" accept="image/*">
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>

            <div class="mt-4" style="display: none;">
                <x-input-label for="location" :value="__('userType')" />
                <x-text-input id="location" class="block mt-1 w-full" type="text" name="userType" value="0" required autocomplete="username" />

            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                value="12345678"
                                required autocomplete="new-password"  readonly />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                value="12345678"
                                required autocomplete="new-password"  readonly />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                {{-- <x-primary-button class="ms-4 btn btn-primary">
                    {{ __('Register') }}
                </x-primary-button> --}}

                    <button class="btn cloth act">Register</button>


            </div>
        </form>

                </div>

              </div>
            </div>
          </div>






    </div>


    <script src="{{ asset('static/js/app.js') }}"></script>

    {{-- <script>
        function updateSelectedImage(input) {
            const span = document.getElementById('selectedImage');
            if (input.files && input.files[0]) {
                span.textContent = input.files[0].name;
            } else {
                span.textContent = 'Choose an image';
            }
        }
    </script> --}}
    </body>
</html>
