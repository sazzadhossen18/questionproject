@extends('frontend.layouts.layout')
@section('content')
<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>Edit Your Question</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
                
                <li class="active">Edit Your Question</li>
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

    <!-- =-=-=-=-=-=-= Post Question  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="post-question">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-8 ">

            <div class="box-panel">

              <h2>Edit  Your Question</h2>
             
              <hr>
              <!-- form login -->
              <form class="margin-top-40" action="{{route('question.update',$edit->id)}}" method="post">
              
                  @csrf
                <div class="form-group">
                  <label>Question Title</label>
                  <input type="text" name="title" value="{{$edit->title}}"  placeholder="Title Here" class="form-control">
                </div>
              

                <div class="form-group">
                  <label>Question Detials</label>
                  <textarea cols="12" rows="12" name="body" value="{{$edit->body}}" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary pull-right" type="submit">Update Your Question</button>

              </form>
              <!-- form login -->

            </div>
          </div>

         
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Post QuestionEnd =-=-=-=-=-=-= -->


  </div>




@endsection