<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightTargetRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Carbon\Carbon;

class Weight_logController extends Controller
{
    // public function register1(UserRequest $request)
    // {
    //     $user = $request->only(['name', 'email', 'password']);
    //     User::create($user);
    //     return view('auth/register1');
    // }

    public function register2(WeightTargetRequest $request)
    {
        return view('auth/register2');
    }
    // $user=new User;
    // $user->fill($request->except(['_token']));
    // $user->save();
    // $LastInsertId=$user->id;
    // $weight_log=WeightLog::with('user')->get();
    // $weight_log=$request->only(['user_id'=>$LastInsertId,'weight']);
    // WeightLog::create($weight_log);
    // $weight_target = WeightTarget::with('user')->get();
    // $weight_target =$request->only(['user_id'=>$LastInsertId,'target_weight']);
    // WeightTarget::create($weight_target);

    public function weight_logs(Request $request)
    {
        $user = Auth::user();
        $latest_weight_log = WeightLog::orderBy('date', 'desc')->first();
        $weight_targets = WeightTarget::all();
        // $weight_logs = WeightLog::all();
        $weight_logs = WeightLog::latest('date', 'desc')->get();
        $weight_logs = WeightLog::with('user')->paginate(8);
        return view('weight_logs', compact('weight_logs', 'weight_targets', 'latest_weight_log'));
    }


    public function detail(Request $require, $weightLogId)
    {
        $weight_log = WeightLog::find($weightLogId);
        $dt = Carbon::now();
        return view('weightLogId', compact('weight_log', 'dt'));
    }

    public function update(WeightLogRequest $request)
    {
        $weight_log = $request->only(['date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        WeightLog::find($request->id)->update($weight_log);

        return redirect('/weight_logs');
    }

    public function goalSetting()
    {
        $weight_targets= WeightTarget::all();
        return view('goal_setting',compact('weight_targets'));
    }

    public function goalUpdate(WeightTargetRequest $request){
        $weight_target = $request->only(['target_weight']);
        WeightTarget::find($request->id)->update($weight_target);
        return redirect('/weight_logs');
    }
}
