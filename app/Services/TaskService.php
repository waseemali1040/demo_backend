<?php


namespace App\Services;


use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TaskService
{

    public function creatTask($request)
    {
        $validator = Validator::make($request->all(), [
            'task_title' => 'required|unique:tasks',
            'task_date' => 'required',
        ]);

        if ($validator->fails()) {
            return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::FAILED,$validator->messages()->first());
        }
        $task = new Task();
        $task->task_title = $request->task_title;
        $task->task_date = $request->task_date;
        $task->save();
        return (new GlobalApiResponse())->success('Task created Succesfully',1);

    }
    public function getTasksList(){
        $tasks= Task::select('*')->orderBy('created_at', 'DESC')->get();
        $datatable = Datatables::of($tasks)->rawColumns(['content']);
        return (new GlobalApiResponse())->success('To Do list',1,collect($datatable->make(true)->getData()));
    }


}
