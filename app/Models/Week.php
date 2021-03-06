<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Course;
class Week extends Model
{
    protected $table ="m_week";

    public static function getSelectWeek(){
        return DB::table('m_week')->select('id', 'name')->get();
    }

    public static function getWeek($id){
    	if($id > 0 && $id < 37){
    		return Week::findOrFail($id)->name;
    	}else{
    		return 'NOT';
    	}
    }
}