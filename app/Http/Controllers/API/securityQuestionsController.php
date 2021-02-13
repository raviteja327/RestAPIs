<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\securityQuestions;

class securityQuestionsController extends Controller
{
    //

    public function views(){

        $sq = securityQuestions::where('status', 1)->get();

        // dd($sq);

        return response()->json($sq);

    }

    public function view(Request $request){

        $security_question_hash = $request->id;

        $sq = securityQuestions::where('security_question_hash', $security_question_hash)->where('status', 1)->get();

        return response()->json($sq);
        
    }

}
