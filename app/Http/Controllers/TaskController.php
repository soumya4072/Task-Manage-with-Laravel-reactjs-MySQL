<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskStoreRequest;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();

        //Return json response
        return response()->json([
            'results' =>$tasks

        ], 200);
    }

    public function store(TaskStoreRequest $request){
        try{

            //Task Create

            Task::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'duedate'=>$request->duedate,

            ]);

            //Return json response
            return response()->json([
                'message' =>'Task Created Successfully!'

            ], 500);

        }catch(\Exception $e){

            //Return json response
            return response()->json([
                'message' =>'Something went really wrong!'

            ], 500);

        }

    }

    public function taskUpdate(TaskStoreRequest $request, $id){
        try{

            $tasks = Task::find($id);

            if(!$tasks){
                return response()->json([
                    'message' =>'Task not found!'

                ], 500);

            }

            //Update Task

            $tasks->title = $request->title;
            $tasks->description = $request->description;
            $tasks->duedate = $request->duedate;
        }catch(\Exception $e){

             //Return json response
             return response()->json([
                'message' =>'Something went really wrong!'

            ], 500);
        }
    }

    public function show($id){
        $tasks = Task::find($id);
        if(!$tasks){
            return response()->json([
                'message'=>'Task Not Found'
            ], 404);
        }
        return response()->json([
            'tasks'=>$tasks
        ], 404);

    }

    public function taskDestroy($id){

        $tasks = Task::find($id);

        if(!$tasks){
            return response()->json([
                'message' =>'Task not found!'

            ], 500);

        }

        //Delete Task

        $tasks->delete();

        //Return json response
        return response()->json([
        'message' =>'Task Deleted Successfully!'

       ], 500);
    }
}
