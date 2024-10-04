@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')

<div class="dashboard-body">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb mb-24">
 <ul class="flex-align gap-4">
<li><a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
<li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
<li><span class="text-main-600 fw-normal text-15"> Détails cours</span></li>
</ul>
</div>
<!-- Breadcrumb End -->

    <div class="row gy-4">
        <div class="col-md-8">
            <div class="rounded-16 overflow-hidden position-relative">
                <span class="live-badge text-white bg-danger-600 rounded-8 text-15 px-32 py-10 position-absolute inset-block-start-0 inset-inline-start-0 z-1 ms-24 mt-24">Live</span>
                <video id="player" class="player" playsinline controls data-poster="admin/assets/images/thumbs/live-class.png">
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4">
                    <source src="https://html.themeholy.com/path/to/video.webm" type="video/webm">
                </video>
            </div>
            <!-- Course Card Start -->
            <div class="card mt-24">
                <div class="card-body">
                    <div class="pb-24 flex-between gap-4 flex-wrap">
                        <h5 class="mb-12 fw-bold">Questions (85)</h5>
                        <a href="#" class="btn btn-outline-gray text-gray-500 text-13 py-8 px-8 rounded-4">voir plus</a>
                    </div>

                    <ul class="comment-list">
                        <li>
                            <div class="d-flex align-items-start gap-8 flex-xs-row flex-column">
                                <img src="admin/assets/images/thumbs/mentor-img1.png" alt="" class="w-48 h-48 rounded-circle object-fit-cover flex-shrink-0">
                                <div class="">
                                    <div class="flex-align flex-wrap gap-8">
                                        <h6 class="text-15 fw-bold mb-0">Amir Hamja </h6>
                                        <span class="py-0 px-8 bg-main-50 text-main-600 rounded-4 text-15 fw-medium h5 mb-0 fw-bold">You</span>
                                        <span class="text-gray-300 text-13">8:00PM   </span>
                                    </div>
                                    <p class="text-15 text-gray-600 mt-8">Fringilla justo mauris cursus arcu sit urna. Nullam eu non bibendum quam mi dolor nisi orci?</p>
                                </div>
                            </div>
                            <ul class="sub-comment-list mt-24">
                                <li>
                                    <div class="d-flex align-items-start gap-8 flex-xs-row flex-column">
                                        <img src="admin/assets/images/thumbs/mentor-img2.png" alt="" class="w-48 h-48 rounded-circle object-fit-cover flex-shrink-0">
                                        <div class="">
                                            <div class="flex-align flex-wrap gap-8">
                                                <h6 class="text-15 fw-bold mb-0">Selina Eyvi</h6>
                                                <span class="py-0 px-8 bg-main-50 text-main-600 rounded-4 text-15 fw-medium h5 mb-0 fw-bold">Mentor</span>
                                                <span class="text-gray-300 text-13">8:10PM</span>
                                            </div>
                                            <p class="text-15 text-gray-600 mt-8">Justo gravida eget id massa volutpat. Volutpat vehicula tortor fusce sed pellentesque id sagittis eu commodo. Ut ultrices neque faucibus morbi rhoncus. Volutpat vehicula tortor fusce sed pellentesque id sagittis eu commodo</p>
                                        </div>
                                    </div>  
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <form action="#" class="position-relative mt-44">
                        <input type="text" class="form-control bg-main-50 border-0 py-18 pe-54" placeholder="Drop your questions here...">
                        <button type="submit" class="w-40 h-40 flex-center rounded-8 bg-white text-main-600 hover-bg-main-600 hover-text-white transition-1 position-absolute inset-inline-end-0 top-50 translate-middle-y me-8">
                            <i class="ph ph-paper-plane-tilt"></i>
                        </button>
                    </form>
                    
                   
                </div>
            </div>
            <!-- Course Card End -->
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="flex-between flex-wrap mb-12">
                        <h5 class="mb-0 fw-bold">Your Lesson</h5>
                        <span class="text-13">3/35</span>
                    </div>
                    <div class="flex-align gap-8 mb-12">
                        <span class="text-main-600 flex-shrink-0 text-13 fw-medium">32%</span>
                        <div class="progress w-100  bg-main-100 rounded-pill h-4" role="progressbar" aria-label="Basic example" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 32%"></div>
                        </div>
                    </div>
                    <ul class="lesson-list">
                        <li class="lesson-list__item d-flex align-items-start gap-16 active">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Intro
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Last access: 12Jan 24. 8:00PM</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16 active">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    What is Digital Marketing?
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Last access: 12Jan 24. 8:00PM</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Digital Marketing Fundamental
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Locked</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Digital Marketing Fundamental
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Locked</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Digital Marketing Fundamental
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Locked</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Digital Marketing Fundamental
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Locked</span>
                                </a>
                            </div>
                        </li>
                        <li class="lesson-list__item d-flex align-items-start gap-16">
                            <span class="circle w-16 h-16 flex-center rounded-circle text-main-100 text-13 flex-shrink-0">
                                <i class="ph-fill ph-check-circle"></i>
                            </span>
                            <div>
                                <a href="#" class="text-13 text-heading d-block text-gray-600 fw-medium hover-text-main-600">
                                    Digital Marketing Fundamental
                                    <span class="text-13 text-heading d-block text-gray-600 fw-medium">Locked</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    const player = new Plyr('#player');
    const featuredPlayer = new Plyr('#featuredPlayer');
</script>