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
<div class="teacher-details-area section" >
    <div class="container" id="resultats">
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
                        @php
                            // Grouper les résultats par quiz_id
                            $quizzes = $userResults->groupBy('quiz_id');
                        @endphp
                    
                        @foreach($quizzes as $quizId => $results) {{-- Parcourir chaque quiz --}}
                            @php
                                $quizName = $results->first()->question->quiz->name; // Obtenir le nom du quiz
                                $recentQuestions = $results
                                    ->groupBy('question_id') // Grouper les réponses par question_id
                                    ->map(function ($group) {
                                        return $group->sortByDesc('created_at')->first(); // Garder uniquement la réponse la plus récente
                                    });
                                $totalQuestions = $recentQuestions->count(); // Total de questions uniques pour ce quiz
                                $correctAnswers = $recentQuestions->filter(function ($result) {
                                    return $result->answer->is_correct; // Compter les réponses correctes
                                })->count();
                            @endphp
                    
                            {{-- Afficher le nom du quiz --}}
                            <tr>
                                <td colspan="4" class="h5 text-center fw-bold text-gray-300" >
                                    {{ $quizName }}
                                </td>
                            </tr>
                    
                            {{-- Parcourir les questions récentes --}}
                            @foreach($recentQuestions as $index => $value)
                                <tr>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $value->question->title }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $value->answer->title }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">
                                            {{ $value->answer->is_correct == 1 ? "Vrai" : "Faux" }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                    
                            {{-- Ajouter le total pour ce quiz --}}
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Total :</td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">
                                        {{ $correctAnswers }}/{{ $totalQuestions }}
                                        ({{ $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0 }}%)
                                    </span>
                                </td>
                            </tr>
                    
                            {{-- Ajouter une ligne vide pour séparer les quiz --}}
                            <tr><td colspan="4" style="height: 10px;"></td></tr>
                        @endforeach
                    </tbody>
                    
                    
                    
                    
                    
                    
                </table>

            </div>
           
        </div>
        
    </div>
</div>
<!-- End teacher Details -->

@endsection