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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
       @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
     @include('home.new_arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->



        <div style="text-align:center;padding-top:20px;padding-bottom:20px">
            <h1>Comment</h1>
        </div>
        <div>
            <form action="{{url('add_comment')}}" method="POST" style="text-align:center">
            @csrf
                <textarea name="comment" style="height:150px;width:600px" placeholder="write something here"></textarea>
                <br>
                <input style="text-align:center" type="submit" value="Comment">
            </form>
            <div style="padding-left:300px;padding-bottom:30px">
            <p style="font-weight:bold">All Comments</p>


            @foreach($comment as $comment)
            <div>

                <b>{{$comment->name}}</b>
                <p>{{$comment->comment}}</p>
                <a href="javascript:void(0)"onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                @foreach($reply as $rep)
                @if($rep->comment_id==$comment->id)
                <div style="padding-left:3%;padding-top:10px;padding-bottom:10px">

                    <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                    <a href="javascript:void(0)"onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

                </div>
                @endif
                @endforeach


            </div>
                 @endforeach

               <!--  Reply textbox -->

                <div style="display:none" class="replyDiv">

                <form action="{{url('add_reply')}}" method="POST">
                    @csrf
                    <input type="text"name="commentId" id="commentId" hidden="">
                    <textarea name="reply" style="height:100px;width:450px"placeholder="something write here"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Reply</button>
                     <a href="javascript:void(0)"onclick="reply_close(this)">Close</a>

                </form>

                </div>


            </div>
        </div>





      <!-- subscribe section -->
     @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <script>
        function reply(caller){

            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
        function reply_close(caller){

            $('.replyDiv').hide();
        }
      </script>
       <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
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
