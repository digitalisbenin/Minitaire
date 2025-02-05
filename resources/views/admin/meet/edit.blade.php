@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')


<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
<ul class="flex-align gap-4">
<li><a href="{{url('dashboard')}}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
<li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
<li><span class="text-main-600 fw-normal text-15">Modifier une visio conférence</span></li>
</ul>
</div>
<!-- Breadcrumb End -->

        <!-- Buttons Start -->
<div class="flex-align justify-content-end gap-8">

</div>
<!-- Buttons End -->
    </div>

 
<!-- Create Course Step List End -->

    <!-- Course Tab Start -->
    <div class="card">
        <div class="card-header border-bottom border-gray-100 flex-align gap-8">
            <h5 class="mb-0">visio conférences</h5>        
            <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Visio conférences">
                <i class="ph-fill ph-question"></i>
            </button>
        </div>
        <div class="card-body">
            <form action="{{ url('visio-conferences/' . $conference->id.'/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                <div class="row gy-20">
                  
                    <div class="col-xxl-12 col-md-12 col-sm-7">
                        <div class="row g-20 mb-6">
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Titre<span class="text-13 text-gray-400 fw-medium">(Requis)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="titre" value="{{ old('tire', $conference->titre) }}"  maxlength="200" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        <span id="current">3</span>
                                        <span id="maximum">/ 200</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Date <span class="text-13 text-gray-400 fw-medium"></span> </label>
                                <div class="position-relative">
                                    <input type="datetime-local" class="text-counte placeholder-13 form-control py-11 pe-76" name="date"value="{{ old('date', $conference->date) }}"  maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                      
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Lien du meer <span class="text-13 text-gray-400 fw-medium"></span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="lien_meet"value="{{ old('lien_meet', $conference->lien_meet) }}"  maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                      
                                    </div>
                                </div>
                            </div>
                        
                        
                    </div>
                    <div class="flex-align justify-content-end gap-8">
                        <a href="{{url('create-visio-conferences')}}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Mettre à jour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Course Tab End -->
</div>
@endsection