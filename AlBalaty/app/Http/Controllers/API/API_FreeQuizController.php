<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Process_group;

class API_FreeQuizController extends Controller
{
    public function generate_info(){
        $data = [];
        // count of total free quiz questions ..
        $free = Question::where('demo', '=', 1)->get();
        $countAll = count($free);
        
        array_push($data, ['id' => 00, 'name'=>'All', 'question_number'=> $countAll]);

        $count = 0;
        $process = Process_group::all();
        foreach($process as $p){
            $freebyProcess = Question::where('demo', '=', 1)->where('process_group' ,'=', $p->id)->get();
            if($freebyProcess->first()){
                foreach($freebyProcess as $q){
                    $count++;
                }
            }
            array_push($data, ['id' => $p->id, 'name'=>$p->name, 'question_number'=> $count]);
            // else pass
            $count = 0;
        }
        return response()->json([
            'data' => $data
        ]);
        
    }

    public function generate($process_id){
        $questions_array = [];
        
        // in case of choosing ALL ..
        $quests = Question::where('demo','=','1')->get();

        if($process_id != 0){
            

            
            $quests = Question::where('demo','=',1)->where('process_group', '=', $process_id)->get();

        }
        
        foreach ($quests as $q) {
            $question = [];
            $question['title'] = $q->title;
            $question['answers']['a'] = $q->a;
            $question['answers']['b'] = $q->b;
            $question['answers']['c'] = $q->c;
            $question['answers']['d'] = $q->correct_answer;
            shuffle($question['answers']);
            $question['correct_answer'] = $q->correct_answer;
            $question['feedback'] = $q->feedback;


            $process_g = Process_group::where('id','=',$q->process_group)->get()->first();
            $question['process_group'] = ['id' => $process_g->id, 'name' => $process_g->name];
            $question['img'] = NULL;
            if($q->img){
                $question['img'] = 'https://sswls.com/storage/questions/'.basename($q->img);
            }

            array_push($questions_array, $question);
        }
        shuffle($questions_array);
        return response()->json([
            'data' => $questions_array
        ]);
    }
}
