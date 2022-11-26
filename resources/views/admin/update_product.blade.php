<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
        <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_design">
                <labal>Product Title : </labal>
                <input type="text" name="title" class="font_color" placeholder="Write Product Title"required="" value="{{$product->title}}">
            </div>
            <div class="div_design">
                <labal>Product Description : </labal>
                <input type="text"name="description" class="font_color" placeholder="Write Product Description"required=""value="{{$product->description}}">
            </div>

            <div class="div_design">
                <labal>Product Quantity : </labal>
                <input type="number"name="quantity" min="0" class="font_color" placeholder="Write Product Quantity"required=""value="{{$product->quantity}}">
            </div>
            <div class="div_design">
                <labal>Price : </labal>
                <input type="number" name="price"class="font_color" placeholder="Write Product Price"required=""value="{{$product->price}}">
            </div>
            <div class="div_design">
                <labal>Discount Price : </labal>
                <input type="number"name="dis_price" class="font_color" placeholder="Write Product Discount Price"value="{{$product->discount_price}}">
            </div>
            <div class="div_design">
                <labal>Product Catagory : </labal>
                <select class="font_color" name="catagory"required="">
                    <option value="{{$product->catagory}}"selected="">{{$product->catagory}}</option>
                 @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div_design">
                <labal>Current Product Image : </labal>
               <img style="margin:auto"height="100px"width="100px"src="/product/{{$product->image}}">
            </div>
            <div class="div_design">
                <labal>Change Product Image : </labal>
                <input type="file"name="image"  placeholder="Write Product Title">
            </div>
             <div class="div_design">
                <input type="submit" value="Update Product" class="btn btn-primary">
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
