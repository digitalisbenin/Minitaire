@extends('layouts.base')
@section('title','Contact')

@section('content')
@include ('partial.navbar')


<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Contact </h1>
                    <p>Contacter-nous</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{('/')}}">Accueil</a></li>
                    <li>Contact </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="form-main">
                    <h3 class="title"><span></span>
                        Veuillez nous laisser un message
                    </h3>
                    <form class="form" method="post" action="https://demo.graygrids.com/themes/edugrids/assets/mail/mail.php">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Votre nom complet</label>
                                    <input name="name" type="text" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Objet</label>
                                    <input name="subject" type="text" placeholder=""
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input name="phone" type="text" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message">
                                    <label> Message</label>
                                    <textarea name="message" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="btn "> Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="contact-info">
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-map-marker"></i>
                        <h4>Adresse</h4>
                        <p class="no-margin-bottom">02 BP 2091
                            <br>Cotonou, Bénin</p>
                    </div>
                    <!-- End Single Info -->
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-phone"></i>
                        <h4>Téléphone</h4>
                        <p class="no-margin-bottom">Téléphone: (+229) 123 456 789
                            <br> Fax: 123 456 789</p>
                    </div>
                    <!-- End Single Info -->
                    <!-- Start Single Info -->
                    <div class="single-info">
                        <i class="lni lni-envelope"></i>
                        <h4>E-mail </h4>
                        <p class="no-margin-bottom"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                            <br> <a href="mailto:contact@yourdomain.com">contact@yourdomain.com</a></p>
                    </div>
                    <!-- End Single Info -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Area -->
@endsection