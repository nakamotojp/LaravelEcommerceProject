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
      <!-- Custom home/styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responshome/ive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <style type="text/css">
      .center{
          margin:auto;
          width: 50%;
          text-aligin:center;
          padding: 30px;
      }
      
      table, th, td{
          border: 1px solid white;
      }
      
      .th_deg{
          font-size:30px;
          padding: 5px;
          background: skyblude;
      }
      
      .total_deg{
          font-size: 20px;
          padding: 40px;
      }
      </style>
   </head>
   <body>
      <!--<div class="hero_area">-->
      @include('home.header')
        <!--include('home.slider')-->
      <!--</div>-->
        <!--include('home.why')-->
        <!--include('home.arrival')-->
        @include('home.product')

<div class="center">
    <h2 class="text-xl">Comments</h2>
    <form action="{{url('add_comment')}}" method="POST">
        @csrf
    <textarea style="width:500px,height:100px" name="comment"></textarea>
    <br>
    <input type="submit" class='btn btn-primary' value="comment">
    </form>
</div>

<div class="center">
    <h2 class="text-xl">All Comments</h2>
    @foreach($comment as $comment)
    {{$comment->name}}
    <div>
        <p>{{$comment->name}}</p>
        <p>{{$comment->comment}}</p>
        <a href="javascript::void(0);" onclick="reply(this)">Reply</a>
    </div>
    @endforeach
    
    <div style="display:none;" class="replyDiv">
    <textarea style="width:500px,height:100px"></textarea>
    <br>
    <a href="" class='btn btn-primary'>comment</a>
    </div>
</div>
        
    //   @include('home.comment')
        <!--include('home.subscribe')-->
        <!--include('home.client')-->
        @include('home.footer')

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
    <script type="text/javascript">
        function reply(caller)
        {
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
    </script>
      <!-- jQery -->
      <!--<script src="home/js/jquery-3.4.1.min.js"></script>-->
      <!-- popper jhome/s -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrahome/p js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom jhome/s -->
      <script src="home/js/custom.js"></script>


   </body>
</html>