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

                                      <input type="hidden" name="pid" value="{{ $product->pid }}">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Product Category <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="category" name="category" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Electronic" {{ $product->product_category == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                                                    <option value="Clothing" {{ $product->product_category == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                                                   
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Product Name<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name"  value="{{ $product->product_name }}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Actuall Amount<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="amount" name="amount"  required="" value="{{ $product->amount }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Offer Amount <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="offer_amount" name="offer_amount" required="" value="{{ $product->offer_amount }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Product Image <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="image" name="image" required="">
                                                <input type="hidden" name="filepath" id="filepath">
                                            <div id="uploadResult"></div>
                                            <img id="previewImage" src="../uploads/{{ $product->product_image_path }}" alt="Preview" style="max-width: 400px; margin-top: 5px;" />
                                            </div>
                                            </div>
                                            
                                              <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="quantity">Quantity <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity  }}" required="">
                                            </div>
                                        </div>



                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Upload More Photos <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                             <div class="d-flex align-items-center mb-3">
  <button type="button" class="btn btn-primary me-3" id="add_button">+</button>
  <input type="hidden" id="uploaded_images" name="uploaded_images" value="">
  <input type="file" class="form-control" style="width: 250px;" id="image_extra" name="image_extra">
</div>

                                               <div class="row rowiamge"></div>
                                               
                                            </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-suggestions">Product Specifications <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="specifications" name="specifications" rows="5"  required="">{{ $product->product_specification }}</textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="submit" class="btn btn-primary">Update Product</button>
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
      $('#image_extra').hide();
$('#add_button').on('click', function (e) {

$('#image_extra').show();
});
      
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
        $url = '../uploads/'+response.file;
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
      url: '{{ route("update-product") }}', // Your route
      data: $(this).serialize(),
      success: function (response) {
      //  tosteralert();
        alert("Product Updated");
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


   $('#image_extra').on('change', function (e) {
      e.preventDefault(); // prevent default form submission
       $('#previewImage_extra').hide();
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

         $('#image_extra').val('');
         $('#image_extra').hide();
      //  $('#uploadResult').html('<p style="color:green;">' + response.message + '</p>');
       if(response.status == 1){
        $('#filepath').val(response.file);
       let url = '../uploads/' + response.file;
       // $('#previewImage_extra').attr('src', $url);
        // $('#previewImage_extra').show();
       // $('#uploadResult').html('<p style="color:green;">File uploaded successfully!</p>');

       let imageBlock = `
            <div class="col-sm-3 mb-2 position-relative image-container">
                <img src="${url}" class="img-fluid rounded" />
                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-image" style="z-index:10;">&times;</button>
            </div>
        `;

        // Append image to the parent .row div
        $('.rowiamge').append(imageBlock);


        let currentVal = $('#uploaded_images').val();
        if (currentVal) {
            $('#uploaded_images').val(currentVal + ',' + response.file);
        } else {
            $('#uploaded_images').val(response.file);
        }
       
        var currentValall = $('#uploaded_images').val();
        
       }
       else if(response.status == 2){
         $('#filepath').val('');
         $url = '';
         $('#previewImage').attr('src', $url);
         $('#previewImage').hide();

       // $('#uploadResult').html('<p style="color:red;">Uploaded file is not valid.</p>');
       }
       else
       {
         $('#filepath').val('');
          $url = '';
         $('#previewImage').attr('src', $url);
         $('#previewImage').hide();
       // $('#uploadResult').html('<p style="color:red;">No file uploaded.</p>');
       }   
      }
    /*  error: function (xhr) {
        //$('#uploadResult').html('<p style="color:red;">Error: ' + xhr.responseText + '</p>');
      }  */
    });
  });
</script>

</body>

</html>