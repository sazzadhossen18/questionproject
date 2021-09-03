@extends('frontend.layouts.layout')
@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>Update Your Answer</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
              
                <li class="active">Answer</li>
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

          

            <div class="clearfix"></div>
            <!-- Thread Reply -->
            <div class="thread-reply">
             
            
 

              <div class="clearfix"></div>

               <form method="post" action="{{route('questions.answers.update',[$question->id,$answer->id])}}">
                        @method('PUT')
                        @csrf
                <div class="form-group">
                  <label>Update Your Answer</label>
                  <textarea cols="12" rows="7 "name="body" value="{{$answer->body}}" class="form-control"></textarea>
                </div>
                	
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update Your Answer</button>

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