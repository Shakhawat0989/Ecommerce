<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            text-align:center;
            padding-bottom:30px;

        }
        label{
            display:inline-block;
            width:200px;
            font-size:15px;
            font-weight:bold;

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

            <h1 style="text-align:center;padding-bottom:60px;font-size:25px"href="{{url('send_email',$order->id)}}">Send email to {{$order->email}}</h1>

            <form action="{{url('send_user_email',$order->id)}}" method="POST">
                @csrf
            <div class="center">
                <label for="">Email Greetimg </label>
                <input style="color:black"type="text" name="greeting">
            </div>
            <div class="center">
                <label for="">Email First Line </label>
                <input style="color:black"type="text" name="firstline">
            </div>
            <div class="center">
                <label for="">Email Body </label>
                <input style="color:black"type="text"name="body">
            </div>
            <div class="center">
                <label for="">Email Button Name </label>
                <input style="color:black" type="text"name="button">
            </div>
            <div class="center">
                <label for="">Email URL </label>
                <input style="color:black"type="text"name="url">
            </div>
            <div class="center">
                <label for="">Email Last Line </label>
                <input style="color:black"type="text"name="lastline">
            </div>
            <div class="center">
               <input type="submit" value="Send Email" class="btn btn-primary">

          </div>
          </form>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
