<?php

namespace App\Http\Controllers\employee\receptionist;

use App\Models\Auth\User\User;
use App\Models\Employee;
use App\Models\Notification;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Auth;

class RecepDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('receptionist', ['except' => 'logout']);
    }

    public function editprofile()
    {
        $employee = Employee::where('email', auth()->user()->email)->get();
        return view('employee.receptionist.editprofile', compact('employee'));
    }

    public function updateprofile(Request $request, Employee $employee)
    {
        $validatedData = [
            'inputName' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'empType' => 'required',
            'inputAddress' => 'required|regex:/^[a-zA-Z0-9 ,\/]+$/'
        ];
        
        $customMessages = [
            'inputName.regex' => 'Name cannot contain numbers and special characters',
            'inputAddress.regex' => 'Address cannot contain special characters like . / @'
        ];
        
        $this->validate($request, $validatedData, $customMessages);
        
        $employee->name = $request->get('inputName');
        $employee->email = $request->get('email');
        $employee->contactNo = $request->get('contactNo');
        $employee->address = $request->get('inputAddress');
        $employee->employeeType = $request->get('empType');
        $employee->save();

        $message = 'Successfully updated your profile';
        return \Redirect::back()->with('message', $message);
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
        $employees = Employee::where('email', auth()->user()->email)->get();
        $notifications = Notification::get();
        // foreach ($employees as $emp) {
        //     if ($emp == auth()->user()->name) {
        //         $employee = $emp;
        //     }
        // }
        return view('employee.receptionist.dashboard', ['counts' => $counts, 'employee' => $employees, 'notifications' => $notifications]);
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
}
