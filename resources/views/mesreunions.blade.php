@extends('layouts.base')
@php
use Carbon\Carbon;
@endphp

@section('title','Mes reunions')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Meet</h1>
                    <p>Des séance de visioconférence</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>VisioConférences</li>
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
                    <span>VisioConférence</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s"></h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12  col-12"  style="font-size: 17px;">
               @foreach($meet as $value)
               <div class="teacher-personal-info">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-12">
                        <div class="image">
                           
                            <h4 class="name">{{$value->visioconference->titre}}
                               
                            </h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                    
                          
                        
                        
                                <a  target="bank" href="#">{{ \Carbon\Carbon::parse($value->visioconference->date)->format('d/m/Y') }}</a>
                               

                         
                        
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                    
                          
                        
                        
                                <a  target="bank" href="#">{{ \Carbon\Carbon::parse($value->visioconference->debut)->format('H:i') }}</a>
                               

                         
                        
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                    
                          
                        
                        
                                <a  target="bank" href="#">{{ \Carbon\Carbon::parse($value->visioconference->fin)->format('H:i') }}</a>
                               

                         
                        
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                    
                          
                        
                        
                                
                               
                        
                                @php


                                // Convertir $value->fin en instance de Carbon
                                $dateTime = Carbon::parse($value->visioconference->date . ' ' . $value->visioconference->fin)->setTimezone('Africa/Lagos');

                                $now = Carbon::now()->setTimezone('Africa/Lagos');
                            @endphp
                             
                            @if ($dateTime->isPast())
                                <span class="badge bg-danger">Terminé</span>
                            @else
                                <span class="badge bg-success">En cours</span>
                            @endif
                            </span>
                         
                        
                    </div>
                    <div class="col-lg-2 col-md-4 col-12">
                    
                          
                        
                        
                        <a class="name" target="bank" href="{{$value->visioconference->lien_meet}}" >Lien du meet</a>

                 
                
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
