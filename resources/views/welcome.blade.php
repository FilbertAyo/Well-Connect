<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Well-Connect</title>

           <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

{{-- added  --}}
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/all_dash.css">

    </head>
    <body class="font-sans antialiased bd dark:text-dark/50">

        @if(Session::has('success'))


        <div class=" flex justify-center" style="padding: 20px; background-color: #2b4257;" >
            <div class="text-white flex justify-center" >
                {{ Session::get('success') }}
            </div>
        </div>
        <div class="" style="background-image: url('/image/verification.gif'); height: 91vh; background-size: 100%; background-position: center;">

        </div>
        @else
                    <header class="hh border-bottom">
                        <div class="flex items-center well s">
                        <h1>Well-Connect</h1>
                        </div>

                        <div class="flex btn-s">
                            <button type="button" class="btn cloth btn act" data-toggle="modal" data-target="#exampleModal">
                                Verify Pharmacy
                              </button>
                        </div>

                    </header>





                            <div class="container2 flex mt-5">


                                        <div class="left-content col-lg-6">
                                            <h2 class="text-xl font-semibold text-black">Place orders for prescription medications</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                                Verification and Registration for Pharmacies
                                            </p>
                                            <div class="mt-4 text-gray-300 btn-s">

                                                <button type="button" class="btn cloth btn act" data-toggle="modal" data-target="#exampleModal">
                                                    Verify Pharmacy
                                                  </button>

                         @if (Route::has('login'))

                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="btn"
                                    >
                                        Log in
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="btn"
                                    >
                                        Log in
                                    </a>


                                @endauth

                        @endif
                                            </div>

                                            <div class="stat">
                                                <div class="s">
                                                    <h1>Verified</h1>
                                                <p>Medication</p>
                                                </div>
                                                <div class="s">
                                                    <h1>Stock</h1>
                                                    <p>Pharmacy</p>
                                                </div>

                                                <div class="s">
                                                    <h1>Order</h1>
                                                <p>Received</p>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="right-content" col-lg-6>
                                            <img src="/image/img2.png" alt="">
                                        </div>

                                    {{-- <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg> --}}

                            </div>


                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Fill required Information to verify your Pharmacy</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                            {!!  csrf_field() !!}

                                               <div class="mb-3">
                                                   <label for="price" class="form-label">Pharmacy name</label>
                                                   <input type="text" class="form-control" name="pharmacyName" placeholder="eg : Example Pharmacy" value="{{ old('pharmacyName') }}" required>
                                                   @if ($errors->has('pharmacyName'))
                                                   <div class="alert alert-danger">
                                                  invalid pharmacy name input
                                                   </div>
                                                   @endif
                                                 </div>

                                                 <div class="mb-3">
                                                   <label for="title" class="form-label">Email</label>
                                                   <input type="email" class="form-control" name="pharmacyEmail" placeholder="eg: example@gmail.com" value="{{ old('pharmacyEmail') }}"  required>
                                                   @if ($errors->has('pharmacyEmail'))
                                                   <div class="alert alert-danger">
                                                  invalid email format
                                                   </div>
                                                   @endif
                                                 </div>

                                                 <div class="mb-3">
                                                   <label for="title" class="form-label">Contacts</label>
                                                   <input type="text" class="form-control" name="contact" placeholder="eg: 073XXXXXXX" value="{{ old('contact') }}" required>
                                                   @if ($errors->has('contact'))
                                                   <div class="alert alert-danger">
                                                    invalid contact format
                                                     </div>
                                               @endif
                                                 </div>


                                                 <div class="mb-3 ">
                                                   <label for="productCode" class="form-label">Location of your pharmacy</label>

                                                   <div class="flex gap-2">
                                                   <input type="text" class="form-control" name="street" placeholder="Street" value="{{ old('street') }}" required>
                                                   @if ($errors->has('street'))
                                                   <div class="alert alert-danger">
                                                  invalid input
                                                   </div>
                                                   @endif
                                                   <input type="text" class="form-control" name="region" placeholder="District" value="{{ old('region') }}" required>
                                                   @if ($errors->has('region'))
                                                   <div class="alert alert-danger">
                                                  invalid input
                                                   </div>
                                                   @endif
                                                   <input type="text" class="form-control" name="city" placeholder="Region" value="{{ old('city') }}" required>
                                                   @if ($errors->has('city'))
                                                   <div class="alert alert-danger">
                                                  invalid input
                                                   </div>
                                                   @endif
                                               </div>

                                               </div>

                                                 <div class="mb-3">
                                                   <label for="description" class="form-label">Licence</label>
                                                   <input type="file"  class="form-control" name="certification" placeholder="Licence" value="{{ old('certification') }}" required>
                                                   @if ($errors->has('certification'))
                                                   <div class="alert alert-danger">
                                                  invalid certifiaction file format
                                                   </div>
                                                   @endif
                                                 </div>

                                                 <div class="mb-3">
                                                    <label for="description" class="form-label">Pharmacy Image</label>
                                                    <input type="file"  class="form-control" name="un_pharmacy_image" placeholder="pharmacy image" value="{{ old('pharmacy_image') }}" required>
                                                    @if ($errors->has('un_pharmacy_image'))
                                                    <div class="alert alert-danger">
                                                   invalid pharmacy image
                                                    </div>
                                                    @endif
                                                  </div>

                                         <div class="mt-3 flex justify-end">
                                            <button type="submit" class="btn act">verify</button>
                                          </div>

                                           </form>
                                    </div>

                                  </div>
                                </div>
                              </div>

                                          @endif





                                          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                                          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


                                          @if ($errors->any())
                                          <script>
                                              window.onload = function() {
                                                  $('#exampleModal').modal('show');
                                              }
                                          </script>
                                          @endif


                                        </body>
</html>
