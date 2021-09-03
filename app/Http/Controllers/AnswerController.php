<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Models\Question;


class AnswerController extends Controller
{
    


    public function __construct() {
        return $this->middleware('auth',['except'=>['index','show']]);
    }
    
    public function store(Question $question, Request $request)
    {
        $question->answers()->create($request->validate([
            'body' => 'required'
        ])+ ['user_id'=> \Auth::id()]);
        
        return back()->with('success','Answers Submitted');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,Answer $answer)
    {
        $this->authorize('update',$answer);
        return view('frontend.answer.edit',compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->update($request->validate([
            'body' => 'required' 
        ]));
        return redirect()->route('question.details',$question->slug)->
        with('success',' Answer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Question $question,Answer $answer)
    {
        $this->authorize('delete',$answer);
        $answer->delete();
        return back()->with('success','Answer Delete Hoise');
    }



    
}
