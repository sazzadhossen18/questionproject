<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Question;





class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



 // One To Many
    public function questions(){
        return $this->hasMany(Question::class);
    }





public function favorites(){
        return $this->belongsToMany(Question::class,'favorites')
            ->withTimestamps();
    }





     public function voteQuestions(){
        return $this->morphedByMany(Question::class, 'votable')
                -> withTimestamps();
           
    }
    public function voteAnswers(){
        return $this->morphedByMany(Answer::class, 'votable')
                -> withTimestamps();
           
    }
    
    public function voteQuestion(Question $question, $vote){
        $voteQuestions = $this->voteQuestions();
        if($voteQuestions->where('votable_id',$question->id)->exists()){
            $voteQuestions->updateExistingPivot($question,['vote'=>$vote]);
        }else{
            $voteQuestions->attach($question, ['vote'=> $vote]);
        }
        
        $question->load('votes');
        $upVotes = $question->upVotes()->sum('vote');
        $downVotes = $question->downVotes()->sum('vote');
        
        $question->votes_count = $upVotes + $downVotes;
        $question->save();
        
    }
    public function voteAnswer(Answer $answer, $vote){
        $voteAnswers = $this->voteAnswers();
        if($voteAnswers->where('votable_id',$answer->id)->exists()){
            $voteAnswers->updateExistingPivot($answer,['vote'=>$vote]);
        }else{
            $voteAnswers->attach($answer, ['vote'=> $vote]);
        }
        
        $answer->load('votes');
        $upVotes = $answer->upVotes()->sum('vote');
        $downVotes = $answer->downVotes()->sum('vote');
        
        $answer->votes_count = $upVotes + $downVotes;
        $answer->save();
        
    }









    
}
