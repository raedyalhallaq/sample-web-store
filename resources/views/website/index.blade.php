@extends('layouts.website')
@section('content')
<div class="inner-wrapper">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" >
            <aside class="section no-padding">
                <div class="section-featured-slider">
                    <div id="main-slider"  class="cycle-slideshow  featrued-slider" data-cycle-fx="fadeout"  data-cycle-speed="1000"  data-cycle-pause-on-hover="true"  data-cycle-loader="true"  data-cycle-log="false"  data-cycle-swipe="true" data-cycle-auto-height="container"  data-cycle-timeout="3000"  data-cycle-slides="article" data-pager-template='<span class="pager-box"></span>'>
                        <div class="cycle-prev"><i class="fas fa-angle-right" aria-hidden="true"></i></div>
                        <div class="cycle-next"><i class="fas fa-angle-left" aria-hidden="true"></i></div>
                        <div class="cycle-pager"> </div>
                        <article id="first-article">
                            <div class="caption">
                                <div class="cycle-caption text-aligncenter">
                                    <p  style="color:#fff">TryShop</p>
                                    <h2 class="big-size" style="color:#fff">تسوّق..جرّب..ثُمّ ادفع</h2>
                                    <p style="color:#fff">جرِّب غرفة المقاس الافتراضية لدينا<br/>.وعِش التجرُبة الأُولى من نوعها في عالم التسوّق الإلكتروني</p>
                                    <div class="slider-buttons">
                                        <a id="btn-subscribe" class="custom-button">اشترك الآن</a>
                                    </div>
                                </div>
                            </div> 
                            <a href="#">
                                <img src="images/slider/slider9.jpg" alt="Slider" />
                            </a>
                        </article>
                        <article>
                            <div class="caption">
                                <div class="cycle-caption text-alignright">
                                    <p>TryShop</p>
                                    <h4><a href="#" >جرب منتجاتنا قبل الدفع و تميز معنا بتقنية ثلاثية الأبعاد</a></h4>
                                    <h4></h4>
                                    <div class="slider-buttons">
                                        <a class="custom-button" id="btn-subscribe">اشترك الآن</a>
                                    </div>
                                </div> 
                            </div> 
                            <a href="#">
                                <img src="images/slider/slide-4.jpg" alt="Slider" />
                            </a>
                        </article>
                    </div>
                </div>
            </aside> 
            <aside  class="section padding">
                <div class="section-product-categorys">
                    <div class="container">
                        <div class="section-title-wrap">
                            <h2 class="section-title">التصنيفات </h2>
                        </div>
                        <div class="inner-wrapper">
                        <div id="section-news-letter"></div>
                            <div class="product-categorys-inner-wrapper section-carousel-enabled byapr-carousel" data-slick="{&quot;slidesToShow&quot;:4,&quot;dots&quot;:false,&quot;prevArrow&quot;:&quot;<span data-role=\&quot;none\&quot; class=\&quot;slick-prev\&quot; tabindex=\&quot;0\&quot;><i class=\&quot;fa fa-angle-right\&quot; aria-hidden=\&quot;true\&quot;><\/i><\/span>&quot;,&quot;nextArrow&quot;:&quot;<span data-role=\&quot;none\&quot; class=\&quot;slick-next\&quot; tabindex=\&quot;0\&quot;><i class=\&quot;fa fa-angle-left\&quot; aria-hidden=\&quot;true\&quot;><\/i><\/span>&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1024,&quot;settings&quot;:{&quot;slidesToShow&quot;:4}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3}},{&quot;breakpoint&quot;:659,&quot;settings&quot;:{&quot;slidesToShow&quot;:2}},{&quot;breakpoint&quot;:479,&quot;settings&quot;:{&quot;slidesToShow&quot;:1}}]}">
                                <div class="product-item col-grid-3">
                                    <div class="product-item-wrapper zoom-effect-hover-container box-shadow-block">
                                        <div class="product-thumb zoom-effect">
                                            <a class="thumbnail"><img alt="category" src="images/shop/cat1.jpg"></a>
                                        </div>
                                        <h3 class="category-title"><a title="title">ازياء نسائية شتوية  </a></h3>
                                    </div>
                                </div>
                        </div> 
                    </div>   
                </div>
            </aside>
            <aside  class="section">
                <div class="section-product-categorys">
                    <div class="container">
                        <div class="section-title-wrap">
                            <h2 class="section-title">منتجاتنا </h2>
                        </div>
                        <div class="inner-wrapper">
                            <div class="product-categorys-inner-wrapper">
                                <div class="product-item col-grid-3">
                                    <div class="product-item-wrapper zoom-effect-hover-container box-shadow-block">
                                        <div class="product-thumb zoom-effect">
                                            <a class="thumbnail"><img alt="category" src="images/shop/product1.jpeg"></a>
                                        </div><!-- .product-thumb -->
                                        <!-- .product-cats -->
                                        <h3 class="category-title"><a title="title">بلوزة ذات أكمام طويلة</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>   
                </div><!-- .section-product-categorys -->
            </aside><!-- .section -->
            <aside class="section last-section cta-background background-img attachment-fixed overlay-enabled">
                <div class="section-call-to-action">
                    <div class="container">
                        <div class="inner-wrapper">
                            <div class="call-to-action-content col-grid-12 text-aligncenter">
                                <div class="call-to-action-description ">
                                    <p>TryShop</p>
                                    <h2 class="big-size">تسوّق..جرّب..ثُمّ ادفع</h2>
                                    <p>جرِّب غرفة المقاس الافتراضية لدينا<br/>.وعِش التجرُبة الأُولى من نوعها في عالم التسوّق الإلكتروني</p>
                                </div><!-- .call-to-action-description -->
                                <div class="call-to-action-buttons">
                                    <a class="custom-button" id="btn-subscribe">اشترك الآن</a>
                                </div><!-- .call-to-action-buttons -->
                            </div><!-- .call-to-action-content -->
                        </div> 
                    </div>   
                </div> <!-- .call-to-action" -->
            </aside><!-- .section -->
        </main> <!-- #main -->
    </div>
</div>
@endsection