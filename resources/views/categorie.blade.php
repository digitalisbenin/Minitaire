@extends('layouts.base')
@section('title','Formations')

@section('content')
@include ('partial.navbar')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"> Formations </h1>
                    <p>Formations par catégorie et niveau de difficultés</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Formations</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Start Courses Area -->
<section class="courses style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="section-title">
                    {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Formations</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>
        <div class="single-head">
            {{--  <div class="mb-3">
                <label>Filtrer par difficulté :</label>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/categorie/'.$id) }}">Toutes les difficultés</a></li>
                    @foreach($difficultes as $difficulte)
                        <li>
                            <a href="{{ url('/categorie/'.$id.'?difficulte_id='.$difficulte->id) }}">
                                {{ $difficulte->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>  --}}
            <div class="mb-3">
               
                <ul class="list-unstyled d-flex flex-wrap gap-2">
                    <label style="font-size: 18px;" >Filtrer par difficulté :</label>
                    <li><a href="{{ url('/categorie/'.$id) }}" class="btn btn-primary">Toutes les difficultés</a></li>
                    @foreach($difficultes as $difficulte)
                        <li>
                            <a href="{{ url('/categorie/'.$id.'?difficulte_id='.$difficulte->id) }}" 
                               class="btn btn-outline-primary">
                                {{ $difficulte->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            
            
            
            <div class="row">
               @foreach($formation->sortByDesc('created_at') as $value)
               <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Course -->
                <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                    <div class="course-image" style="height: 200px">
                        <a href="{{url('details-cours/'.$value->id)}}"><img src="{{ asset('assets/uploads/formation_images/'.$value->image_url) }}"
                                alt="#" style="height: 200px; width: 350px;">
                            </a>
                            {{--  <p class="price">Categorie</p>     --}}
                    </div>
                    <div class="content">
                        <p class="date">{{$value->category->name}} </p>

                        <p class="date"> {{$value->difficulete->name}}</p>
                        <h5> {{$value->titre}}</h5>
                        <br>
                        <a href="{{url('details-cours/'.$value->id)}}"></a>
                        <p style="
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        text-align: justify;
                    ">
                        {{$value->description}}
                    </p>
                            <br>
                        <div>
                            <button class="btn btn-success ajouter-formation" data-id="{{ $value->id }}">Ajouter</button>
                        </div>
                    </div>
                </div>
                <!-- End Single Course -->
            </div>
               @endforeach
                
            </div>
            
        </div>
    </div>
</section>
@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.ajouter-formation').on('click', function() {
            var formationId = $(this).data('id'); // Récupérer l'ID de la formation


            $.ajax({
                url: '/mes-cours',  // URL de la route Laravel pour ajouter la formation
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token pour la sécurité
                    formation_id: formationId     // ID de la formation à envoyer au serveur
                },
                success: function(response) {
                    swal("",response.status,"success")
                },
                error: function(xhr, status, error) {
                    swal("","Erreur lors de l'enregistrement de ce cours.","error")
                }
            });
        });
    });
</script>

<script>
    document.getElementById('filter-difficulty').addEventListener('change', function() {
        let difficulteId = this.value;
        let url = new URL(window.location.href);
        
        if (difficulteId) {
            url.searchParams.set('difficulte_id', difficulteId);
        } else {
            url.searchParams.delete('difficulte_id');
        }

        window.location.href = url.toString(); // Recharge la page avec le filtre
    });
</script>
