<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
            border: 2px solid #ddd;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #87ceeb;
            font-size: 18px;
            font-weight: bold;
        }

        td {
            font-size: 16px;
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
          <h1 style="color: white;">Add Category</h1>

          <!-- Add Category Form -->
          <div class="div_deg">
            <form action="{{url('add_category')}}" method="post">
              @csrf 
              <div>
                <input type="text" name="category" placeholder="Enter Category Name" required>
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
          </div>

          <!-- Category Table -->
          <div>
            <table>
              <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

<<<<<<< HEAD
              @foreach($data as $category)
              <tr>
                <td>{{$category->category_name}}</td>
                <td>
                  <a class="btn btn-success" href="{{url('edit_category', $category->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $category->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
=======
                    <th>Edit</th>

                    <th>Delete</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->category_name}}</td>

                    <td>
                        <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
                    </td>
                </tr>

                @endforeach
>>>>>>> a89f420 (Ladiva final)
            </table>        
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
                title: "Are You Sure to Delete This",
                text: "This delete will be permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
