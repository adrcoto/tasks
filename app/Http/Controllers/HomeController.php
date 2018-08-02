<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $rules =
        [
            'name' => 'required|min:2|max:128',
            'description' => 'required|min:2|max:256',
            'status' => 'required|integer|between:0,10'
        ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $tasks = Task::all();
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        $test = Task::where('assign',Auth::user()->id)->get();
        */
        $tasks = Task::where('user_id', Auth::user()->id)->orWhere('assign', Auth::user()->id)->get();

        return view('home', ['tasks' => $tasks]);
    }

    public function addTask(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $task = new Task();
            $task->name = $request->name;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->user_id = $request->user_id;
            $task->assign = $request->assign;

            $task->save();
            return response()->json($task);
        }
    }

    public function editTask(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $task = Task::findOrFail($request->id);
            $task->name = $request->name;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->assign = $request->assign;

//            $createdBy = User::find($task->user_id)->name;
//            $assignedFor = User::find($task->assign)->name;
            $task->update();
            return response()->json($task);
        }
    }

    public function deleteTask(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->delete();

        return response()->json($task);
    }

}
