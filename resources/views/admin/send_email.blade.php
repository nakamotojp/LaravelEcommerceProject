<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public"> 
    @include("admin.css")
    
    <style type="text/css">

        
        .div_center{
            text-align:center;
            paddig-top:40px;
        }
        
        .font_size{
            font-size: 20px;
            paddig-bottom: 10px;
        }
        
        .text_color{
            color:black;
            paddig-bottom: 20px;
        }
        
        label{
            display: inline-block;
            width: 200px;
        }
        
        .div_design{
            padding-bottom: 15px;
        }
        
        /*.center{*/
        /*  margin:auto;*/
        /*  width: 50%;*/
        /*  text-aligin:center;*/
        /*  padding: 30px;*/
        /*}*/
        
        table, th, td{
          border: 1px solid white;
        }
        
        .th_deg{
          font-size:10px;
          /*padding: 5px;*/
          background: skyblude;
        }

        
        .img_deg{
            width: 200px;
        }
        
        .order_section{
            padding-top:100px;
            height:1200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include("admin.sidebar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include("admin.header")
        <!-- partial -->

          <section class="order_section layout_padding">
             <div class="container">
                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{session()->get('message')}}
                </div>
                @include('flash::message')
                @endif
                <div class="heading_container heading_center div_design">
                   <h2 class='div_center'>send_email to {{$order->email}}</h2>
                   <form action="{{url('send_email_user', $order->id)}}" method="POST">
                       @csrf
                   <div>
                       <label>greeting</label>
                       <input type="text" name="greeting" class="text_color">
                   </div>
                   <div>
                       <label>firstline</label>
                       <input type="text" name="firstline" class="text_color">
                   </div>
                   <div>
                       <label>body</label>
                       <input type="text" name="body" class="text_color">
                   </div>
                   <div>
                       <label>button</label>
                       <input type="text" name="button" class="text_color">
                   </div>
                   <div>
                       <label>url</label>
                       <input type="text" name="url" class="text_color">
                   </div>
                   <div>
                       <label>lastline</label>
                       <input type="text" name="lastline" class="text_color">
                   </div>
                   <div>
                       <input type="submit" value="send_email" class="btn btn-primary">
                   </div>
                   </form>
                </div>
             </div>
          </section>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- End custom js for this page -->
  </body>
</html>