 @include('header')   {{-- Includes header.blade.php --}}
        @include('sidebar')  {{-- Includes sidebar.blade.php --}}
 <link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $pageName }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="product-data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Specification</th>  
                                                <th>Image</th>   
                                                <th>Action</th>        
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
       
     @include('footer')   {{-- Includes footer.blade.php --}}

    <script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <!--<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>-->

    <script>
        

    $(document).ready(function () {
        $('#product-data-table').DataTable({
            ajax: {
                url: '/get-products', // Laravel route
                type: 'GET',
                dataSrc: '' // JSON is a plain array
            },
            columns: [
                { data: 'product_name' },
                { data: 'product_category' },
                { data: 'amount' },
                { data: 'product_specification' },
                { 
            data: 'product_image_path',
            render: function (data, type, row) {
                if (data) {
                    return `<img src="/uploads/${data}" alt="Product Image" height="50">`;
                } else {
                    return 'No Image';
                }
            }
        },
         { 
            data: 'pid',
            render: function (data, type, row) {
                if (data) {
                    return `<a href="/edit-product/${data}"><button type="button" class="btn btn-success"><i class="bi bi-pen"></i> Edit Details</button></a>`;
                } else {
                    return 'No Id';
                }
            }
        }

            ],
            pageLength: 50, // default rows per page
            lengthMenu: [5, 10, 25, 50, 100] // pagination options
        });
    });

    </script>

</body>

</html>