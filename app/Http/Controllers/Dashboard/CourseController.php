<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Course;
use App\Models\Lesson;
use App\Models\Course;
use DB; use Session;
use Auth;
class CourseController extends Controller
{
    
	public function __construct()
    {
    	$this->middleware('auth');
    }
  
    public function getList(){
        $course_data = Course::where([
                ['status', 1]
            ])->get();
        return view('dashboard.course.list', compact('course_data'));
    }

    public function getMyCourse(){
        try{
            $user_id = Auth::user()->id;
            //$user_course = User_Course::getCourseByUserId($user_id);
            $user_course = DB::table('m_khoa_hoc')
                ->join('user_course', 'user_course.course','=','m_khoa_hoc.code')
                ->select('user_course.*', 'm_khoa_hoc.image' )
                ->where([
                    ['user_course.user_id', $user_id]
                ])->orderby('user_course.course')->get();
            return view('dashboard.course.my_course', compact('user_course', 'user_id'));
        }catch(Exception $e){
            return back();
        }
        
    }

    public function getDetail($idd){
        $course_id = fdecrypt($idd); 
        $user_id = Auth::user()->id;
        
        $lesson_data = Lesson::where([
                ['course', $course_id],
                ['status', 1],
            ])->get();

        if($lesson_data->count() > 0){
            $user_course = User_Course::where([
                    ['user_id',$user_id],
                    ['course',$course_id],
                    //['status', 1]
                ])->get();    
            $user_status = $user_course[0]->status;
            if($user_course->count() > 0){
                return view('dashboard.course.detail', compact('lesson_data','course_id','user_course', 'user_status'));
            }else{
                return back();
            }

            /*
            else{
                return view('dashboard.course.detail_no', compact('lesson_data','course_id','user_course'));
            }
            */
        }else{
            return back();
        }
    }

    public function getDetailLesson($course, $lesson){
        $course_id = fdecrypt($course); 
        $lesson_id = fdecrypt($lesson); 
        $user_id = Auth::user()->id;
        $lesson_data = Lesson::where([
                ['course', $course_id],
                ['status', 1],
            ])->get();
        $lesson_detail = Lesson::find($lesson_id);
        
        if(isset($lesson_data) && isset($lesson_detail)){
            $user_course = User_Course::where([
                    ['user_id',$user_id],
                    ['course', $course_id],
                    //['status', 1]
                ])->get(); 
            $user_status = $user_course[0]->status;
            if($user_course->count() > 0){
                return view('dashboard.course.course_lesson', compact('lesson_data','course_id', 'lesson_id', 'lesson_detail','user_course', 'user_status'));
            }else{
                return back();
            }
            /*
            else{
                return view('dashboard.course.course_lesson_no', compact('lesson_data','course_id', 'lesson_id', 'lesson_detail','user_course'));
            }
            */
        }else{
            return back();
        }

    }
}
