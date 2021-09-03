@extends('frontend.layouts.layout')
@section('content')
@include('frontend.layouts.search')
<div class="main-content-area">
    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
           
            <h1>Showing {{ $questions->firstItem() }} to {{ $questions->lastItem() }} of total {{$questions->total()}} entries</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                
                <li class="active">Questions </li>
              </ol>
            </div>
            <!-- end bread -->


            @if(Session::has('flash_message_error')) 
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   

        @if(Session::has('flash_message_success')) 
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif 

          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="questions">
      <div class="container">       
        <!-- Row -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="listing">
              <!-- Question Area Panel -->
              <div class="listing-area">

              
              @foreach($questions as $question)

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                     <div class="col-md-1">
                        <div class="d-flex flex-column counters">
                           <div class="vote" style="text-align: center;">
                               <strong>
                                   {{$question->votes_count}}</br>
                               </strong>
                               {{str_plural('Votes',$question->votes_count)}}
                           </div>

 <div class="status {{$question->getStatusAttribute()}}">
<p>
     <strong>
         {{$question->answers_count}}</br>
     </strong>
 {{str_plural('Answers',$question->answers_count)}}
</p>
 </div>



                           <div class="views" style="text-align: center;">
                               
                             <strong>{{$question->votes_count}} </strong>
                               
                            {{str_plural('Views',$question->views)}}
                           </div>
                       </div>
                    </div>
                  
                    <div class="col-md-9 col-sm-10  col-xs-12">
                      <h3><a href="{{url('/questions/details',$question->slug)}}"> 	
                         {{$question->title}}</a></h3>

                      <div class="listing-meta">

                        <span>Asked By  <a href="{{$question->user->url}}"> {{$question->user->name}}</a></span>
                        <span>
                         <i class="fas fa-clock"></i>{{$question->created_at->diffForHumans()}}
                          </span>
                      </div>

                      <p>{{str_limit(strip_tags($question->body,5000))}}</p>
                    </div>



                    <div class="col-md-2 col-sm-2 col-xs-12" style="text-align: right;">
                      @can('update', $question)
                      <a href="{{route('question.edit',$question->id)}}" class="btn btn-sm btn-primary">
                        Edit
                      </a>
                        @endcan
                       @can('delete', $question)
                      <a href="{{route('question.delete',$question->id)}}" class="btn btn-sm btn-danger">
                        Delete
                      </a>
                      @endcan
                    </div>
                  </div>
                </div>
                <!-- Question Listing End -->

                @endforeach
                <!-- Pagination View More -->
                <div class="text-center clearfix">
                  <ul class="pagination ">
                     {{$questions->links()}}
                  </ul>
                </div>
                <!-- Pagination View More End -->

              </div>

              <!-- Question Area Panel End -->
            </div>
          </div>
         
        </div>
        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
  </div>
@endsection