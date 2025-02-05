@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')


<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
<ul class="flex-align gap-4">
<li><a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
<li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
<li><span class="text-main-600 fw-normal text-15">Créer une Réponse</span></li>
</ul>
</div>
<!-- Breadcrumb End -->

        <!-- Buttons Start -->
<div class="flex-align justify-content-end gap-8">
{{--  <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Save as Draft</button>
<button type="button" class="btn btn-main rounded-pill py-9" disabled>Publish Course</button>  --}}
</div>
<!-- Buttons End -->
    </div>

        <!-- Create Course Step List Start -->
{{--  <ul class="step-list mb-24">
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  active">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Course Details
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Upload Videos
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    About Course
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Create Quiz
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Publish Course
    <span class="line position-relative"></span>
</li>
</ul>  --}}
<!-- Create Course Step List End -->

    <!-- Course Tab Start -->
    <div class="card">
        <div class="card-header border-bottom border-gray-100 flex-align gap-8">
            <h5 class="mb-0">Réponse</h5>        
            <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Réponse">
                <i class="ph-fill ph-question"></i>
            </button>
        </div>
        <div class="card-body">
            <form action="{{ url('answers') }}" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="row gy-20">
                    {{--  <div class="col-xxl-3 col-md-4 col-sm-5">
                        <div class="mb-20">
                            <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span class="text-13 text-gray-400 fw-medium">(Required)</span> </label>
                        </div>
                        <div id="fileUpload" class="fileUpload image-upload"></div>
                    </div>  --}}
                    <div class="col-xxl-12 col-md-12 col-sm-7">
                        <div class="row g-20 mb-6">
                            <div class="col-sm-6">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Réponse <span class="text-13 text-gray-400 fw-medium">(Requis)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="title" maxlength="200" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        <span id="current">3</span>
                                        <span id="maximum">/ 200</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Question <span class="text-13 text-gray-400 fw-medium">(Requis)</span></label>
                                <div class="position-relative">
                                    <select id="courseCategory" name="question_id" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" selected>Aucune</option>
                                       @foreach($quiz as $value)
                                       <option value="{{$value->id}}">{{$value->title}} </option>    
                                       @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Répondre par vrai ou faux <span class="text-13 text-gray-400 fw-medium">(Requis)</span></label>
                                <div class="position-relative">
                                    <select id="courseCategory" name="is_correct" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" selected>Aucune</option>
                                      
                                       <option value="1">Vrai </option>    
                                       <option value="0">Faux </option>    
                                    
                                        
                                    </select>                                            
                                </div>
                            </div>
                           
                        
                        
                    </div>
                    <div class="flex-align justify-content-end gap-8">
                        <a href="{{url('create-question')}}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Course Tab End -->
</div>
@endsection