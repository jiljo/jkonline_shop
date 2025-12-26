  @include('header')   {{-- Includes header.blade.php --}}
        @include('sidebar')  {{-- Includes sidebar.blade.php --}}
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" id="add_product">



                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Product Category <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="category" name="category" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Electronic">Electronic</option>
                                                    <option value="Clothing">Clothing</option>
                                                   
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Product Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name.." required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Actuall Amount <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Actuall Amount." required="">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Offer Amount <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="offer_amount" name="offer_amount" placeholder="Offer Amount." required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Product Image <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="image" name="image" required="">
                                                <input type="hidden" name="filepath" id="filepath">
                                            <div id="uploadResult"></div><br>
                                            <img id="previewImage" src="" alt="Preview" style="max-width: 400px; margin-top: 5px;" />
                                            </div>
                                            
                                        </div>


                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="quantity">Quantity <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Available Quantity." required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-suggestions">Product Specifications <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="specifications" name="specifications" rows="5" placeholder="Add product details" required=""></textarea>
                                            </div>
                                        </div>
                                      <!--  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Best Skill <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="val-skill">
                                                    <option value="">Please select</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Currency <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-currency" name="val-currency" placeholder="$21.60">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">Website <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-website" name="val-website" placeholder="http://example.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Phone (US) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-phoneus" name="val-phoneus" placeholder="212-999-0000">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Digits <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="5">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-number">Number <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-number" name="val-number" placeholder="5.0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-range">Range [1, 5] <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-range" name="val-range" placeholder="4">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><a href="#">Terms &amp; Conditions</a>  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                    <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1"> <span class="css-control-indicator"></span> I agree to the terms</label>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

        <meta name="csrf-token" content="{{ csrf_token() }}">
       



         @include('footer')   {{-- Includes footer.blade.php --}}


     <script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/js/toastr.init.js') }}"></script>

    <script>
        $('#previewImage').hide();
  $(document).ready(function () {

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


   $('#image').on('change', function (e) {
      e.preventDefault(); // prevent default form submission
       $('#previewImage').hide();
      let file = e.target.files[0];
      if (!file) return;
      let formData = new FormData();
    formData.append('file', file);
 $.ajax({
      url: "{{ route('upload-files') }}",  // Laravel route
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
       // $('#uploadResult').html('<p style="color:green;">' + response.message + '</p>');
       if(response.status == 1){
        $('#filepath').val(response.file);
        $url = 'uploads/'+response.file;
        $('#previewImage').attr('src', $url);
         $('#previewImage').show();
        $('#uploadResult').html('<p style="color:green;">File uploaded successfully!</p>');
       }
       else if(response.status == 2){
         $('#filepath').val('');
         $url = '';
         $('#previewImage').attr('src', $url);
         $('#previewImage').hide();

        $('#uploadResult').html('<p style="color:red;">Uploaded file is not valid.</p>');
       }
       else
       {
         $('#filepath').val('');
          $url = '';
         $('#previewImage').attr('src', $url);
         $('#previewImage').hide();
        $('#uploadResult').html('<p style="color:red;">No file uploaded.</p>');
       }
      }
    /*  error: function (xhr) {
        //$('#uploadResult').html('<p style="color:red;">Error: ' + xhr.responseText + '</p>');
      }  */
    });
  });




   $('#add_product').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '{{ route("save-product") }}', // Your route
      data: $(this).serialize(),
      success: function (response) {
      //  tosteralert();
        alert("Product Added");
         var redirectURL = "{{ route('view-product') }}";
         window.location.href = redirectURL;
        //$('#responseMsg').html('<p style="color:green;">' + response.message + '</p>');
      },
      error: function (xhr) {
        $('#responseMsg').html('<p style="color:red;">Error: ' + xhr.responseText + '</p>');
      }
    });
  });

   function tosteralert()
   {
     toastr.success("New Product Added", "Top Right", {
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
   }


});
</script>

</body>

</html>