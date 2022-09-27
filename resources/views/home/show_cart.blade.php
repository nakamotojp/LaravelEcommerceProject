<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
              <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
            @include('flash::message')
            @endif
            <div class="heading_container heading_center">
               <h2>
                  Cart</span>
               </h2>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-4">
                  <table>
                    <tr>
                    <th class="th_deg">title</th>
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">image</th>
                    <th class="th_deg">action</th>
                    </tr>
                    <?php $totalprice = 0 ?>
                    @foreach($cart as $cart)
                    <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}個</td>
                    <td>{{$cart->price}}円</td>   
                    <td><img class="img_deg" src="/product/{{$cart->image}}"></td>       
                    <td><a href="{{url('/remove_cart', $cart->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Remove?')">Remove Product</a></td>                     
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price ?>
                    @endforeach
                  </table>
                    <div class="total_deg">
                    Total: {{$totalprice}}円
                    </div>
                    <h2>Proceed Order</h2>
                    <div class="total_deg">
                    <a href="{{url('/cash_order')}}" class="btn btn-danger">Cash</a>
                    <a href="{{url('/stripe',$totalprice)}}" class="btn btn-danger">Card</a>
                    </div>                    
               </div>
            </div>
         </div>
      </section>
      <!-- end product section -->
        <!--include('home.subscribe')-->
        <!--include('home.client')-->
        @include('home.footer')

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper jhome/s -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrahome/p js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom jhome/s -->
      <script src="home/js/custom.js"></script>
   </body>
</html>