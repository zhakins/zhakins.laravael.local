<?php

namespace App\Http\Controllers;

use App\models\Task;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewTaskController extends Controller
{
    protected $user_id;

    /**
     * TaskController constructor.
     * @param $user
     */
    public function __construct(Guard $user)
    {
        $this->user_id = $user->id();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////$tasks=[];
        return view('task.index',[
            'tasks'=>Task::getTaskByUser($this->user_id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'task'=>'required|max:255'

        ] );
        $request->user()->tasks()->create([
            'name'=>$request->task
        ]);
        return redirect(route('newTask.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Task $task)
    {
        //
        return view('task.edit',[
            'task'=>$task->where('id','=',$id)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Task $task)
    {
        //
        $this->validate($request,[
            'task'=>'required|max:255'

        ] );

        $update = $task->where('id','=',$id)->firstOrFail();
        $this->authorize('destroy',$update);

        $update->name=$request->task;

        $update->save();
        return redirect(route('newTask.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Task $task)
    {
        $task=$task->where('id','=',$id)->firstOrFail();
        $this->authorize('destroy',$task);
        $task->delete();
        return response()->json(['success'=>'ok']);
        //
    }
}
