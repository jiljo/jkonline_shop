 @include('ecommerce.header')   {{-- Includes header.blade.php --}}

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Cart Page</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart Page</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Model</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>

                    	@if($orders->isEmpty())
            <tr>
                <td colspan="6" class="text-center py-4">No items in cart</td>
            </tr>
        @else
            @php
    $totalValue = 0;
@endphp

                          @foreach($orders as $order)
                          
                           @php
        $totalValue += ($order->offer_amount ?? $order->amount) * $order->order_quantity;
    @endphp
                        <tr>
                            <th scope="row">
                                <p class="mb-0 py-4">{{ $order->product_name }}</p>
                            </th>
                            <td>
                                <p class="mb-0 py-4">{{ $order->product_category }}</p>
                            </td>
                            <td>
                                <p class="mb-0 py-4 productprize">{{ number_format($order->offer_amount ?? $order->amount, 2) }} $</p>
                            </td>
                            <td>
                                <div class="input-group quantity py-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="{{ $order->order_quantity }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 py-4 total">{{ number_format(($order->offer_amount ?? $order->amount) * $order->order_quantity, 2) }} $</p>
                            </td>
                            <td class="py-4">
                                <button class="btn btn-md rounded-circle bg-light border">
                                    <i class="fa fa-times text-danger cancel"></i>
                                </button>
                            </td>
                        </tr>
                         @endforeach
                          @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn btn-primary rounded-pill px-4 py-3" type="button">Apply Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0" id="sub_total">${{$totalValue}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div>
                                    <p class="mb-0">Flat rate: $3.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to India.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4" id="sub_total_final">${{$totalValue + 3}}</p>
                        </div>
                        <button class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4"
                            type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">

                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>.
                    Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Button to Open Modal -->
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
    Login / Contact
</button>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4 rounded-4 shadow-lg">

      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="loginModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body pt-0">
        <form id="loginForm">
          <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control form-control-lg rounded-pill" id="name" name="name" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control form-control-lg rounded-pill" id="email" name="email" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Phone Number</label>
            <input type="tel" class="form-control form-control-lg rounded-pill" id="phone" name="phone" placeholder="Enter your phone" required>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">
              Login
            </button>
          </div>
        </form>
      </div>

      <div class="modal-footer border-0 justify-content-center pt-0">
        <small class="text-muted">We respect your privacy. Your info is safe with us.</small>
      </div>

     <a href="#"
   data-bs-target="#loginModal-login"
   data-bs-toggle="modal"
   data-bs-dismiss="modal">
   Already have an account??
</a>

    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="loginModal-login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4 rounded-4 shadow-lg">

     

      <div class="modal-body pt-0">
        <form id="loginForm">
          

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control form-control-lg rounded-pill" id="email" placeholder="Enter your email" required>
          </div>

         

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">
              Login
            </button>
          </div>
        </form>
      </div>

    
    </div>
  </div>
</div>








    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ecommerce/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('ecommerce/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('ecommerce/js/main.js') }}"></script>

    <script>
    	$('.cancel').click(function() {
        $(this).closest('tr').remove();

          if ($('table tbody tr').length === 0) {
            // If no rows are left, show the "No items in cart" message
            $('table tbody').html('<tr><td colspan="6" class="text-center py-4">No items in cart</td></tr>');
        }
    });
    </script>

    <script>

    	 $(document).ready(function() {


    	 	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#loginForm').on('submit', function(e) {
      e.preventDefault(); // Prevent form from submitting the traditional way
      
      var formData = $(this).serialize();
    
      $.ajax({
        url: '{{ route('register.submit') }}',
        type: 'POST',
        data: formData,
        dataType: 'json', // Automatically parse the response as JSON
        success: function(response) {
          // Check if the response indicates success
          // Check if the response indicates success (boolean true)
        if (response.status) {
            // Redirect to the dashboard
            window.location.href = response.redirect_url;
        } else {
            // Show error message from server
            alert(response.message || 'Failed to submit the form. Please try again.');
        }
        },
        error: function(xhr, status, error) {
          let errMsg = 'An error occurred. Please try again.';
        if(xhr.responseJSON && xhr.responseJSON.message){
            errMsg = xhr.responseJSON.message;
        }
        alert(errMsg);
        }
      });
    });
  });
    	</script>
</body>

</html>