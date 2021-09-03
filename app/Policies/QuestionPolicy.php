<?php

namespace App\Policies;

use App\Models\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

   

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\=Question  $=Question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\=Question  $=Question
     * @return mixed
     */
    public function delete(User $user, Question $question)
    {
        return $user->id === $question->user_id && 
                $question->answers_count < 1;
    }

    
}
