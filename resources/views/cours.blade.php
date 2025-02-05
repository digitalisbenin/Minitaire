@extends('layouts.base')
@section('title','Cours')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cours</h1>
                    <p>Des cours variés et accessibles sont proposés afin de
                        permettre aux apprenants de développer et d’améliorer leurs compétences dans divers domaines,
                         en leur offrant des opportunités d’apprentissage adaptées à leurs besoins spécifiques et à leurs
                         objectifs personnels et professionnels.</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Cours</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Start Courses Area -->
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
                            <p class="price">Difficultés</p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">L'informatique</a></h3>
                            <p>L'informatique est la science qui traite du traitement, du stockage et de la transmission de
                                 l'information par des moyens électroniques</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>22 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Programmation</a>
                            </span>
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
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>10 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Business</a>
                            </span>
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
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>55 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Aéronefs.</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-4.jpeg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="course-details.html">Génie électrique</a></h3>
                            <p>Le génie électrique est une branche de l'ingénierie qui traite de l'étude
                                 et de l'application des équipements, dispositifs et systèmes utilisant
                                l'électricité, l'électronique et l'électromagnétisme.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>60 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Science</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-5.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Conception architecturale</a></h3>
                            <p>La conception architecturale est le processus de création et de
                                 planification des structures et des espaces bâtis, en tenant
                                 compte à la fois des aspects fonctionnels et esthétiques.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>25 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Conception</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-6.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Technologie médicale</a></h3>
                            <p>La technologie médicale
                                 englobe l'ensemble des outils, équipements, dispositifs et logiciels
                                  utilisés pour diagnostiquer, traiter, surveiller et améliorer la
                                   santé des patients.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>35 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Médical</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-4.jpeg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Génie électrique</a></h3>
                            <p>Le génie électrique est une branche de l'ingénierie qui traite de l'étude
                                 et de l'application des équipements, dispositifs et systèmes utilisant
                                l'électricité, l'électronique et l'électromagnétisme.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>60 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Science</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="{{url('/details-cours')}}"><img src="assets/images/courses/courses-5.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{url('/details-cours')}}">Conception architecturale</a></h3>
                            <p>La conception architecturale est le processus de création et de
                                 planification des structures et des espaces bâtis, en tenant
                                 compte à la fois des aspects fonctionnels et esthétiques.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>25 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Conception</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-6.jpg"
                                    alt="#"></a>
                            <p class="price"></p>
                        </div>
                        <div class="content">
                            <h3><a href="course-details.html">Technologie médicale</a></h3>
                            <p>La technologie médicale
                                 englobe l'ensemble des outils, équipements, dispositifs et logiciels
                                  utilisés pour diagnostiquer, traiter, surveiller et améliorer la
                                   santé des patients.</p>
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                {{--  <li>35 Reviews</li>  --}}
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Médical</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Courses Area -->
<div class="row mb-3">
    <div class="col-12">
        <!-- Pagination -->
        <div class="pagination center">
            <ul class="pagination-list">
                <li><a href="javascript:void(0)">Prev</a></li>
                <li class="active"><a href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)">Next</a></li>
            </ul>
        </div>
        <!--/ End Pagination -->
    </div>
</div>
</div>
</section>
<!-- End Events Area-->
@endsection