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

                    <h1 class="font_size">Update Product</h1>
                                        <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                    <div class="div_design">
                    <label>Product Title:</label>
                    <input type="text" class="text_color" name="title" placeholder="write name of title" required="" value="{{$product->title}}">
                    </div>
                    
                    <div class="div_design">
                    <label>Product Description:</label>
                    <input type="text" class="text_color" name="title" placeholder="write name of description" required="" value="{{$product->description}}">
                    </div>
                    
                    <div class="div_design">
                    <label>Product Price:</label>
                    <input type="number" class="text_color" name="price" placeholder="write name of price" required="" value="{{$product->price}}">
                    </div>
                    
                    
                    <div class="div_design">
                    <label>Product Discount Price</label>
                    <input type="number" class="text_color" name="dis_price" placeholder="write name of discount" required="" value="{{$product->dis_price}}">
                    </div>
                    
                    <div class="div_design">
                    <label>Product Quantity:</label>
                    <input type="number" min="0" class="text_color" name="quantity" placeholder="write name of Quantity" required="" value="{{$product->quantity}}">
                    </div>

                    <div class="div_design">
                    <label>Product Category:</label>
                    <select class="text_color" name="category" required="">
                        <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="div_design">
                    <label>Current Image</label>
                    <img style="margin:auto" height="150px" width="150px" src="/product/{{$product->image}}">
                    </div>
                    
                    <div class="div_design">
                    <label>Update Image</label>
                    <input type="file" name="image"   required="">
                    </div>
                    
                    <div class="div_design">
                    <input type="submit" value="add product" class="btn btn-primary">
                    </div>
                    
                    </form>
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
