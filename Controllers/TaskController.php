<?php

namespace App\Controllers;

use App\core\Classes\Auth;
use App\core\Classes\CurlHelper;
use App\core\Classes\Validator;

class TaskController extends BaseController
{
    public function index()
    {
        $data['title'] = 'All Tasks';

        $curlResponse = CurlHelper::get("user/tasks");
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "All tasks fetched successfully") {
            $data['tasks'] = $response->data;

            $curlResponse = CurlHelper::get("user/users");
            $response = CurlHelper::asObject($curlResponse);
            if ($response && $response->status === "success" && empty($response->error) && $response->message === "Users fetched successfully") {
                $data['users'] = $response->data;
            } else return view('components/common/item-not-found', $data);
        }

        return view('tasks/index', $data);
    }
    public function create()
    {
        $data['title'] = 'Add Task';
        $curlResponse = CurlHelper::get("user/users");
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "Users fetched successfully") {
            $data['users'] = $response->data;
        } else return view('components/common/item-not-found', $data);
        return view('tasks/add', $data);
    }
    public function store()
    {
        $rules = [
            'task'                  => ['required', 'string'],
            'description'           => ['required', 'string'],
            'due_date'              => ['required', 'date'],
            'assigned_to'           => ['required', 'numeric'],
            'assigned_start_date'   => ['required', 'datetime'],
            'assigned_end_date'     => ['required', 'datetime'],
            'assigner_note'         => ['required', 'string'],
            'milestone'             => ['required', 'string'],
            'priority'              => ['required', 'string'],
        ];

        if (!Validator::make($this->sanitizedPost, $rules)) {
            $data['errors'] = Validator::errors();
            $data['old'] = $this->sanitizedPost;
            return redirectBack($data);
        }

        $this->sanitizedPost['assignee_note'] = "";
        $this->sanitizedPost['assigned_by'] = Auth::user()->id;

        $curlResponse = CurlHelper::post("user/tasks", $this->sanitizedPost);
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "Task created successfully") {
            return redirectTo(routeTo('user.tasks.add', ['id' => $response->data->id]), ['success' => "Task Created Successfully"]);
        }
        return redirectTo(routeTo('user.tasks.add'), ['failed' => "Unable to Create Task"]);
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Task';
        $curlResponse = CurlHelper::get("user/tasks/{$id}");
        $response = CurlHelper::asObject($curlResponse);

        if ($response && $response->status === "success" && empty($response->error) && $response->message === "Task fetched successfully") {
            $data['task'] = $response->data;

            $curlResponse = CurlHelper::get("user/users");
            $response = CurlHelper::asObject($curlResponse);
            if ($response && $response->status === "success" && empty($response->error) && $response->message === "Users fetched successfully") {
                $data['users'] = $response->data;
            } else return view('components/common/item-not-found', $data);
        } else return view('components/common/item-not-found', $data);

        return view('tasks/edit', $data);
    }
    public function update($id)
    {
        $rules = [
            'start_date'            => ['required', 'datetime'],
            'end_date'              => ['required', 'datetime'],
            'assignee_note'         => ['required', 'string'],
        ];

        if (in_array(Auth::user()->id, [1, 2])) {
            $rules['task']                  = ['required', 'string'];
            $rules['description']           = ['required', 'string'];
            $rules['due_date']              = ['required', 'date'];
            $rules['assigned_to']           = ['required', 'numeric'];
            $rules['assigned_start_date']   = ['required', 'datetime'];
            $rules['assigned_end_date']     = ['required', 'datetime'];
            $rules['assigned_by']           = ['required', 'numeric'];
            $rules['assigner_note']         = ['required', 'string'];
            $rules['milestone']             = ['required', 'string'];
            $rules['priority']              = ['required', 'string'];
        }

        if (!Validator::make($this->sanitizedPost, $rules)) {
            $data['errors'] = Validator::errors();
            $data['old'] = $this->sanitizedPost;
            return redirectBack($data);
        }

        $curlResponse = CurlHelper::put("user/tasks/{$id}", $this->sanitizedPost);
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "Task updated successfully") {
            return redirectTo(routeTo('user.tasks.edit', ['id' => $id]), ['success' => "Task Updated Successfully"]);
        }
        return redirectTo(routeTo('user.tasks.edit', ['id' => $id]), ['failed' => $response->error ?? "Unable to Update Task"]);
    }
}
