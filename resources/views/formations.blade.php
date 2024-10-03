@extends('layouts.base')
@section('title','Formations')

@section('content')
@include ('partial.navbar2')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"> formations</h1>
                    <p>Des formations de qualités</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Formations</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Start Courses Area -->
<section class="courses style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="section-title">
                    {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Formation</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
               @foreach($formation as $value)
               <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Course -->
                <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                    <div class="course-image">
                        <a href="#"><img src="{{ asset('assets/uploads/formation_images/'.$value->image_url) }}"
                                alt="#">
                            </a>
                            {{--  <p class="price">Categorie</p>     --}}
                    </div>
                    <div class="content">
                        <p class="date">{{$value->category->name}} </p>

                        <p class="date"> {{$value->difficulete->name}}</p>
                        <h6> {{$value->titre}}</h6>
                        <h3><a href="#">{{$value->description}}</a></h3>
                    </div>
                </div>
                <!-- End Single Course -->
            </div>
               @endforeach
                {{--  <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-8.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="course-details.html">Contrôleur aérien </a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-9.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Équipier des forces spéciales de l'air</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>  --}}
                {{--  <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-10.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="price">$300</p>
                            <p class="date">FEb 10, 2023</p>
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="course-details.html">Spécialiste en cybersécurité</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-11.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="price">Free</p>
                            <p class="date">MAR 05, 2023</p>
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Spécialiste des systèmes d'armes navales</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="#"><img src="assets/images/courses/courses-12.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Technicien de maintenance navale</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>  --}}
            </div>
            {{--  <div class="row">
                <div class="col-12">
                    <div class="button">
                        <a href="courses-grid.html" class="btn">browsing all courses</a>
                    </div>
                </div>
            </div>  --}}
        </div>
    </div>
</section>
@endsection