@extends('layouts.base')
@section('title','Détails cours')

@section('content')
@include ('partial.navbar')

{{--  <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"> Détails Cours</h1>
                    <p>Détails sur la formation</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="index.html">Accueil</a></li>
                    <li> Détails cours</li>
                </ul>
            </div>
        </div>
    </div>
</div>  --}}


<!-- Course Details Section Start -->
<div class="course-details section">
    <div class="container">
        <div class="row">
            <!-- Course Details Wrapper Start -->

            <div class="col-lg-12 col-12">
                @if(!$quiz->isEmpty())
                <a href="{{url('quiz/'.$formationId)}}" class="btn btn-primary float-end me-2 ml-3 mb-4">Faire un Quiz</a>
                @endif

                

                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    @foreach($chapitre as $index => $chapter)

                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index == 0 ? 'active' : '' }}"
                            id="chapter-{{ $chapter->id }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#chapter-{{ $chapter->id }}"
                            type="button"
                            role="tab"
                            aria-controls="chapter-{{ $chapter->id }}"
                            aria-selected="{{ $index == 0 ? 'true' : 'false' }}"
                            data-id="{{ $chapter->id }}"
                            data-title="{{ $chapter->titre }}">
                        {{ $chapter->titre }}
                        @foreach($quizz as $valur)
                        @php
                            $quizze = $valur->where('chapitre_id', $chapter->id)->first();
                        @endphp

                    @endforeach
                    </button>
                            {{--  <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="chapter-{{ $chapter->id }}-tab" data-bs-toggle="tab"
                                data-bs-target="#chapter-{{ $chapter->id }}" type="button" role="tab" aria-controls="chapter-{{ $chapter->id }}"
                                aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $chapter->titre }}</button>  --}}
                        </li>


                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
            @foreach($chapitre as $index => $chapter)



                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="chapter-{{ $chapter->id }}" role="tabpanel"
                            aria-labelledby="chapter-{{ $chapter->id }}-tab">
                            <div class="course-content">
                                <h3 class="title">Titre de la formation: {{ $chapter->formation->titre }}</h3>
                                <br>

                                <div class="course-overview">
                                    {{-- <h3 class="title"> {{ $chapter->titre }}</h3> --}}

                                    <div class="overview-course-video">
                                        <iframe title="{{ $chapter->formation->titre }}"
                                            src="/assets/uploads/chapitre_video/{{$chapter->video_url}}"></iframe>
                                    </div>

                                    <p>
                                        {!! $chapter->description !!}
                                    </p>
                                   

                                    <p><a target="bank" href="/assets/uploads/chapitre_documents/{{$chapter->document_url}}">lien du document</a>
                                    </p>

                                  <div class="col-4">
                                    <form  id="feedback-{{ $chapter->id }}" action="{{ url('commentaires') }}" method="post" enctype="multipart/form-data">
                                        @csrf


                                        <div class="mb-3">

                                            <textarea class="form-control" id="feedback-{{ $chapter->id }}" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Laissez votre commentaire ici..." ></textarea>
                                          </div>
                                        <div class="mb-3">

                                            <input type="hidden" id="feedback-{{ $chapter->id }}"  class="form-control" name="chapitre_id" value="{{$chapter->id}}" id="exampleInputEmail1" aria-describedby="emailHelp">

                                          </div>



                                <div class="float-end">

                                    <button type="submit" class="btn btn-success">Envoyer</button>
                                </div>
                            </form>
                                  </div>


                                    <!-- Button trigger modal -->
                              {{--  @if(Auth::check())
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $chapter->id }}">
                                Faire un commentaire
                                </button>
                              @endif  --}}

                                <!-- Modal -->
                             <div class="modal fade" id="exampleModal-{{ $chapter->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Faire un commentaire sur ce chapitre</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('commentaires') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Titre du chapitre</label>
                                                <input type="text" class="form-control" value="{{$chapter->titre}}" id="" disabled>

                                              </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Commentaire</label>
                                                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                                              </div>
                                            <div class="mb-3">

                                                <input type="hidden" class="form-control" name="chapitre_id" value="{{$chapter->id}}" id="exampleInputEmail1" aria-describedby="emailHelp">

                                              </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Envoyer</button>
                                    </div>
                                </form>
                                    </div>
                                </div>
                                </div>

                                </div>
                            </div>


                                <br>
                                <br>
                                <br>
                                <br>
                            <h5>Les commentaires :</h5>
                            @php
                                $comments = $commentaire->where('chapitre_id', $chapter->id);
                            @endphp

                            @foreach($comments as $comment)
                                <p style="font-size: 20px;">
                                    {{ $comment->content }} :  {{ $comment->user->name }} {{ $comment->user->prenom }}
                                </p>
                            @endforeach
                            {{--  <a href="{{url('question/'.$chapter->id)}}" class="btn btn-primary text-center me-2 ml-3 mb-4">Faire un Quiz</a>  --}}
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('question/'.$chapter->id) }}" class="btn btn-primary me-2 ml-3 mb-4">Aller au Quiz du chapitre</a>
                            </div>

                        </div>



                  {{--  @foreach($quizz as $valur)

                  @php
                  $quizze = $valur->where('chapitre_id', $chapter->id)->first();
              @endphp

                  <div class="col mb-6">

                      <form action="{{ url('user-results') }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <!-- Texte principal -->
                    @foreach( $quizze->questions as $valus)

                    <div  style="margin-left: 3rem; margin-right: 6rem; margin-bottom: 1rem  " >
                      <a href="" class="text-decoration-none hover text-dark">
                        <h1 class="h3 font-monospace">{{$valus->title}}</h1>
                      </a>

                          @php
                                  $reponses = $repose->where('question_id', $valus->id);
                              @endphp
                      @foreach($reponses as $reponse)


                      <div class="form-check">

                          <input class="form-check-input" type="radio" name="reponse_{{ $valus->id }}" value="{{ $reponse->id }}" id="reponse_{{ $reponse->id }}"  style="transform: scale(1.5); margin-right: 10px;">
                          <label class="form-check-label fs-5 " for="reponse_{{ $reponse->id }}">
                              {{ $reponse->title }}
                          </label>
                      </div>
                      @endforeach


                    </div>
                    @endforeach

                    <!-- Informations supplémentaires -->




              </div>
              <button type="submit" class="btn btn-success">Envoyer</button>
              </form>
              </div>

                  @endforeach  --}}


    {{--  @if ($quizze)
        <div class="col mb-6">
            <br>
                            <br>
                        <h5 class="text-center">Quiz :</h5>
                        <br>
                        <br>
            <form action="{{ url('user-results') }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach($quizze->questions as $valus)
                    <div style="margin-left: 3rem; margin-right: 6rem; margin-bottom: 1rem">
                        <a href="" class="text-decoration-none hover text-dark">
                            <h1 class="h3 font-monospace">{{ $valus->title }}</h1>
                        </a>

                        @php
                            $reponses = $repose->where('question_id', $valus->id);
                        @endphp

                        @foreach($reponses as $reponse)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="reponse_{{ $valus->id }}" value="{{ $reponse->id }}" id="reponse_{{ $reponse->id }}" style="transform: scale(1.5); margin-right: 10px;">
                                <label class="form-check-label fs-5" for="reponse_{{ $reponse->id }}">
                                    {{ $reponse->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="btn btn-success">Envoyer</button>
            </form>
        </div>
    @endif  --}}
@endforeach


            </div>

            <!-- End Course Sidebar -->
        </div>
    </div>
</div>
<!-- Course Details Section End -->

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Écouter l'événement de clic sur les boutons
        $('.nav-link').on('click', function() {
            var chapterId = $(this).data('id');
            var chapterTitle = 100; // Récupérer le titre du chapitre


            // Requête AJAX pour envoyer les données au serveur
            $.ajax({
                url: '/suivis',           // URL de la route Laravel
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // Inclure le token CSRF
                    chapitreId: chapterId,                 // ID du chapitre
                    taux: chapterTitle            // Titre du chapitre
                },
                success: function(response) {

                    swal("",response.status,"success")
                },
                error: function(xhr, status, error) {
                    // Gestion des erreurs
                   // alert('Erreur lors de l\'enregistrement de la progression.');
                    swal("","Erreur lors de l'enregistrement de la progression.","error")
                }
            });
        });
    });
</script>
