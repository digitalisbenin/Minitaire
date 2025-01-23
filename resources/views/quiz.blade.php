@extends('layouts.base')
@section('title', 'Quizz')

@section('content')
    @include ('partial.navbar')
    
    <div class=" h-screen">
        <div class="mt-5 " style="margin-left: 6rem; margin-right: 6rem;">

            <div class="d-flex mx-5">
               
                <div class="ms-auto mt-3">

                </div>
            </div>

            @foreach ($quiz as $value)
                <div class="row">
                    <div class="col-12 ">
                        <div class="section-title">
                            {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $value->title }}</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">{{ $value->formation->titre }}</p>
                        </div>
                    </div>
                </div>



                <div class="col mb-6">

                    <form action="{{ url('user-results') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $value->id }}">
                        @php
                            $quizID = $value->id;
                        @endphp
                        <!-- Texte principal -->
                        @foreach ($value->questions as $valus)
                            <div style="margin-left: 3rem; margin-right: 6rem; margin-bottom: 1rem  ">
                                <a href="" class="text-decoration-none hover text-dark">
                                    <h1 class="h3 font-monospace">{{ $valus->title }}</h1>
                                </a>

                                @php
                                    $reponses = $repose->where('question_id', $valus->id);
                                @endphp
                                @foreach ($reponses as $reponse)
                                  

                                    <div class="form-check">
                                        <!-- Utiliser un nom unique basé sur l'ID de la question -->
                                        <input class="form-check-input" type="radio" name="reponse_{{ $valus->id }}"
                                            value="{{ $reponse->id }}" id="reponse_{{ $reponse->id }}"
                                            style="transform: scale(1.5); margin-right: 10px;" required>
                                        <label class="form-check-label fs-5 " for="reponse_{{ $reponse->id }}">
                                            {{ $reponse->title }}
                                        </label>
                                    </div>
                                @endforeach


                            </div>
                        @endforeach

                       


                </div>




                @if (auth()->check())
                @php
                    // Filtrer les Notequiz pour l'utilisateur connecté et le quiz actuellement affiché
                    $filteredNotequiz = $notequiz->where('quiz_id', $value->id);
            
                    // Vérifier si un des statuts est égal à "valider"
                    $hasValidatedStatus = $filteredNotequiz->contains('status', 'valider');
                @endphp
            
                @if (!$hasValidatedStatus)
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                @endif
            @endif
            




            
                </form>
                <div class="ms-auto d-flex">
                    <!-- Section image et auteur -->
                    {{--  <div class="d-flex ms-auto me-4"> <!-- Ajout de me-4 pour la marge à droite -->
        <div class="me-13" style="text-align: right;">
            <h5>Réponses :</h5>
              @php
                $reponses = $repose->where('discution_id', $value->id);
            @endphp

            @foreach ($reponses as $reponse)
                <p style="font-size: 20px;">
                    {{ $reponse->titre }} :  {{ $reponse->user->name }} {{ $reponse->user->prenom }}
                </p>
            @endforeach
        </div>
    </div>  --}}
                </div>

        </div>
        @endforeach

        <div style="height: 20px;"></div>

    </div>
    </div>




@endsection
