<?php


namespace App\Transcode;


use App\Localization\Locale;
use Illuminate\Support\Facades\Cache;

class TranscodeService
{

    public function update($row, $values_arr){
        $table = $row->table;
        $columns = $row->transcodeColumns;
        $row_id = $row->id;

        Cache::forget($table.'_'.$row_id);

        foreach($columns as $col){
            if($values_arr[$col]) {
                $tc = \App\Transcode::where('table_', $table)->where('row_', $row_id)->where('column_', $col)->first();
                if ($tc) {
                    $tc->transcode = $values_arr[$col];
                    $tc->save();
                } else {
                    $tc = new \App\Transcode;
                    $tc->table_ = $table;
                    $tc->column_ = $col;
                    $tc->row_ = $row_id;
                    $tc->transcode = $values_arr[$col];
                    $tc->save();
                }
            }

        }

    }

    public function evaluate($row, $forceToGetArabic = 0){

        $locale = new Locale;
        try{
            $table = $row->table;
            $columns = $row->transcodeColumns;
            $row_id = $row->id;    
        }catch(\Exception $e){
            return [];
        }


//        Cache::forget($table.'_'.$row_id);
        $transCodes = Cache::remember($table.'_'.$row_id, 1440, function()use($table, $row_id){
            return (\App\Transcode::where('table_', $table)->where('row_', $row_id)->get());
        });

        if(!$forceToGetArabic){
            if($locale->locale == 'en'){
                $obj = [];
                foreach($columns as $col){
                    if(!$row[$col]){
                        $t = $transCodes->first(function ($i) use($col){
                            return $i->column_ == $col;
                        });

                        if($t){
                            $obj[$col] = $t->transcode;

                        }else{
                            $obj[$col] = '';

                        }

                    }else{
                        $obj[$col] = $row[$col];
                    }
                }
                return $obj;

            }else if($locale->locale == 'ar'){
                $obj = [];

                foreach($columns as $col){

                    $t = $transCodes->first(function ($i) use($col){
                        return $i->column_ == $col;
                    });
                    if($t){
                        $obj[$col] = $t->transcode;
                    }else{
                        $obj[$col] = $row[$col];
                    }
                }

                return $obj;
            }
        }else{
            $obj = [];

            foreach($columns as $col){

                $t = $transCodes->first(function ($i) use($col){
                    return $i->column_ == $col;
                });
                if($t){
                    $obj[$col] = $t->transcode;
                }else{
                    $obj[$col] = '';
                }
            }

            return $obj;
        }


        return [];
    }

    public function add($row, $values_arr){
        $table = $row->table;
        $columns = $row->transcodeColumns;
        $row_id = $row->id;

        foreach($columns as $col){
            if($values_arr[$col] != ''){
                $tc = new \App\Transcode;
                $tc->table_ = $table;
                $tc->column_ = $col;
                $tc->row_ = $row_id;
                $tc->transcode = $values_arr[$col];
                $tc->save();
            }
        }

    }

    public function delete($row){
        $table = $row->table;
        $columns = $row->transcodeColumns;
        $row_id = $row->id;

        $rans = \App\Transcode::where('table_', $table)->where('row_', $row_id)->delete();
    }
}
