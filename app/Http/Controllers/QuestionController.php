<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use Session;
use DB;
class QuestionController extends Controller
{




    

	public function view(Request $request){

		if(empty($request->all())){

		$questions= Question::latest()->paginate(5);
        return view('frontend.question.index',compact('questions'));

		}else{

		$questions = Question::with('user')->where('title','LIKE','%'.$request->search.'%')->orWhere('body','LIKE','%'.$request->search.'%')->paginate(5);
		$questions->appends($request->all());

       	return view('frontend.question.index',compact('questions'));
		}

		
	}


	public function add(){
		return view('frontend.question.create');
	}


	public function store(Request $request){
		$data = new Question();
		$data->title = $request->title;
	  	$data->slug = Str::slug($request->title,'-');
	  	$data->user_id = Auth()->user()->id;
	  	$data->body = $request->body;
	  	$data->save();
	  	return redirect()->route('question.view')->with('flash_message_success','Data Save Successfully');

	}




	public function details($slug){
		$question = Question::where('slug',$slug)->first();

	$blogkey = 'blog_' . $question->id;
    if (!Session::has($blogkey)) {
      $question->increment('votes_count');
      Session::put($blogkey,1);
    }

	return view('frontend.question.details',compact('question'));
	}



	public function edit($id){
		$edit = Question::find($id);
      	return view('frontend.question.edit',compact('edit'));
	}



	public function update(Request $request,$id){
		$data = Question::find($id);
		$data->title = $request->title;
	  	$data->slug = Str::slug($request->title,'-');
	  	
	  	$data->body = $request->body;
	  	$data->save();
	  	return redirect()->route('question.view')->with('flash_message_success','Data Update Successfully');	
	}



	public function delete($id){
      $deletedata = Question::find($id);
      $deletedata->delete();
      return redirect()->back()->with('flash_message_success','Date Delete Successfully!');
   }



 public function howwork(){
 	return view('frontend.question.how-work');
 }







}
