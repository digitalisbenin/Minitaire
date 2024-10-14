@extends('layouts.base')
@section('title','Documents')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Documents</h1>
                    <p>Des documents disponible pour les apprenants</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Documents</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Teacher Details -->
<div class="teacher-details-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span>Documents</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Les documents</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($resource as $value)
            <div class="col-lg-4 col-md-6 col-12"> <!-- Ajustement pour les tailles moyennes et petites -->
                <div class="teacher-personal-info">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="image">
                                <img src="{{ asset('assets/uploads/resource_images/'.$value->image_url) }}" alt="#">
                                <h4 class="name">{{$value->titre}}
                                    {{--  <span>Graphics Design</span>  --}}
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="personal-social">
                                <p>{{$value->description}}</p>
                                <ul class="social">
                                    <li><a target="bank" href="/assets/uploads/resource_documents/{{$value->document_url}}">Lien du document</a></li>
                                    <li><a target="bank" href="/assets/uploads/resource_video/{{$value->video_url}}">Lien de la vidéo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- End teacher Details -->

@endsection
