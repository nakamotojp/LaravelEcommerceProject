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
            <div class="heading_container heading_center">
               <h2>
                  {{$product->title}}</span>
               </h2>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->discount_price != null)
                        <h6 style="color: red">
                           <p>?????????</p>
                           {{$product->discount_price}}???
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue;">
                           <p>??????</p>
                           {{$product->price}}???
                        </h6>
                        
                        @else
                        
                        <h6 style="text-decoration: line-through; color:blue;">
                           <p>??????</p>
                           {{$product->price}}???
                        </h6>                        
                        @endif


                     </div>
                     
                        <h6>???????????????:{{$product->category}}</h6>
                        <h6>????????????:{{$product->description}}</h6>

                        <form action="{{url('add_cart', $product->id)}}" method="POST">
                        @csrf
                                                      <div class="row">
                              <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                              </div>                                 
                              <div class="col-md-4">
                                 <input type="submit" value="Add To Cart">
                              </div>
                        </form>
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
         <p class="mx-auto">?? 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
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