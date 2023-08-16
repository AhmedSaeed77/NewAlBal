<?php


namespace App\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait QuestionHelper
{

    public function fixDuplicationDueTranslation($records, $record_columns, $record_translation_columns){
        $items_arr = [];
        $currentItemID = 0;
        $currentItem = null;
        for($i=0; $i <  count($records); $i++){
            // all children records are array [key => value]
            $records[$i] = (array)$records[$i];
            if($currentItemID == $records[$i]['id']){
                $currentItem['transcodes'][$records[$i]['column_']] = $records[$i]['transcode'];
            }else{
                // push current item and process new one
                // condition to bypass first iteration
                if($currentItemID != 0){
                    array_push($items_arr, $currentItem);
                }
                // records must have special identifier [id]
                $currentItemID = $records[$i]['id'];
                $currentItem = [];

                foreach($record_columns as $column){
                    $currentItem[$column] = $records[$i][$column];
                }
                $currentItem['transcodes'] = [];
                foreach($record_translation_columns as $column){
                    $currentItem['transcodes'][$column] = '';
                }

                // push first translation
                $currentItem['transcodes'][$records[$i]['column_']] = $records[$i]['transcode'];
            }
            // case last loop in iteration
            if(($i + 1) == count($records)){
                array_push($items_arr, $currentItem);
            }

        }
        return $items_arr;
    }

    /**
     * @param $question_id_array
     * @return \Illuminate\Support\Collection
     */
    public function queryByQuestionsId($question_id_array){
        return (DB::table('questions')
            ->whereIn('questions.id', $question_id_array)
            // From Library..
//            ->where(function($query){
//                if(Auth::guard('web')->check()){
//                    $query->whereNull('questions.passage_id');
//                }
//            })
            ->leftJoin(DB::raw('(SELECT * FROM question_distributions GROUP BY question_id) as question_distributions'),
                'question_distributions.question_id', '=', 'questions.id')
            ->leftJoin('paths', 'question_distributions.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'question_distributions.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'question_distributions.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'question_distributions.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'question_distributions.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'question_distributions.skill_id', '=', 'topic_skills.id')
            ->leftJoin('passages', 'questions.passage_id', '=', 'passages.id')
            ->select(
                'questions.id',
                'questions.correct_answers_required',
                'questions.question_type_id',
                DB::raw('(questions.title) AS question_title'),
                DB::raw('(passages.passage) AS question_passage'),
                DB::raw('passages.id AS passage_id'),
                DB::raw('(passages.passage) AS passage'),
                'questions.feedback',
                DB::raw('(paths.id) AS path_id'),
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(path_courses.id) AS course_id'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(course_parts.id) AS part_id'),
                DB::raw('(course_parts.title) AS part_title'),
                DB::raw('(part_chapters.id) AS chapter_id'),
                DB::raw('(part_chapters.title) AS chapter_title'),
                DB::raw('(chapter_topics.id) AS topic_id'),
                DB::raw('(chapter_topics.title) AS topic_title'),
                DB::raw('(topic_skills.id) AS skill_id'),
                DB::raw('(topic_skills.title) AS skill_title'),
                'questions.random',
                'questions.admin_created_by',
                'questions.created_at',
                'questions.updated_at',
                'questions.reason',
//                DB::raw("(TRIM(BOTH '\"' FROM `exam_num`)) AS exam_num"),
                'questions.img',
                'questions.demo'
            )->orderBy('questions.created_at', 'desc')
            ->get()
        );
    }


    public function queryByStructureId($question_structure_id){
        return (DB::table('question_distributions')
            ->whereIn('question_structures.id', $question_structure_id)
            // From Library..
            ->leftJoin('paths', 'question_structures.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'question_structures.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'question_structures.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'question_structures.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'question_structures.topic_ic', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'question_structures.skill_Id', '=', 'topic_skills.id')
            ->join('questions', 'question_structures.question_id', '=', 'questions.id')
            ->leftJoin('passages', 'questions.passage_id', '=', 'passages.id')
//            ->where(function($query){
//                if(Auth::guard('web')->check()){
//                    $query->whereNull('questions.passage_id');
//                }
//            })
            ->select(
                'questions.id',
                'questions.correct_answers_required',
                'questions.question_type_id',
                DB::raw('(questions.title) AS question_title'),
                DB::raw('(passages.passage) AS question_passage'),
                DB::raw('passages.id AS passage_id'),
                DB::raw('(passages.passage) AS passage'),
                'questions.feedback',
                DB::raw('(paths.id) AS path_id'),
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(path_courses.id) AS course_id'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(course_parts.id) AS part_id'),
                DB::raw('(course_parts.title) AS part_title'),
                DB::raw('(part_chapters.id) AS chapter_id'),
                DB::raw('(part_chapters.title) AS chapter_title'),
                DB::raw('(chapter_topics.id) AS topic_id'),
                DB::raw('(chapter_topics.title) AS topic_title'),
                DB::raw('(topic_skills.id) AS skill_id'),
                DB::raw('(topic_skills.title) AS skill_title'),
                'questions.random',
                'questions.admin_created_by',
                'questions.created_at',
                'questions.updated_at',
                'questions.reason',
//                DB::raw("(TRIM(BOTH '\"' FROM `exam_num`)) AS exam_num"),
                'questions.img',
                'questions.demo'
            )->orderBy('questions.created_at', 'desc')
            ->get()
        );
    }

    public function batchQuestionLoader($question_id_array, $question_structure_array=null){
        /** @var Get All Questions $questions */

        if($question_structure_array){
            $questions = $this->queryByStructureId($question_structure_array);
        }else{
            $questions = $this->queryByQuestionsId($question_id_array);
        }


        /** @var Get All Question Translations $question_translate */
        $question_translate = DB::table('transcodes')
            ->whereIn('row_', $question_id_array)
            ->where([
                'table_'    => 'questions'
            ])
            ->select('column_', 'transcode', 'row_')
            ->get();

        /** @var Get All Questions Answers $question */
        $question_answers = DB::table('question_answers')
            ->whereIn('question_id', $question_id_array)
            ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'question_answers\' GROUP BY row_) AS transcodes'), function($join){
                $join->on('transcodes.row_', '=', 'question_answers.id');
            })
            ->select(
                'question_answers.id',
                'question_answers.question_id',
                'question_answers.answer',
                'transcodes.transcode',
                'transcodes.column_',
                'question_answers.is_correct'
            )
            ->get()
            ->toArray();
        $question_answers = $this->fixDuplicationDueTranslation($question_answers,
            ['id', 'question_id', 'answer', 'is_correct'],
            ['answer']);

        /** @var Get All Drag Right Items $question_drag_right */
        $question_drag_right = DB::table('question_dragdrops')
            ->whereIn('question_id', $question_id_array)
            ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'question_dragdrops\') AS transcodes'), function($join){
                $join->on('transcodes.row_', '=', 'question_dragdrops.id');
            })
            ->select(
                'question_dragdrops.id',
                'question_dragdrops.question_id',
                'question_dragdrops.left_sentence',
                'question_dragdrops.right_sentence',
                'transcodes.column_',
                'transcodes.transcode'
            )
            ->get()
            ->toArray();
        $question_drag_right = $this->fixDuplicationDueTranslation($question_drag_right,
            ['id', 'question_id', 'left_sentence', 'right_sentence'],
            ['left_sentence', 'right_sentence']);


        /** @var Get All Drag Center $question_drag_right */
        $question_drag_center = DB::table('question_center_dragdrops')
            ->whereIn('question_id', $question_id_array)
            ->leftJoin(DB::raw('(SELECT transcodes.column_, transcodes.transcode, transcodes.row_ FROM transcodes WHERE table_ = \'question_center_dragdrops\') AS transcodes'), function($join){
                $join->on('transcodes.row_', '=', 'question_center_dragdrops.id');
            })
            ->select(
                'question_center_dragdrops.id',
                'question_center_dragdrops.question_id',
                'question_center_dragdrops.correct_sentence',
                'question_center_dragdrops.center_sentence',
                'question_center_dragdrops.wrong_sentence',
                'transcodes.column_',
                'transcodes.transcode'
            )
            ->get()
            ->toArray();
        $question_drag_center = $this->fixDuplicationDueTranslation($question_drag_center,
            ['id', 'question_id', 'correct_sentence', 'center_sentence', 'wrong_sentence'],
            ['correct_sentence', 'center_sentence', 'wrong_sentence']);


        foreach($questions as $question){
            $translation = $question_translate->filter(function($row)use($question){
                return $row->row_ == $question->id;
            });

            /** Add Answers Array */
            $question->answers = null;
            if(count($question_answers)){
                $answers = array_filter($question_answers, function($i)use($question){
                    return $i['question_id'] == $question->id;
                });
                $answers = array_values($answers); // rearrange index & prevent array gaps
                if(count($answers)){
                    $question->answers = $answers;
                    if($question->random)
                        shuffle($question->answers);
                }
            }
            /** Add Drag Right */
            $question->drag_right = null;
            if(count($question_drag_right)){
                $drag_right = array_filter($question_drag_right, function($i)use($question){
                    return $i['question_id'] == $question->id;
                });
                $drag_right = array_values($drag_right); // rearrange index & prevent array gaps
                if(count($drag_right)){
                    $question->drag_right = $drag_right;
                    if($question->random)
                        shuffle($question->drag_right);
                }
            }
            /** Add Drag Center */
            $question->drag_center = null;
            if(count($question_drag_center)){
                $drag_center = array_filter($question_drag_center, function($i)use($question){
                    return $i['question_id'] == $question->id;
                });
                $drag_center = array_values($drag_center); // rearrange index & prevent array gaps
                if(count($drag_center)){
                    $question->drag_center = $drag_center;
                    if($question->random)
                        shuffle($question->drag_center);
                }
            }

        }
        return $questions;
    }

    public function questionLoader($question_id){
        $question = $this->batchQuestionLoader([$question_id]);
        if(count($question)){
            return ($question[0]);
        }
        return null;
    }

}
