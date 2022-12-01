<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">


            </div>
            @if(session()->has('message'))
                    <div class="alert alert-success">
                   {{session()->get('message')}}

                    </div>
                    @endif

            <br><br>

                <div>
                     <form action="{{url('search_product')}}" method="GET">
                         @csrf
                        <input type="text"  name="search" placeholder="Search here">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>

                </div>


            <div class="row">
                @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detail',$products->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action= "{{url('add_cart',$products->id)}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add to cart">
                                    </div>
                                </div>
                           </form>

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)
                        <h6 style="color:red">
                        Discount Price
                        <br>
                         ${{$products->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue">
                            Price
                            <br>
                           ${{$products->price}}
                        </h6>
                        @else
                        <h6 style="color:blue">
                            Price
                            <br>
                          ${{$products->price}}
                        </h6>

                        @endif

                     </div>
                  </div>
                 </div>
                @endforeach
                <span style="margin-top:40px">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </span>


         </div>
      </section>
