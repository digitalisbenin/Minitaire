@extends('layouts.base')
@section('title','Quizz')

@section('content')
@include ('partial.navbar')
{{--  <section class="hero-area">
    <div class="hero-slider">
        <!-- Single Slider -->
        <div class="hero-inner overlay" style="background-image: url('assets/images/hero/slider1.jpg');">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                        <div class="home-slider">
                            <div class="hero-text">
                                {{--  <h5 class="wow fadeInUp" data-wow-delay=".3s">Start to Learning Today</h5>  --}}
                                {{--  <h1 class="wow fadeInUp" data-wow-delay=".5s">Bienvenue sur la platforme <br> de formation des militaires</h1>
                                <p class="wow fadeInUp" data-wow-delay=".7s"> <br> .</p>
                                <div class="button wow fadeInUp" data-wow-delay=".9s">  --}}
                                    {{--  <a href="about-us.html" class="btn">Learn More</a>
                                    <a href="courses-grid.html" class="btn alt-btn">Our Courses</a>  --}}
                                {{--  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/ End Single Slider -->
    </div>
</section>    --}}

{{--  <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"> Quizz</h1>
                    <p>Quiz selon la formation</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Quiz</li>
                </ul>
            </div>
        </div>
    </div>
</div>  --}}
<div class=" h-screen">
    <div class="mt-5 " style="margin-left: 6rem; margin-right: 6rem;">

        <div class="d-flex mx-5">
            <!-- Bouton Posez votre question -->
            {{--  <div class="d-flex bg-primary text-white rounded-pill py-2 px-3 mt-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi bi-question-circle-fill" style="width: 24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
              </svg>
              <p class="ms-2 mt-2">Posez votre question</p>
            </div>  --}}



            <!-- Champ de recherche -->
            <div class="ms-auto mt-3">

            </div>
          </div>
          @foreach($quiz as $value)
          <div class="row">
            <div class="col-12 ">
                <div class="section-title">
                    {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{$value->title}}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">{{$value->formation->titre}}</p>
                </div>
            </div>
        </div>


      {{-- <div
        class="flex ml-32 mr-32 mt-9  rounded-lg text-black px-4 py-2"
      >
        <p class="font-sans">Résultats 1 - 50 sur un total d'environ 1090</p>
        <p class="ml-auto font-sans">Résolues | Fréquentes|</p>
      </div> --}}

    <div class="col mb-6">

        <form action="{{ url('user-results') }}" method="post" enctype="multipart/form-data">
        @csrf
      <!-- Texte principal -->
      @foreach( $value->questions as $valus)

      <div  style="margin-left: 3rem; margin-right: 6rem; margin-bottom: 1rem  " >
        <a href="" class="text-decoration-none hover text-dark">
          <h1 class="h3 font-monospace">{{$valus->title}}</h1>
        </a>

            @php
                    $reponses = $repose->where('question_id', $valus->id);
                @endphp
        @foreach($reponses as $reponse)
        {{--  <p class="text-left " style="font-size: 20px;" >{{$reponse->title}} </p>
          <p class="text-left">, {{$reponses->is_correct}} </p>   --}}

          {{--  <div class="form-check">
            <input class="form-check-input" type="radio" name="reponse" value="{{ $reponse->id }}" id="reponse_{{ $reponse->id }}">
            <label class="form-check-label" for="reponse_{{ $reponse->id }}">
                {{ $reponse->title }}
            </label>
        </div>  --}}

        <div class="form-check">
            <!-- Utiliser un nom unique basé sur l'ID de la question -->
            <input class="form-check-input" type="radio" name="reponse_{{ $valus->id }}" value="{{ $reponse->id }}" id="reponse_{{ $reponse->id }}"  style="transform: scale(1.5); margin-right: 10px;">
            <label class="form-check-label fs-5 " for="reponse_{{ $reponse->id }}">
                {{ $reponse->title }}
            </label>
        </div>
        @endforeach


      </div>
      @endforeach

      <!-- Informations supplémentaires -->
      {{--  <div class="ms-auto d-flex ">
        <!-- Section réponses et vues -->


        <!-- Section image et auteur -->
        <div class="d-flex">
          <div class="me-13">
            <h5 class="text-right">Réponses :</h5>
            @php
            $reponses = $repose->where('discution_id', $value->id);
        @endphp

        @foreach($reponses as $reponse)

            <p class="text-left"   ">  {{ $reponse->titre }} :  {{ $reponse->user->name }} {{ $reponse->user->prenom }} </p>
        @endforeach

          </div>
          <div class="ms-auto d-flex">

            <div class="me-4">



            </div>
        </div>
        </div>
      </div>  --}}
      {{--  <div class="ms-auto d-flex">
        <!-- Section image et auteur -->
        <div class="d-flex" style="margin-left: auto;">
            <div class="me-13" style="text-align: right;">
                <h5>Réponses :</h5>
                @php
                    $reponses = $repose->where('discution_id', $value->id);
                @endphp

                @foreach($reponses as $reponse)
                    <p style="font-size: 20px;">
                        {{ $reponse->titre }} :  {{ $reponse->user->name }} {{ $reponse->user->prenom }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>  --}}



</div>
<button type="submit" class="btn btn-success">Envoyer</button>
</form>
    <div class="ms-auto d-flex">
    <!-- Section image et auteur -->
    {{--  <div class="d-flex ms-auto me-4"> <!-- Ajout de me-4 pour la marge à droite -->
        <div class="me-13" style="text-align: right;">
            <h5>Réponses :</h5>
              @php
                $reponses = $repose->where('discution_id', $value->id);
            @endphp

            @foreach($reponses as $reponse)
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
