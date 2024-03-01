@extends('frontend.layouts.app')



@section('content')


<div id="wrapper">
    <!--=============== Hero content ===============-->
    <div class="content hero-content" style="height: 70vh;">
        <div class="slideshow-container">
            <!-- slideshow -->
            <div class="slides-container">
                <!-- 1 -->
                <div class="bg" style="background-image: url(assets/images/bg/1.jpg)"></div>
                <!-- 2 -->
                <div class="bg" style="background-image: url(assets/images/bg/28.jpg)"></div>
                <!-- 3 -->
                <div class="bg" style="background-image: url(assets/images/bg/8.jpg)"></div>
            </div>
        </div>
        <div class="hero-title-holder">
            <div class="overlay"></div>
            <div class="hero-title">
                <div class="hero-decor b-dec">
                    <div class="half-circle"></div>
                </div>
                <div class="separator color-separator"></div>
                <h3>Welcome to Fatzee's</h3>
                <h4>Lorem ipsum dolor sit amet.</h4>
            </div>
        </div>
        <div class="hero-link">
            <a class="custom-scroll-link" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
        </div>
    </div>
    <!--hero end-->
    <div class="content">
        <!--=============== About ===============-->
        <section class="about-section" id="sec1">
            <div class="container">
                <div class="row">
                    <!--about text-->
                    <div class="col-md-6">
                        <div class="section-title">
                            <h3>Discover</h3>
                            <h4 class="decor-title">Our story</h4>
                            <div class="separator color-separator"></div>
                        </div>
                        <p>Est. 2019, we're doing what we love while feeding the communities that we love. Make a pit stop and you'll be pleased with choices of your taste. We offer delivery, carryout and dine-in options. </p>
                        <p> Our menu is rich in freshly prepared Cheesesteaks, Burgers, Lemon Pepper Chicken, Milkshakes & more at prices as satisfying as every last bite. We pride ourselves on providing our customers with the absolute best while serving all our customers with the finest Zabiha Halal meat.</p>
                        <a href="menu.php" class="link">Discover our menu</a>
                    </div>
                    <!-- about images-->
                    <div class="col-md-6">
                        <div class="single-slider-holder">
                            <div class="customNavigation">
                                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <div class="single-slider owl-carousel">
                                <!-- 1 -->
                                <div class="item">
                                    <img src="assets/images/fatzee3.jpg" class="respimg" alt="">
                                </div>
                                <!-- 2 -->
                                <div class="item">
                                    <img src="assets/images/fatzee2.jpg" class="respimg" alt="">
                                </div>
                                <!-- 3 -->
                                <div class="item">
                                    <img src="assets/images/fatzee1.jpg" class="respimg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=============== Opening Hours ===============-->
        <section class="parallax-section">
            <div class="media-container video-parallax" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
                <div class="bg mob-bg" style="background-image: url(assets/images/bg/18.jpg)"></div>
                <div class="video-container">
                    <video autoplay playsinline loop muted class="bgvid">
                        <source src="assets/video/1.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="overlay"></div>
            <div class="mycontainer">
                <h2>Opening Hours</h2>
                <h3>Call For Reservations</h3>
                <div class="bold-separator">
                    <span></span>
                </div>
                <div class="work-time">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <h3>Monday to Sunday</h3>
                            <div class="hours">
                                11:00 am<br>
                                12:00 pm
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="big-number"><a href="#">(847) 859-6293</a></div>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->
        <!--=============== About 2 ===============-->
        <section class="about-section">
            <!-- triangle decoration-->
            <div class="triangle-decor">
            </div>
            <!-- our restorans -->

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-slider-holder">
                            <div class="customNavigation">
                                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <img src="assets/images/fatzee1.jpg" class="respimg" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/fatzee2.jpg" class="respimg" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/fatzee3.jpg" class="respimg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-title">
                            <h3>Our Restaurant</h3>
                            <h4 class="decor-title">About Us</h4>
                            <div class="separator color-separator"></div>
                        </div>
                        <p>Our menu is rich in freshly prepared Cheesesteaks, Burgers, Lemon Pepper Chicken, Milkshakes & more at prices as satisfying as every last bite. We pride ourselves on providing our customers with the absolute best while serving all our customers with the finest Zabiha Halal meat.</p>
                        <a href="gallery.php" class="link">View gallery</a>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->
        <!--=============== Weekly Deals ===============-->
        <section class="parallax-section">
            <div class="bg bg-parallax" style="background-image:url(assets/images/bg/8.jpg)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
            <div class="overlay"></div>
            <div class="mycontainer">
                <h2>Weekly Deals</h2>
                <h3>Our Special Weekly Menu</h3>
                <div class="bold-separator">
                    <span></span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- 1 -->
                        <div class="promotion-item">
                            <div class="promotion-title">
                                <h4>Monday</h4>
                                <span>( Most Popular )</span>
                            </div>
                            <div class="promotion-details">
                                <div class="promotion-desc">Popcorn Shrimp Dinner</div>
                                <div class="promotion-dot"></div>
                                <div class="promotion-prices"><span class="promotion-price">$34</span><span class="promotion-discount">$26</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="col-md-12">
                        <div class="promotion-item">
                            <div class="promotion-title">
                                <h4>Tuesday</h4>
                                <span> ( Appetizers )</span>
                            </div>
                            <div class="promotion-details">
                                <div class="promotion-desc">Jalapeno Poppers</div>
                                <div class="promotion-dot"></div>
                                <div class="promotion-prices"><span class="promotion-price">$130</span><span class="promotion-discount">$90</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="col-md-12">
                        <div class="promotion-item">
                            <div class="promotion-title">
                                <h4>Wednesday</h4>
                                <span> ( Popular in Desserts )</span>
                            </div>
                            <div class="promotion-details">
                                <div class="promotion-desc">Snicker Caramel Cake Slice</div>
                                <div class="promotion-dot"></div>
                                <div class="promotion-prices"><span class="promotion-price">$30</span><span class="promotion-discount">$20</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="col-md-12">
                        <div class="promotion-item">
                            <div class="promotion-title">
                                <h4>Thursday </h4>
                                <span> ( Tacos & Quesadillas )</span>
                            </div>
                            <div class="promotion-details">
                                <div class="promotion-desc">Chicken Quesadilla</div>
                                <div class="promotion-dot"></div>
                                <div class="promotion-prices"><span class="promotion-price">$61</span><span class="promotion-discount">$44</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="menu.php" class="align-link link">Order Now</a>
            </div>
        </section>
        <!--section end-->
        <!--=============== team ===============-->
        <section id="sec3">
            <div class="triangle-decor"></div>
            <div class="container">
                <div class="section-title">
                    <h3>Our Team</h3>
                    <h4>High-class professional service</h4>
                    <div class="separator color-separator"></div>
                </div>
                <div class="inner">
                    <p> Numerous commentators have also referred to the supposed restaurant owner's eccentric habit of touting for custom outside his establishment, dressed in aristocratic fashion and brandishing a sword</p>
                </div>
                <div class="bold-separator">
                    <span></span>
                </div>
                <div class="team-links">
                    <!-- member 1 link -->
                    <div class="team-item">
                        <a href="assets/team/mem1.php" class="popup-with-move-anim">
                            <span class="team-details">More info</span>
                            <img src="assets/images/team/thumbnails/1.jpg" alt="" class="respimg">
                            <span class="chefname">Andy Moore</span>
                            <span class="chefinfo">Master chef in Brooklin</span>
                        </a>
                    </div>
                    <!-- member 2 link -->
                    <div class="team-item">
                        <a href="assets/team/mem2.php" class="popup-with-move-anim">
                            <span class="team-details">More info</span>
                            <img src="assets/images/team/thumbnails/2.jpg" alt="" class="respimg">
                            <span class="chefname">Jhon Doe</span>
                            <span class="chefinfo">Master chef in Florida</span>
                        </a>
                    </div>
                    <!-- member 3 link -->
                    <div class="team-item">
                        <a href="assets/team/mem3.php" class="popup-with-move-anim">
                            <span class="team-details">More info</span>
                            <img src="assets/images/team/thumbnails/3.jpg" alt="" class="respimg">
                            <span class="chefname">Andy Moore</span>
                            <span class="chefinfo">Master chef in Bronks</span>
                        </a>
                    </div>
                    <!-- member 4 link -->
                    <div class="team-item">
                        <a href="assets/team/mem4.php" class="popup-with-move-anim">
                            <span class="team-details">More info</span>
                            <img src="assets/images/team/thumbnails/4.jpg" alt="" class="respimg">
                            <span class="chefname">Andy Moore</span>
                            <span class="chefinfo">Master chef in Maiami</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->
        <!--=============== testimonials ===============-->
        <section class="parallax-section">
            <div class="bg bg-parallax" style="background-image:url(assets/images/bg/1.jpg)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
            <div class="overlay"></div>
            <div class="mycontainer">
                <h2>Testimonials</h2>
                <h3>What said about us</h3>
                <div class="bold-separator">
                    <span></span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonials-holder">
                            <div class="customNavigation">
                                <a class="prev-slide transition"><i class="fa fa-long-arrow-left"></i></a>
                                <a class="next-slide transition"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            <div class="testimonials-slider owl-carousel">
                                <div class="item">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <p>
                                        "Suuuper cool 1st time experience! Found them while in the area taking care of some business. Was worried about how fresh the food would be since it was close to closing time but fish and fries were made fresh and the food was piping hot! Great food, great service, nice price point for the portions AND it's family owned and operated. I will definitely be back, for sure!!!"</p>
                                    <h4><a href="#" target="_blank">Veronda M Pierson</a></h4>
                                </div>
                                <div class="item">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li> <i class="fa fa-star-half"></i></li>
                                    </ul>
                                    <p>"I absolutely love this place! The quality of the food is always great as well as the customer service. I would definitely recommend eating at this restaurant for lunch or dinner. There are plenty of places to sit while playing nice music."</p>
                                    <h4><a href="#" target="_blank">Sheena Benson</a></h4>
                                </div>
                                <div class="item">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <p>When I say this is some of the best fried chicken wings I’ve ever had, I'M NOT LYING. Me and my boyfriend would drive from the city almost every weekend and have this place we were THAT obsessed. The owner is the nicest guy ever, always the best customer service making sure we always have what we need. I moved away and I came back to visit and this is the first place I wanted to stop. If I could give them more than 5 stars I would. One of the best places I’ve ever eaten! Such good quality food."</p>
                                    <h4><a href="#" target="_blank">Tammy Wilkening</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-icon"><i class="fa fa-quote-left"></i></div>
            </div>
        </section>
        <!--section end-->
    </div>
    <!--content end-->

    @endSection