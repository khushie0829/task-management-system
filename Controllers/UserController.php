<?php

namespace App\Controllers;

use App\core\Classes\CurlHelper;
use App\core\Classes\Validator;

class UserController extends BaseController
{
    public function index()
    {
        $data['title'] = 'All Users';

        $curlResponse = CurlHelper::get("user/users");
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "Users fetched successfully") {
            $data['users'] = $response->data;
        } else return view('components/common/item-not-found', $data);
        return view('users/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Add User';
        return view('users/add', $data);
    }
    public function store()
    {
        $rules = [
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'phone'     => ['required', 'phone'],
            'password'  => ['required', 'string'],
        ];

        // if (!Validator::make($this->sanitizedPost, $rules)) {
        if (!Validator::make($this->sanitizedPost, $rules)) {
            $data['errors'] = Validator::errors();
            $data['old'] = $this->sanitizedPost;
            return redirectBack($data);
        }

        $this->sanitizedPost['phone_no'] = $this->sanitizedPost['phone'];
        unset($this->sanitizedPost['phone']);
        $curlResponse = CurlHelper::post("user/users", $this->sanitizedPost);
        $response = CurlHelper::asObject($curlResponse);
        // echo "<pre>";print_r($response); exit;
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "User created successfully") {
            return redirectTo(routeTo('user.users'), ['success' => "User Created Successfully"]);
        }
        return redirectTo(routeTo('user.users'), ['failed' => $response->error ?? "Unable to Create User"]);
    }
    public function edit($id)
    {
        $data['title'] = 'Edit User';

        $curlResponse = CurlHelper::get("user/users/{$id}");
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "User fetched successfully") {
            $data['user'] = $response->data;
        } else return view('components/common/item-not-found', $data);
        return view('users/edit', $data);
    }
    public function update($id)
    {
        $rules = [
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'phone'     => ['required', 'phone'],
            'password'  => ['string'],
        ];

        if (!Validator::make($this->sanitizedPost, $rules)) {
            $data['errors'] = Validator::errors();
            $data['old'] = $this->sanitizedPost;
            return redirectBack($data);
        }

        $this->sanitizedPost['phone_no'] = $this->sanitizedPost['phone'];
        unset($this->sanitizedPost['phone']);
        if (empty($this->sanitizedPost['password'])) unset($this->sanitizedPost['password']);
        $curlResponse = CurlHelper::put("user/users/{$id}", $this->sanitizedPost);
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && empty($response->error) && $response->message === "User updated successfully") {
            return redirectTo(routeTo('user.users.edit', ['id' => $id]), ['success' => "User Updated Successfully"]);
        }
        return redirectTo(routeTo('user.users.edit', ['id' => $id]), ['failed' => $response->error ?? "Unable to Update User"]);
    }
}
