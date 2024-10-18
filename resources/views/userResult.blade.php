@extends('layouts.base')
@section('title','R2ponse quiz')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Résultats utilisateur</h1>
                    <p>Voir mes résultats</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Résultats</li>
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
                    {{--  <span>Documents</span>  --}}
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Mes résultats</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>  
        <div class="col">
          
            <div class="col-lg-12 col-md-6 col-12"> <!-- Ajustement pour les tailles moyennes et petites -->
                
                <table id="studentTable" class="table table-striped">
                    <thead>
                        <tr class="">
                            {{--  <th class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox" id="selectAll">
                                </div>
                            </th>  --}}
                            <th class="h6 text-gray-300">N°</th>
                            <th class="h6 text-gray-300">Question</th>
                            <th class="h6 text-gray-300">Résultats</th>
    
                            <th class="h6 text-gray-300">Correction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userResults as $key => $value)
                        <tr>
                            {{--  <td class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox">
                                </div>
                            </td>  --}}
    
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{$key + 1}}</span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{$value->question->title}}</span>
                            </td>
    
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">
    
                                    {{$value->answer->title}}
                                </span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">
    
                                    {{$value->answer->is_correct==1 ? "Vrai": "Faux"}}
                                </span>
                            </td>
    
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
           
        </div>
        
    </div>
</div>
<!-- End teacher Details -->

@endsection
