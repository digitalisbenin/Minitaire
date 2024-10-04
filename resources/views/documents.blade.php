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
            <div class="col-lg-8 offset-lg-2 col-12">
               @foreach($resource as $value)
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
                            <p>{{$value->description}}
                            </p>
                            <ul class="social">
                                <li><a target="bank" href="/assets/uploads/resource_documents/{{$value->document_url}}">lien du document</a></li>
                                <li><a target="bank" href="/assets/uploads/resource_video/{{$value->video_url}}" >Lien de la vidéo</a></li>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>


               @endforeach


                {{--  <div class="teacher-personal-info mt-4">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="image">
                                <img src="assets/images/team/teacher-details.jpg" alt="#">
                                <h4 class="name">Annie Johnson
                                    <span>Graphics Design</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="personal-social">
                                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt, consectetur adipiscing elit.
                                </p>
                                <ul class="social">
                                    <li><a href="javascript:void(0)">Lien du document</a></li>
                                    <li><a href="javascript:void(0)">lien de la video </a></li>

                                </ul>
                            </div>
                        </div>
                    </div>


                </div>  --}}

            </div>
        </div>
    </div>
</div>
<!-- End teacher Details -->

@endsection
