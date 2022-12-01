<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>

        .table_deg{
            border: 2px solid white;
            text-align:center;
            margin:auto;
            width:100%;

        }
        .img_deg{
            height:100px;
            width:100px;
        }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
       @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button"class="close" data-dismiss="alert"aria-hidden="true">x</button>
                   {{session()->get('message')}}

                </div>
            @endif
                <h1 style="text-align:center;font-size:40px;padding-bottom:40px">All Products</h1>

                <div style="padding-left:450px;padding-bottom:30px">
                    <form action="{{url('search')}}" method="get">
                        @csrf

                        <input type="text"style="color:black" name="search">
                        <input type="submit" value="search" class="btn btn-info">

                    </form>
                </div>
                <table class="table_deg">
                    <tr style="background-color:white;color:black">
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>
                    </tr>
                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_deg" src="/product/{{$order->image}}">
                        </td>

                        <td>
                            @if($order->delivery_status=='Processing')

                                <a href="{{url('delivered',$order->id)}}" Onclick="return confirm('Are you sure to delivery this product?')"class="btn btn-primary">Delivered</a>


                                @else
                                <p style="color:green">Delivered</p>
                                @endif

                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}"class="btn btn-secondary">Print PDF</a>
                        </td>
                        <td>
                            <a href="{{url('send_email',$order->id)}}"class="btn btn-info">Send Email</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>
                    @endforelse
                </table>

          </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
