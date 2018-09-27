<?php

namespace App\Http\Controllers\doctor;

use App\Models\Auth\User\User;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionsForum;
use App\Http\Requests\Qeestionval ;

use App\Models\Diagnosis;
class DoctorDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor', ['except' => 'logout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
            'protected_pages' => 0,
        ];

        foreach (\Route::getRoutes() as $route) {
            foreach ($route->middleware() as $middleware) {
                if (preg_match("/protection/", $middleware, $matches)) $counts['protected_pages']++;
            }
        }

        return view('doctor.dashboard', ['counts' => $counts]);
    }


    public function getLogChartData(Request $request)
    {
        \Validator::make($request->all(), [
            'start' => 'required|date|before_or_equal:now',
            'end' => 'required|date|after_or_equal:start',
        ])->validate();

        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $dates = collect(\LogViewer::dates())->filter(function ($value, $key) use ($start, $end) {
            $value = new Carbon($value);
            return $value->timestamp >= $start->timestamp && $value->timestamp <= $end->timestamp;
        });


        $levels = \LogViewer::levels();

        $data = [];

        while ($start->diffInDays($end, false) >= 0) {

            foreach ($levels as $level) {
                $data[$level][$start->format('Y-m-d')] = 0;
            }

            if ($dates->contains($start->format('Y-m-d'))) {
                /** @var  $log Log */
                $logs = \LogViewer::get($start->format('Y-m-d'));

                /** @var  $log LogEntry */
                foreach ($logs->entries() as $log) {
                    $data[$log->level][$log->datetime->format($start->format('Y-m-d'))] += 1;
                }
            }

            $start->addDay();
        }

        return response($data);
    }

    public function getRegistrationChartData()
    {

        $data = [
            'registration_form' => User::whereDoesntHave('providers')->count(),
            'google' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'google');
            })->count(),
            'facebook' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'facebook');
            })->count(),
            'twitter' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'twitter');
            })->count(),
        ];

        return response($data);
    }
    public function sentindex()
    { 
        $patients = patient::all();
        return view('doctor.patients.index', compact('patients')); 
    }
    public function indexdais()
    {
        $diagnosise=Diagnosis::all();
        return view('doctor.diagnosis.index',compact('diagnosise') );
    }
    public function diagnosisindex()
    {

    return view('doctor.diagnosis.index');
}


public function diagnosisindexss(Diagnosis $diagnosise)
    {

    return view('doctor.diagnosis.show',compact('diagnosise'));
}
public function sentindexsd()
    {

        return view('doctor.doctors.index');
}
public function servicesi()
{
    $services = DB::select('select * from service');
    return view('doctor.services.index',compact('services'));
}

public function questionforum()
    {
        return view('doctor.question_forum.index');
    }
    
    public function questionforumadd()
    {
        return view('doctor.question_forum.add');
    }

    
    public function addquesw(Qeestionval $request,QuestionsForum $ques)
    {
        $lastid=0;
        $name='nophoto';
       if(!($request->qu_pic)==0)
       {
        $file=$request ->file('qu_pic');
       $type=$file->guessExtension();
       
        // DB::insert('INSERT INTO `queston` ( `question_title`, `question_type`, `Queston`, `question_pic`) VALUES  ( ?,?, ?,?)',[ $request['qu_title'],$request['qu_type'],$request['question'],$name]);
        $ques->questionTitle = $request->get('qu_title');
        $ques->question = $request->get('question');
        $ques->questionType = $request->get('qu_Type');
        $ques->questionAsk = $request->get('qu_Ask');
        $ques->save();
         $Questions = DB::select('select * from question ORDER BY id DESC LIMIT 1');
        $type=$file->guessExtension();
         $lastid = 0;
        foreach($Questions as $Question)
        {
            $lastid=$Question->id;

        }
        $name=$lastid."pic.".$type;
        $file->move('image/question/pic',$name);
        $ques->questionPic=$name;
        $ques->save();
        return view('doctor.question_forum.success');
        }
       
        $ques->questionTitle = $request->get('qu_title');
        $ques->question = $request->get('question');
        $ques->questionType = $request->get('qu_Type');
        $ques->questionAsk = $request->get('qu_Ask');
        $ques->questionPic=$name;
        $ques->save(); 
        return view('doctor.question_forum.success');
    }
    
    public function questionforumshow(QuestionsForum $questionsforum)
    {
        ['questionsforum' => $questionsforum];
        $qid=$questionsforum->id;
        $Question=DB::select('select * from question where id ='.$qid);
        foreach($Question as $Questions)
        {
        $question=$Questions->question;
        $questionType=$Questions->questionType;
        $questionAsk=$Questions->questionAsk;
        $questionTitle=$Questions->questionTitle;
        }
         $replys=DB::select('select * from reply where questionId ='.$qid);
        return view('doctor.question_forum.show',compact('replys'),compact('Question'));
    
    }
}
 