@extends('layouts.base')
@section('title','Formateurs')

@section('content')
@include ('partial.navbar2')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Les formateurs</h1>
                    <p>Des formateurs de qualités</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Formateurs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Teachers -->
<section id="teachers" class="teachers section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span>Formateurs</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Les formateurs certifiés</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Team -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <!-- Image -->
                            <div class="image">
                                <img src="assets/images/team/team-1.jpg" alt="#">
                            </div>
                            <!-- End Image -->
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">
                                <!-- Info Box -->
                                <div class="info-box">
                                    <span class="designation">Math Teacher</span>
                                    <h4 class="name"><a href="teacher-details.html">Selena Gomez</a></h4>
                                    <p>Your chance to be a trending expert in IT industries and make a successful
                                        career completion.</p>
                                </div>
                                <!-- End Info Box -->
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
            <!-- Single Team -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <!-- Image -->
                            <div class="image">
                                <img src="assets/images/team/team-2.jpg" alt="#">
                            </div>
                            <!-- End Image -->
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">
                                <!-- Info Box -->
                                <div class="info-box">
                                    <span class="designation">Professor</span>
                                    <h4 class="name"><a href="teacher-details.html">Michel Vouge</a></h4>
                                    <p>Your chance to be a trending expert in IT industries and make a successful
                                        career completion.</p>
                                </div>
                                <!-- End Info Box -->
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
            <!-- Single Team -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <!-- Image -->
                            <div class="image">
                                <img src="assets/images/team/team-3.jpg" alt="#">
                            </div>
                            <!-- End Image -->
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">
                                <!-- Info Box -->
                                <div class="info-box">
                                    <span class="designation">English Teacher</span>
                                    <h4 class="name"><a href="teacher-details.html">Jen Maroney</a></h4>
                                    <p>Your chance to be a trending expert in IT industries and make a successful
                                        career completion.</p>
                                </div>
                                <!-- End Info Box -->
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
            <!-- Single Team -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <!-- Image -->
                            <div class="image">
                                <img src="assets/images/team/team-4.jpg" alt="#">
                            </div>
                            <!-- End Image -->
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">
                                <!-- Info Box -->
                                <div class="info-box">
                                    <span class="designation">Programmer</span>
                                    <h4 class="name"><a href="teacher-details.html">Cindy Chow</a></h4>
                                    <p>Your chance to be a trending expert in IT industries and make a successful
                                        career completion.</p>
                                </div>
                                <!-- End Info Box -->
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
        </div>
    </div>
</section>
<!--/ End Teachers Area -->

@endsection