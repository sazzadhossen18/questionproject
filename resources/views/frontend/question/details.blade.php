
@extends('frontend.layouts.layout')

@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>Question Detial</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
               
                <li class="active">Question</li>
              </ol>
            </div>
            <!-- end bread -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>

    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Question Details =-=-=-=-=-=-= -->

    <section class="section-padding-80 white question-details">
      <div class="container">
        <!-- Row -->
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <!-- Question Detail -->

              <!-- Question Listing -->
            <div class="listing-grid ">
              <div class="row">
                 <div class="col-md-1 col-sm-12 col-xs-12">
                    <div class="media">
                      <div class="d-flex flex-column votes-control">
                         <a class="vote-up
                               {{Auth::guest() ? 'off' : ''}}"

                                   onclick="event.preventDefault(); document.getElementById('questions-vote-up{{$question->id}}').submit()">
                                    <p style="color:#000;"><i class="fas fa-caret-up fa-3x"></i></p>
                                </a>
                                <span class="votes-count">
                               <p style="color:#000;font-weight:bold;">{{$question->votes_count}}</p> 
                            </span>
                                <form action="/questions/{{$question->id}}/vote" id="questions-vote-up{{$question->id}}"
                                      style="display: none" method="post">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>
                        
                        <a class="vote-down
                               {{Auth::guest() ? 'off' : '' }}"
                                   onclick="event.preventDefault(); document.getElementById('questions-vote-down{{$question->id}}').submit()">
                                    <p style="color:#000;"><i class="fas fa-caret-down fa-3x"></i></p>
                                </a>
                                <form action="/questions/{{$question->id}}/vote"
                                      id="questions-vote-down{{$question->id}}" style="display: none" method="post">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                </form>
                      
                        

                      </div>
                      </div>
                 </div>
                <div class="col-md-11 col-sm-12 col-xs-12">
                  <h3> {{$question->title}}</h3>
                  <div class="listing-meta"> <span><i class="fa fa-clock"></i>{{$question->created_at->diffForHumans()}}</span> <span><i class="fa fa fa-eye" aria-hidden="true"></i> {{$question->votes_count}} Views</span> 
                  </div>
                 <p>{!! $question->body !!}</p>
                </div>
               
              </div>
              <div class="row">
                 <div class="col-md-12">
                  <div class="author-details" style="text-align:right; margin-top: 20px; margin-bottom: 0px;">
                      <h5>Asked By:</h5>
                      <div class="author-image" style="margin-top: 10px;">
                        <img src="{{(!empty($user->image))?asset('public/upload/user_images/'.$user->image):asset('public/assets/image/user.png')}}" alt="user">
                      </div>
                      <h2>{{$question->user->name}}</h2>
                      <p>{{$question->created_at}}</p>
                    </div>
                </div>
              </div>
            </div>
            <!-- Question Listing End -->

            <div class="clearfix"></div>



            <!-- Thread Reply -->
            <div class="thread-reply">
              <h2>{{$question->answers_count}} Answers </h2>

              @foreach($question->answers as $answer)
              <!-- Reply Grid -->
              <div class="media-block card-box ">
                   <div class="row">

                      <div class="col-md-1">
                   <div class="media-left">
                         <div class="media">
                      <div class="d-flex flex-column votes-control">

                        <a class="vote-up {{Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault(); document.getElementById('answers-vote-up{{$answer->id}}').submit()">
                            <p style="color:#000;"><i class="fas fa-caret-up fa-3x"></i></p>
                        </a>
                      <span class="votes-count">
                         <p style="color:#000;font-weight:bold;">{{$answer->votes_count}}</p> 
                      </span>
                      <form action="/answers/{{$answer->id}}/vote" id="answers-vote-up{{$answer->id}}"
                                          style="display: none" method="post">
                      @csrf
                    <input type="hidden" name="vote" value="1">
                   </form>



            <a class="vote-down {{Auth::guest() ? 'off' : '' }}"
                onclick="event.preventDefault(); document.getElementById('answers-vote-down{{$answer->id}}').submit()">
                <p style="color:#000;"><i class="fas fa-caret-down fa-3x"></i></p>
            </a>
            <form action="/answers/{{$answer->id}}/vote" id="answers-vote-down{{$answer->id}}" style="display: none" method="post">
             @csrf
             <input type="hidden" name="vote" value="-1">
        </form>


         <div class="vote-answer-accept">
                @can('accept',$answer) 
              <div class="answer-section {{$answer->getStatusAttribute()}}">
                     <a onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit()">
                      <i class="fas fa-check fa-2x"></i>
                    </a>
                  
                <form action="{{route('accept.answers',$answer->id)}}" id="accept-answer-{{$answer->id}}" style="display: none" method="post">
                  @csrf
                </form>

                  @else
                  @if($answer->is_best)
                  <a title="This is Best Answer" class="favorite mt-3 {{$answer->getStatusAttribute()}}">
                 <i class="fas fa-check fa-2x"></i>
                 </a>
                @endif
                                  
              </div>
            @endcan
        </div>


       </div>

                  </div>    
                </div>
                   <!-- End Left -->

                     <div class="col-md-9">
                        {!! $answer->body !!}
                     </div>
                   <!-- End Middle -->
    
 <div class="col-md-2">
 @can('update', $answer)
 <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}"  class="btn btn-sm btn-primary">
  Edit
</a>
 @endcan

  @can('delete', $answer)
 <form class="form-delete" action="{{route('questions.answers.destroy',[$question->id,$answer->id])}}"
  method="post" style="margin-top:-30px; margin-left: 60px;">
   @method('DELETE')
   @csrf
 <button onclick="return confirm('Are You Sure')"
 class="btn btn-sm btn-danger" type="submit">
 Delete
  </button>
</form>                                            
 @endcan
 </div>
 <!-- End Right -->


                   </div> 
                      <div class="row">



                 <div class="col-md-12">
                  <div class="author-details" style="text-align:right; margin-top: 20px; margin-bottom: 0px;">
                      <h5>Answer By:</h5>
                      <div class="author-image" style="margin-top: 10px;">
                        <img src="{{(!empty($user->image))?asset('public/upload/user_images/'.$user->image):asset('public/assets/image/user.png')}}" alt="user">
                      </div>
                      <h2>{{$answer->user->name}}</h2>
                      <p>{{$answer->created_at}}</p>
                    </div>
                </div>



              </div>
              </div>
              <!-- Reply Grid End -->

           



               @endforeach

              <div class="clearfix"></div>

               <form action="{{route('questions.answers.store',$question->id)}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Post Your Answer</label>
                  <textarea cols="12" rows="7" name="body" class="form-control" placeholder="I Have The Aswert"></textarea>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Post Your Answer</button>

              </form>

            </div>
            <!-- Thread Reply End -->









          </div>

         

        </div>
        <!-- Row End -->
      </div>
    </section>
    <!-- =-=-=-=-=-=-= Question Details end =-=-=-=-=-=-= -->


  </div>



 @endsection