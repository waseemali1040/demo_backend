<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class TasksController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;

    }

//get task list
    public function getTasksList()
    {
        $res = $this->taskService->getTasksList();
        return $res;
    }

//create new task
    public function creatTask(Request $request)
    {

        $res = $this->taskService->creatTask($request);
        return $res;

    }
}
