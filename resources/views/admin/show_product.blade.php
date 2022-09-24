<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.css")
    
    <style type="text/css">
        .div_center{
            text-align:center;
            paddig-top:40px;
        }
        
        .font_size{
            font-size: 40px;
            paddig-bottom: 40px;
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
        
        .center{
            margin:auto;
            width:50%;
            border:2px solid white;
            text-align: center;
            margin-top:40px;
        }
        
        .img_size{
            width:150px;
            height:150px;
        }
        
        .th_color{
            background:skyblue;
        }
        
        .th_deg{
            paddig:30px;
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
        <div class="main-panel">
            <div class="content-wrapper">
                
              @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" clase="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{session()->get('message')}}
                </div>
              @endif
              
                <div class="div_center">

                    <h1 class="font_size">Show product</h1>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_deg">Product title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Category</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount Price</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Edit</th>
                        </tr>
                        @foreach($product as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->dis_price}}</td>
                            <td><img class="img_size" src="/product/{{$product->image}}"></td>
                            <td><a onclick="return confirm('Are you sure to delete?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                            <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        @include("admin.footer")
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
        @include("admin.script")
    <!-- End custom js for this page -->
  </body>
</html>
