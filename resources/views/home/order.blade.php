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
                  <span>Orderd Log</span>
               </h2>
            </div>
            <div class="row d-flex justify-content-left">
              <div class="col-md-4">
                  <table>
                    <tr>
                    <th class="th_deg">product_title</th>
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">payment_status</th>
                    <th class="th_deg">delivery_status</th>
                    <th class="th_deg">image</th>
                    </tr>
                    <?php $totalprice = 0 ?>
                    @foreach($order as $order)
                    <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}個</td>
                    <td>{{$order->price}}円</td> 
                    <td>{{$order->payment_status}}</td> 
                    <td>{{$order->delivery_status}}</td>                     
                    <td><img class="img_deg" src="/product/{{$order->image}}"></td>
                    @if($order->delivery_status=='proceeding')
                    <td><a class="btn btn-danger" href="{{url('/cancel_order',$order->id)}}" onclick="return confirm('Are You Sure To Cancel Order?')">Cancel Order</a></td>         
                    @else
                    <td>Alredy Canceled</td>
                    @endif
                    </tr>
                    <?php $totalprice = $totalprice + $order->price ?>
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