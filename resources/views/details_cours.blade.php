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
                
                <a href="{{url('quiz/'.$formationId)}}" class="btn btn-primary float-end me-2 ml-3 mb-4">Faire un Quiz</a>
            
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
                                    <h3 class="title"> {{ $chapter->titre }}</h3>

                                    <div class="overview-course-video">
                                        <iframe title="{{ $chapter->formation->titre }}"
                                            src="/assets/uploads/chapitre_video/{{$chapter->video_url}}"></iframe>
                                    </div>

                                    <p>
                                        {{ $chapter->description }}
                                    </p>

                                    <p><a target="bank" href="/assets/uploads/chapitre_documents/{{$chapter->document_url}}">lien du document</a>
                                    </p>

                                    <!-- Button trigger modal -->
                              @if(Auth::check())
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $chapter->id }}">
                                Faire un commentaire
                                </button>
                              @endif

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
                           
                        </div>
                    @endforeach

                  
                </div>
            </div>

            {{--  <div class="col-lg-12 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                            aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                            data-bs-target="#curriculum" type="button" role="tab" aria-controls="curriculum"
                            aria-selected="false">Curriculum</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="instructor-tab" data-bs-toggle="tab"
                            data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor"
                            aria-selected="false">Instructor</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                        aria-labelledby="overview-tab">
                        <div class="course-overview">
                            <h3 class="title">About This Course</h3>

                            <p>The goal of this course is to take you, you beautiful front end developer you,
                                from someone with very little or no jQuery or JavaScript knowledge and up you to
                                someone who is quite comfortable working with and writing jQuery and JavaScript.
                            </p>

                            <p>There are other courses out there, this one is mine. We’ll make mistakes along
                                the way. We’ll fix them. We’ll talk about theory. We’ll build practical, real
                                things.</p>

                            <div class="overview-course-video">
                                <iframe title="jQuery Tutorial #1 - jQuery Tutorial for Beginners"
                                    src="https://www.youtube.com/embed/hMxGhHNOkCU?feature=oembed"></iframe>
                            </div>

                            <p>jQuery is monstrous in its popularity and ubiquity on the web. It doesn’t do
                                everything
                            </p>

                            <p>It is great at all the “DOM” stuff – selecting and manipulating elements on the
                                page..</p>

                            <p>We’ll talk about all that in more in this course.</p>
                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="#0" class="btn">Buy this course</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span>Share this course:</span></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                        <div class="course-curriculum">
                            <ul class="curriculum-sections">
                                <li class="single-curriculum-section">
                                    <div class="section-header">
                                        <div class="section-left">

                                            <h5 class="title">jQuery Effects</h5>

                                        </div>
                                    </div>
                                    <ul class="section-content">

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">jQuery Effects: Hide and Show</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">30 min</span>
                                                    <span class="item-meta item-meta-icon video">
                                                        <i class="lni lni-video"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Live meeting about Infotech
                                                    Strategies</span>
                                                <div class="course-item-meta">
                                                    <i class="lni lni-lock"></i>
                                                    <span class="item-meta item-meta-icon zoom-meeting">
                                                        <i class="lni lni-users"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 1: Yes or No?</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">3 questions</span>
                                                    <span class="item-meta duration">15 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 2: A simple simulation game</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">0 question</span>
                                                    <span class="item-meta duration">50 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 02: A/B Testing</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">02 hour</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 3: Role-play game</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">1 question</span>
                                                    <span class="item-meta duration">01 hour</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 4: Short Interview</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">9 questions</span>
                                                    <span class="item-meta duration">10 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 03: Wrap up about A/B
                                                    testing</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">30 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 5: 15 mins of Yes/No
                                                    questions</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">3 questions</span>
                                                    <span class="item-meta duration">10 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Quiz 6: Quick answers</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">0 question</span>
                                                    <span class="item-meta duration">10 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="single-curriculum-section">
                                    <div class="section-header">
                                        <div class="section-left">

                                            <h5 class="title">Customer Advisory Board</h5>
                                            <p class="section-desc">Learn about the basics of Customer Advisory
                                                Board</p>

                                        </div>
                                    </div>
                                    <ul class="section-content">

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 04: Customer Advisory
                                                    Board</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">30 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 05: The role of Customer Advisory
                                                    Board</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">45 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 06: Customer Advisory Board
                                                    Institutions</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">3 questions</span>
                                                    <span class="item-meta duration">15 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Mid-term test : 60-min writing
                                                    test</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">5 question</span>
                                                    <span class="item-meta duration">01 hour</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="single-curriculum-section">
                                    <div class="section-header">
                                        <div class="section-left">

                                            <h5 class="title">Feedback survey</h5>
                                            <p class="section-desc">The major things about conducting a survey
                                                and manage feedback</p>

                                        </div>
                                    </div>
                                    <ul class="section-content">

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 07: The importance of customer
                                                    feedback</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">30 min</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 08: Customers’ roles</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">45 min</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                <span class="item-name">Lesson 09: How to conduct the
                                                    survey</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">01 hour</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="course-item">
                                            <a class="section-item-link" href="JavaScript:Void(0);">
                                                <span class="item-name">Discussion: How to write good survey and
                                                    poll questions?</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta count-questions">0 question</span>
                                                    <span class="item-meta duration">01 hour</span>
                                                    <span class="item-meta item-meta-icon">
                                                        <i class="lni lni-lock"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="#0" class="btn">Buy this course</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span>Share this course:</span></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                        <div class="course-instructor">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-image">
                                        <img src="assets/images/courses/instructor.jpg" alt="#">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="profile-info">
                                        <h5><a href="javascript:void(0)">Maggie Strickland</a></h5>
                                        <p class="author-career">/Advanced Educator</p>
                                        <p class="author-bio">Maggie is a brilliant educator, whose life was
                                            spent for computer science and love of nature. Being a female, she
                                            encountered a lot of obstacles and was forbidden to work in this
                                            field by her family. With a true spirit and talented gift, she was
                                            able to succeed and set an example for others.</p>


                                        <ul class="author-social-networks">
                                            <li class="item">
                                                <a href="JavaScript:Void(0);" target="_blank" class="social-link">
                                                    <i class="lni lni-facebook-original"></i> </a>
                                            </li>
                                            <li class="item">
                                                <a href="JavaScript:Void(0);" target="_blank" class="social-link">
                                                    <i class="lni lni-twitter-original"></i> </a>
                                            </li>
                                            <li class="item">
                                                <a href="JavaScript:Void(0);" target="_blank" class="social-link">
                                                    <i class="lni lni-instagram"></i> </a>
                                            </li>
                                            <li class="item">
                                                <a href="JavaScript:Void(0);" target="_blank" class="social-link">
                                                    <i class="lni lni-linkedin-original"></i> </a>
                                            </li>
                                            <li class="item">
                                                <a href="JavaScript:Void(0);" target="_blank" class="social-link">
                                                    <i class="lni lni-youtube"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="button">
                                        <a href="#0" class="btn">Buy this course</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul class="share">
                                        <li><span>Share this course:</span></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="course-reviews">
                            <div class="course-rating">
                                <div class="course-rating-content">
                                    <!-- Comments -->
                                    <div class="post-comments">
                                        <h3 class="comment-title">Reviews</h3>
                                        <ul class="comments-list">
                                            <li>
                                                <div class="comment-img">
                                                    <img src="assets/images/blog/comment1.png" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6 class="name"><a href="JavaScript:Void(0);">Rosalina Kelian</a></h6>
                                                        <ul class="rating-star">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                        </ul>
                                                        <p class="time">1 days ago</p>
                                                    </div>
                                                    <p>
                                                        Donec aliquam ex ut odio dictum, ut consequat leo interdum.
                                                        Aenean nunc
                                                        ipsum, blandit eu enim sed, facilisis convallis orci. Etiam
                                                        commodo
                                                        lectus
                                                        quis vulputate tincidunt. Mauris tristique velit eu magna
                                                        maximus
                                                        condimentum.
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment-img">
                                                    <img src="assets/images/blog/comment3.png" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6 class="name"><a href="JavaScript:Void(0);">Arista Williamson</a></h6>
                                                        <ul class="rating-star">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                        </ul>
                                                        <p class="time">5 days ago</p>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                        ad minim
                                                        veniam.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-form">
                                        <h3 class="comment-reply-title">Add a review</h3>
                                        <form action="#" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <div class="form-box form-group">
                                                        <input type="text" name="#"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Name" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-box form-group">
                                                        <input type="email" name="#"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Email" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-box form-group">
                                                        <textarea name="#" rows="6"
                                                            class="form-control form-control-custom"
                                                            placeholder="Your Comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="button">
                                                        <button type="submit" class="btn">Submit review<span class="dir-part"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  --}}
            <!-- End Course Details Wrapper -->
            <!-- Start Course Sidebar -->
            {{--  <div class="col-lg-4 col-12">
                <div class="course-sidebar">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Search</h3>
                        <div class="sidebar-widget-content">
                            <div class="sidebar-widget-search">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget other-course-wedget">
                        <h3 class="sidebar-widget-title">Recent Courses</h3>
                        <div class="sidebar-widget-content">
                            <ul class="sidebar-widget-course">
                                <li class="single-course">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)" class="image"><img
                                                src="assets/images/courses/recent-courses/course-1.jpg" alt="Course Image"></a>
                                    </div>
                                    <div class="info">
                                        <span class="price">$40<span>.00</span></span>
                                        <h6 class="title"><a href="course-details.html">Learning to
                                                Write as a Professional Author</a></h6>
                                    </div>
                                </li>
                                <li class="single-course">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)" class="image"><img
                                            src="assets/images/courses/recent-courses/course-2.jpg" alt="Course Image"></a>
                                    </div>
                                    <div class="info">
                                        <span class="price">Free</span>
                                        <h6 class="title"><a
                                                href="course-details.html">Customer-centric
                                                Info-Tech Strategies</a></h6>
                                    </div>
                                </li>
                                <li class="single-course">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)" class="image"><img
                                            src="assets/images/courses/recent-courses/course-3.jpg" alt="Course Image"></a>
                                    </div>
                                    <div class="info">
                                        <span class="price">$19<span>.00</span></span>
                                        <h6 class="title"><a href="course-details.html">Open
                                                Programming Courses for Everyone: Python</a></h6>
                                    </div>
                                </li>
                                <li class="single-course">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)" class="image"><img
                                            src="assets/images/courses/recent-courses/course-4.jpg" alt="Course Image"></a>
                                    </div>
                                    <div class="info">
                                        <span class="price">$26<span>.00</span></span>
                                        <h6 class="title"><a href="course-details.html">Academic
                                                Listening and Note-taking</a></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  --}}
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