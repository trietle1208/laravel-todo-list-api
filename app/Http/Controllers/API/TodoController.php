<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoCollection;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }

    public function addTask(Request $request)
    {
        $todo = Todo::create([
            'content' => $request->content,
            'checked' => 0,
            'completed' => 0,
        ]);

        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }
    public function deleteTask(Request $request)
    {
        $todo = Todo::find($request->id)->delete();

        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }

    public function deleteAllTask(Request $request)
    {
        foreach($request->params as $param) {
            if($param['checked'] == 1){
                $todo = Todo::find($param['id'])->delete();
            }
        }
        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }

    public function checkAll(Request $request)
    {
        if($request->flag == 1){
            foreach($request->params as $param){
                $todo = Todo::find($param->id)->update([
                    'checked' => 1,
                ]);
            }
        }else{
            foreach($request->params as $param){
                $todo = Todo::find($param->id)->update([
                    'checked' => 0,
                ]);
            }
        }
        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }

    public function doneAllTask(Request $request)
    {
        foreach($request->params as $param) {
            if($param['checked'] == 1){
                $todo = Todo::find($param['id'])->update([
                    'completed' => 1,
                    'checked' => 0,
                ]);
            }
        }
        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }
}
