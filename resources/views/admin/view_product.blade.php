<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      .table_deg {
        border: 2px solid red;
      }

      th {
        background-color: #87ceeb;
        color: black;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
      }

      td {
        border: 1px solid skyblue;
        text-align: center;
        color: white;
      }

      /* Pagination Styling */
      .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px; /* Optional spacing between table and pagination */
      }

      .pagination {
        list-style: none;
        display: flex;
        gap: 10px; /* Spacing between pagination links */
      }

      .pagination li {
        display: inline-block;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- Page Content -->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="div_deg">
            <table class="table_deg">
              <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Delete</th>
              </tr>

              @foreach ($product as $products)
              <tr>
                <td>{{ $products->title }}</td>
                <td>{{ $products->description }}</td>
                <td>{{ $products->category }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->quantity }}</td>
                <td>
                  <img height="120" width="120" src="products/{{$products->image}}">
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a> 
                </td>
              </tr>
              @endforeach
            </table>
          </div>

          <!-- Pagination Wrapper -->
          <div class="pagination-wrapper">
            {{ $product->onEachSide(1)->links() }}
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Confirmation -->
    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure to Delete This?",
                text: "This delete will be permanent.",
                icon: "warning",
                buttons: ["Cancel", "Delete"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

    <!-- Include SweetAlert Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JavaScript files -->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
