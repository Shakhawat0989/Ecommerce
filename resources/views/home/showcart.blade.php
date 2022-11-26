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
            margin:auto;
            width:50%;
            text-align:center;
            padding:30px;
        }
        table,th,td{
            border:1px solid black;
        }
        .th_design{
            font-size:20px;
            padding:5px;
            background:black;
            color:white;
        }
        .img_deg{
            height:100px;
            width:100px
        }
        .totalprice{
            margin:auto;
            padding-left:600px;
            padding-top:30px;
        }
      </style>
   </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
          @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button"class="close" data-dismiss="alert"aria-hidden="true">X</button>
                   {{session()->get('message')}}

                </div>
            @endif

    <table class= "center">
        <tr>
            <th class="th_design">Product Title</th>
            <th class="th_design">Product Quantity</th>
            <th class="th_design">Price</th>
            <th class="th_design">Image</th>
            <th class="th_design">Action</th>
        </tr>
        <?php $totalprice=0;?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>${{$cart->price}}</td>
            <td><img class="img_deg"src="/product/{{$cart->image}}"></td>
            <td><a onclick="return confirm('Do You Want To Remove This?')" href="{{url('remove_product',$cart->id)}}" class="btn btn-danger">Remove Product</a></td>
        </tr>
        <?php $totalprice=$totalprice+$cart->price ?>
        @endforeach


    </table>

    <div class="totalprice">
        <h2>Total Product Price :${{$totalprice}}</h2>
    </div>
     <div class="totalprice">
        <h2 style="margin-left:50px;padding-bottom:20px">Proceed to Order</h2>
        <a class="btn btn-danger"href="{{url('cash_order')}}">Cash On Delivery</a>
        <a class="btn btn-danger"href="{{url('stripe',$totalprice)}}">Pay Using Card</a>
    </div>
      <!-- footer start -->

      <!-- footer end -->

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
