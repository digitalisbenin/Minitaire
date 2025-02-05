@extends('layouts.base')
@section('title','R2ponse quiz')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay" >
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Recapulative</h1>
                    <p>Voir mes Recapulative</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Recapulative</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Teacher Details -->
<div class="teacher-details-area section" id="resultats">
    <div class="container" >
          <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    {{--  <span>Documents</span>  --}}
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Recapulative</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>  
        <div class="col">
          
            <div class="col-lg-12 col-md-6 col-12"> <!-- Ajustement pour les tailles moyennes et petites -->
                
                <table id="studentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="h6 text-gray-300">Quiz</th>
                            <th class="h6 text-gray-300">Formation / Chapitre</th>
                            <th class="h6 text-gray-300">Note</th>
                            <th class="h6 text-gray-300">Appréciation</th>
                            <th class="h6 text-gray-300">Certificat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notequiz as $value)
                            @php
                                $quiz = $value->quiz; // Récupérer le quiz associé
                                $formation = $quiz->formation; // Formation via formation_id dans quiz
                                $chapitre = $quiz->chapitre; // Chapitre via chapitre_id dans quiz
                                $note = $value->note ?? 'Non noté'; // Note
                                $isSuccess = is_numeric($note) && $note >= 60; // Vérification succès
                                $appreciation = $isSuccess ? 'Succès' : 'Échec'; // Appréciation
                                $appreciationClass = $isSuccess ? 'bg-success text-white' : 'bg-danger text-white'; // Classe CSS dynamique
                            @endphp
                            <tr>
                                <!-- Affichage du titre du quiz -->
                                <td class="{{ $appreciationClass }}">
                                    <span class="h6 mb-0 fw-medium text-gray-300">
                                        {{ $quiz->title ?? 'Titre du quiz non disponible' }}
                                    </span>
                                </td>
                                <!-- Affichage de la formation ou du chapitre -->
                                <td class="{{ $appreciationClass }}">
                                    <span class="h6 mb-0 fw-medium text-gray-300">
                                        @if($formation)
                                            {{ $formation->titre }}
                                        @elseif($chapitre)
                                            {{ $chapitre->formation->titre ?? 'Formation non disponible' }} / {{ $chapitre->titre }}
                                        @else
                                            Aucune information disponible
                                        @endif
                                    </span>
                                </td>
                                <!-- Affichage de la note -->
                                <td class="{{ $appreciationClass }}">
                                    <span class="h6 mb-0 fw-medium text-gray-300">
                                        {{ $note }}
                                    </span>
                                </td>
                                <!-- Affichage de l'appréciation avec style dynamique -->
                                <td class="{{ $appreciationClass }}">
                                    <span class="h6 mb-0 fw-medium">
                                        {{ $appreciation }}
                                    </span>
                                </td>
                                  <td class="{{ $appreciationClass }}">
                                            <span class="h6 mb-0 fw-medium">
                                               @if( $isSuccess)
                                               @if($formation)
                                                <a href="{{ route('certificate.download', $formation->id) }}" class="btn btn-primary">Télécharger le certificat</a>
                                                @endif
                                               @endif

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