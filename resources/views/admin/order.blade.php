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
          <form action="{{url('search')}}" method="get"> 
          @csrf
           <div class="div_center text_color">
             <form>
               <input type="text" name="search" placeholder="search text">

               <input type="submit" value="search" class="btn btn-outline-primary">
             </form>
          </form>   
           </div>
           
            @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
            @include('flash::message')
            @endif
            <div class="heading_container heading_center">
               <h2>Orderd status</h2>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <table>
                    <tr>
                    <th class="th_deg">name</th>
                    <th class="th_deg">email</th>
                    <th class="th_deg">adress</th>
                    <th class="th_deg">phone</th>
                    <th class="th_deg">product title</th>
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">payment_status</th>
                    <th class="th_deg">delivery_status</th>
                    <th class="th_deg">image</th>
                    <th class="th_deg">delivered</th>
                    <th class="th_deg">print pdf</th>
                    <th class="th_deg">send_email</th>
                    </tr>

                    @forelse($order as $orders)
                    <tr>
                    <td>{{$orders->name}}</td> 
                    <td>{{$orders->email}}</td> 
                    <td>{{$orders->adress}}</td> 
                    <td>{{$orders->phone}}</td> 
                    <td>{{$orders->product_title}}</td> 
                    <td>{{$orders->quantity}}</td> 
                    <td>{{$orders->price}}</td> 
                    <td>{{$orders->payment_status}}</td> 
                    <td>{{$orders->delivery_status}}</td> 
                    <td><img class="img_deg" src="/product/{{$orders->image}}"></td> 
                    
                    @if($orders->delivery_status == "proceeding")

                    <td><a href="{{url('delivered', $orders->id,)}}" class="btn btn-primary">delivered</a></td>


                    @else

                    <td><p>Deliverd</p></td>

                    @endif
                    <td><a href="{{url('/print_pdf', $orders->id,)}}" class="btn btn-secondary">PDF</a></td> 
                    <td><a href="{{url('/send_email', $orders->id,)}}" class="btn btn-info">send_email</a></td>


                    </tr>
                    @empty
                    <div>
                      <p>No Data</p>
                    </div>
                    
                    @endforelse
                  </table>
               <div style="margin:auto; margin-top:20px;">{!!$order->links()!!}</div>
                 
               </div>
            </div>
         </div>
      </section>
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
