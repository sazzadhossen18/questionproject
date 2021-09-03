<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class HomeController extends Controller
{
    
    

    public function index(){
        $questions= Question::latest()->paginate(5);
        return view('frontend.question.index',compact('questions'));
    }






}
