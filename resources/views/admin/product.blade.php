<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            text-align:center;
            padding-top:50px;

        }
        .font_size{
            font-size:40px;
        }
        .font_color{
            color:black;
        }
        labal{
            display:inline-block;
            width:200px;
        }
        .div_design{
            padding-top:20px;
            text-align:center;

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
                    <button type="button"class="close" data-dismiss="alert"aria-hidden="true">X</button>
                   {{session()->get('message')}}

                </div>
            @endif
            <div class="center">
                <h1 class="font_size">Add Product</h1>
            </div>
        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_design">
                <labal>Product Title : </labal>
                <input type="text" name="title" class="my-3 font_color" placeholder="Write Product Title">
                @error('title')
                    <div class="col-md-3 m-auto  alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="div_design">
                <labal>Product Description : </labal>
                <input type="text"name="description" class="font_color" placeholder="Write Product Description">
                @error('description')
                    <div class="col-md-3 m-auto  alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="div_design">
                <labal>Product Quantity : </labal>
                <input type="number"name="quantity" min="0" class="font_color" placeholder="Write Product Quantity">
                   @error('quantity')
                    <div class="col-md-3 m-auto  alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="div_design">
                <labal>Price : </labal>
                <input type="number" name="price"class="font_color" placeholder="Write Product Price">
                   @error('price')
                    <div class="col-md-3 m-auto  alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="div_design">
                <labal>Discount Price : </labal>
                <input type="number"name="dis_price" class="font_color" placeholder="Write Product Discount Price">
            </div>
            <div class="div_design">
                <labal>Product Catagory : </labal>
                <select class="font_color" name="catagory">
                    <option value=""selected="">Add a catagory here</option>
                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                </select>
                @error('catagory')
                    <div class="col-md-3 m-auto  alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="div_design">
                <labal>Product Image : </labal>
                <input type="file"name="image"  placeholder="Write Product Title">
            </div>
             <div class="div_design">
                <input type="submit" value="Add Product" class="btn btn-primary">
            </div>
        </form>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
