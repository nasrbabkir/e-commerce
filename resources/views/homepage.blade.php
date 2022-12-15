@extends('front_layout.app')
    @section('content')
        <!-- ***** Main Banner Area Start ***** -->
        <div id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-content">
                            <div class="inner-content">
                                <h4>KlassyCafe</h4>
                                <h6>افضل تجربة</h6>
                                <div class="main-white-button scroll-to-section">
                                    <a href="#reservation">احجز الان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-banner header-text">
                            <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-01.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-02.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-03.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** About Area Starts ***** -->
        <section class="section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="left-text-content">
                            <div class="section-heading">
                                <h6>من نحن</h6>
                                <h2> نحن نقدم لكم افضل ما لدينا لنترك لكم افضل تجربة </h2>
                            </div>
                            <p>Klassy Cafe is one of the best <a href="https://templatemo.com/tag/restaurant" target="_blank" rel="sponsored">restaurant HTML templates</a> with Bootstrap v4.5.2 CSS framework. You can download and feel free to use this website template layout for your restaurant business. You are allowed to use this template for commercial purposes. <br><br>You are NOT allowed to redistribute the template ZIP file on any template donwnload website. Please contact us for more information.</p>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/images/about-thumb-01.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="assets/images/about-thumb-02.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="assets/images/about-thumb-03.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="right-content">
                            <div class="thumb">
                                <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                                <img src="assets/images/about-video-bg.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** About Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        <section class="section text-center" id="menu">
           <div class="section-header mb-5" >
                <h1>قائمة الاطعمة</h6>
                <h2>افضل انواع الاطعمة في إنتظاركم </h2>
            </div>

            
            <div class="menu-item-carousel">
                <div class="col-lg-12">
                    <div class="owl-menu-item owl-carousel">
                        @foreach ($foods as $food)
                                <div class="item pb-2">
                                    <div class='card card1' style="background-image:url({{$food->image_path}})">
                                        <div class="price"><h6>${{ $food->price }}</h6></div>
                                        <div class='info'>
                                            <h1 class='title'>{{ $food->title }}</h1>
                                            <div class='description'>{{ $food->description }}</div>
                                            <a href="{{ route('cart.add', $food->id) }}" class="btn btn-info mb-1">اضف الى السلة</a>
                                            <div class="main-text-button" style="margin-top:6px;">
                                                <div class="scroll-to-section"><a href="#reservation">احجز الان<i class="fa fa-angle-down"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Menu Area Ends ***** -->

        <!-- ***** Chefs Area Starts ***** -->
        <section class="section" id="chefs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Our Chefs</h6>
                            <h2>We offer the best ingredients for you</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($chefs  as $chef)
                        <div class="col-lg-4">
                            <div class="chef-item">
                                <div class="thumb">
                                    <div class="overlay"></div>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                    <img src="{{ $chef->image_path  }}" alt="{{ $chef->name  }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $chef->name  }}</h4>
                                    <span>{{ $chef->speiality }}</span>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ***** Chefs Area Ends ***** -->

        <!-- ***** Reservation Us Area Starts ***** -->
        <section class="section" id="reservation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-text-content">
                            <div class="section-heading">
                                <h6>Contact Us</h6>
                                <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                            </div>
                            <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="phone">
                                        <i class="fa fa-phone"></i>
                                        <h4>ارقام الهواتف</h4>
                                        <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="message">
                                        <i class="fa fa-envelope"></i>
                                        <h4>الايميلات</h4>
                                        <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form " >
                            <form id="contact" action="{{ route('reservation.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>احجز طاولة الان</h4>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                            <fieldset>
                                                <input  name="name" type="text" id="name" placeholder="الاسم*" required="">
                                            </fieldset>
                                        </div><!--end name dev-->

                                        <div class="col-lg-6 col-sm-12">
                                            <fieldset>
                                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="الايميل" required="">
                                            </fieldset>
                                        </div><!--end email dev-->

                                        <div class="col-lg-6 col-sm-12">
                                            <fieldset>
                                                <input name="phone" type="text" id="phone" placeholder="رقم الهاتف*" required="">
                                            </fieldset>
                                        </div><!--end phone dev-->

                                        <div class="col-md-6 col-sm-12">
                                            <input type="number" name="guest" placeholder="عدد الاشخاص">
                                        </div><!--end guest dev-->
                                        <div class="col-lg-6">
                                            <div id="filterDate2">    
                                                <div class="input-group date" data-date-format="dd/mm/yyyy">
                                                    <input  name="date" id="date" type="text" class="form-control" placeholder="اليوم/الشهر/العام">
                                                    <div class="input-group-addon" >
                                                    <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div><!--end data dev-->

                                        <div class="col-md-6 col-sm-12">
                                            <input type="time" name="time">
                                        </div><!--end time dev-->

                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" rows="6" id="message" placeholder="الرسالة" required=""></textarea>
                                            </fieldset>
                                        </div><!--end message dev-->

                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button-icon">احجز</button>
                                            </fieldset>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Reservation Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        <section class="section" id="offers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Klassy Week</h6>
                            <h2>This Week’s Special Meal Offers</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="tabs">
                            <div class="col-lg-12">
                                <div class="heading-tabs">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <ul>
                                            <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Breakfast</a></li>
                                            <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png" alt="">Lunch</a></a></li>
                                            <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png" alt="">Dinner</a></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <section class='tabs-content'>
                                    <article id='tabs-1'>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="left-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-01.png" alt="">
                                                                <h4>Fresh Chicken Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$10.50</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-02.png" alt="">
                                                                <h4>Orange Juice</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$8.50</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-03.png" alt="">
                                                                <h4>Fruit Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$9.90</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="right-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-04.png" alt="">
                                                                <h4>Eggs Omelette</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$6.50</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-05.png" alt="">
                                                                <h4>Dollma Pire</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$5.00</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-06.png" alt="">
                                                                <h4>Omelette & Cheese</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$4.10</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>  
                                    <article id='tabs-2'>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="left-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-04.png" alt="">
                                                                <h4>Eggs Omelette</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$14</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-05.png" alt="">
                                                                <h4>Dollma Pire</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$18</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-06.png" alt="">
                                                                <h4>Omelette & Cheese</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$22</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="right-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-01.png" alt="">
                                                                <h4>Fresh Chicken Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$10</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-02.png" alt="">
                                                                <h4>Orange Juice</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$20</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-03.png" alt="">
                                                                <h4>Fruit Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$30</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>  
                                    <article id='tabs-3'>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="left-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-05.png" alt="">
                                                                <h4>Eggs Omelette</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$14</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-03.png" alt="">
                                                                <h4>Orange Juice</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$18</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-02.png" alt="">
                                                                <h4>Fruit Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$10</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="right-list">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-06.png" alt="">
                                                                <h4>Fresh Chicken Salad</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$8.50</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-01.png" alt="">
                                                                <h4>Dollma Pire</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$9</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="assets/images/tab-item-04.png" alt="">
                                                                <h4>Omelette & Cheese</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                                <div class="price">
                                                                    <h6>$11</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>   
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Chefs Area Ends ***** --> 
    @endsection