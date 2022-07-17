<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <base href="/public">
    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky" style="margin-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                    
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section">
                                @auth
                                <a href="{{ url('/showcart', Auth::user()->id) }}">
                                    
                                Cart[{{ $count }}]</a></li>
                                @endauth

                                @guest
                                    Cart[0]
                                @endguest
                            
                            <li>
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <li><x-app-layout></x-app-layout></li>
                                @else
                                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
            
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                    @endif
                                @endauth
                            </div>
                            @endif
                            </li>
                        </ul>        
                       
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div id="top">

   
        <div class="container" style="width:900px">
            <h1 style="text-align: center">Your Cart</h1>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success')}}</div>
            @endif
            @if(Session::has('order'))
            <div class="alert alert-success" role="alert">{{ Session::get('order')}}</div>
            @endif
           
        <table class="table table-bordered" style="text-align: center">
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <form action="{{ url('orderconfirm') }}" method="post">
                @csrf

            
            @foreach ($data as $item)
            
            <tr>
                
                <td>{{ $item->food->title }}
                    <input type="text" name="foodname[]" hidden="true" value="{{ $item->food->title }}"></td>
                <td>{{ $item->food->price }}
                    <input type="text" name="price[]" hidden="true" value="{{ $item->food->image }}"></td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}
                    <input type="text" name="quantity[]" hidden="true" value="{{ $item->quantity }}"></td>
                <td><a href="{{ url('/remove',$item->id) }}">Remove</a></td>
            </tr>
            <input type="hidden" value="{{ $item->user_id }}" name="user_id">            
            @endforeach
           
        </table>
        <div style="text-align: center" class="mb-3">
        <button class="btn btn-primary" type="button" id="order">Order Now</button>
        </div>
        <div id="appear" style="display: none">
        <div class="mb-3" >
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone Number</label>
          <input type="text" class="form-control" name="phone">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Address</label>
        <input type="text" class="form-control" name="address">
        </div>
        <div style="text-align: center">
            <button type="submit" class="btn btn-success" type="submit">Order Confirm</button>
            <button class="btn btn-danger" type="button" id="close">Cancel</button>
        </div>
    </div>
</div>
</form>


    
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="left-text-content">
                    <p>© Copyright Klassy Cafe Co.
                    
                    <br>Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    $("#order").click(function()
    {
        $("#appear").show();
    });
    $("#close").click(function()
    {
        $("#appear").hide();
    });
</script>
<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);
            
        });
    });

</script>
</body>
</html>