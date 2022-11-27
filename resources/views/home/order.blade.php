<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

    <style>

        .center{
            text-align:center;
            margin:auto;
            padding-top:60px;
            padding-left:370px;

        }
        table,th,td{
            border:2px solid black;
        }
        .th_deg{
            font-size:20px;
            font-weight:bold;
            background-color:black;
            color:white;
            text-align:center;
        }
        .img_deg{
            height:100px;
            width:100px;
        }
    </style>

   </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
          @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button"class="close" data-dismiss="alert"aria-hidden="true">X</button>
                   {{session()->get('message')}}

                </div>
            @endif

        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg">Delivery Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Cancel Order</th>
                </tr>
                @foreach($order as $order)
                <tr>
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
                    <a class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                    @else
                    <p style="color:blue">Not Allowed</p>

                    @endif

                </td>

                </tr>
                @endforeach
            </table>
        </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="homejs/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="homejs/bootstrap.js"></script>
      <!-- custom js -->
      <script src="homejs/custom.js"></script>
   </body>
</html>
