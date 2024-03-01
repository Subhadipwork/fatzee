<!--=============== footer ===============-->
<footer>
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <!--tiwtter-->
                <div class="col-md-4">
                    <div class="footer-info">
                        <h4>About Us</h4>
                        <p>Est. 2019, we're doing what we love while feeding the communities that we love. Make a pit stop and you'll be pleased with choices of your taste. We offer delivery, carryout and dine-in options.</p>
                    </div>
                </div>
                <!--footer social links-->
                <div class="col-md-4">
                    <div class="footer-social">
                        <h3>Find us</h3>
                        <ul>
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--subscribe form-->
                <div class="col-md-4">
                    <div class="footer-info">
                        <h4>Newsletter</h4>
                        <div class="subcribe-form">
                            <form id="subscribe">
                                <input class="enteremail" name="email" id="subscribe-email" placeholder="Your email address.." spellcheck="false" type="text">
                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fa fa-envelope"></i></button>
                                <label for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bold-separator">
                <span></span>
            </div>
            <!--footer contacts links -->
            <ul class="footer-contacts">
                <li><a href="#">(847) 859-6293</a></li>
                <li><a href="#">1608 Emerson St Evanston, IL. 60201</a></li>
                <li><a href="#">fatzeesrestaurant@gmail.com</a></li>
            </ul>
        </div>
    </div>
    <!--to top / privacy policy-->
    <div class="to-top-holder">
        <div class="container">
            <p> <span> &#169; Fatzee's 2015 . </span> All rights reserved.</p>
            <div class="to-top"><span>Back To Top </span><i class="fa fa-angle-double-up"></i></div>
        </div>
    </div>
</footer>
<!--footer end -->
</div>

</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Owl Carousel  -->
<script src="{{asset('front_assets/libs/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- bootstrap link -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- js link -->
<script type="text/javascript" src="{{asset('front_assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/js/scriptnew.js')}}"></script>
@stack('scripts')


<script>
  function addToCart(id) {
    $.ajax({
      url: "{{ route('addCart') }}", 
      type: "post",
      data: {
        id: id,
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      dataType: "json",
      success: function (response) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top",
          iconColor: "success",
          customClass: {
            popup: "colored-toast",
          },
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
        });

        if (response.status == true) {
          Toast.fire({
            icon: "success",
            title: response.message,
          });
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      },
    });
  }
</script>

<script>
    $(document).ready(function() {
        
        $('.userRegister').on('click', function() {
            
            $.ajax({
                url: '{{ route('user.register') }}',
                type: 'post',
                data: $('#registerForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                alert(response.message);
                if (response.status == true) {
                     closergeFeom();
                }
                  
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: "top",
          iconColor: "success",
          customClass: {
            popup: "colored-toast",
          },
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
        });
        $('.userlogin_btn').on('click', function() {
            $.ajax({
                url: '{{ route('user.login')}}',
                type: 'post',
                data: $('#loginForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == true) {
                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                    }else {
                        Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                    }
                },
                error: function(error) {
                    Toast.fire({
                        icon: "error",
                        title: response.message,
                    });
                }
            })
        })
    })
</script>
</body>




</html>