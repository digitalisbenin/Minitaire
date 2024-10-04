@extends('layouts.base')
@section('title','Videos')

@section('content')
@include ('partial.navbar')


<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Video </h1>
                    <p>Voir les vidéo lié au cours</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{('/')}}">Accueil</a></li>
                    <li>Video </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="courses section">
    <div class="container">
        {{--  <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-graduation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Quelques cours</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Des cours variés et accessibles sont proposés afin de
                         permettre aux apprenants de développer et d’améliorer leurs compétences dans divers domaines,
                          en leur offrant des opportunités d’apprentissage adaptées à leurs besoins spécifiques et à leurs
                          objectifs personnels et professionnels.
                        </p>
                </div>
            </div>
        </div>  --}}
        <div class="single-head">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-1.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">L'informatique</a></h3>
                            <p>L'informatique est la science qui traite du traitement, du stockage et de la transmission de
                                 l'information par des moyens électroniques</p>
                        </div>
                       
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-2.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Gestion d'entreprise</a></h3>
                            <p>La gestion d'entreprise est la pratique consistant à diriger et à administrer les opérations d'une organisation pour atteindre ses objectifs</p>
                        </div>
                      
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-3.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Aéronautique</a></h3>
                            <p>L'aéronautique est la science et la pratique de la conception, de la construction, et de l'exploitation des aéronefs.</p>
                        </div>
                     
                    </div>
                    <!-- End Single Course -->
                </div>
               
               
        
            </div>
        </div>
    </div>
</section>
@endsection