<?php

namespace App\Http\Controllers;

use App\Http\Resources\userdata as userdataResource;
use App\userdata;
use Illuminate\Http\Request;

class userdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = userdata::paginate(25);

        return userdataResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = $request->isMethod('put') ? userdata::findOrFail($request->id) : new userdata;

        if ($request->input('id')) {
            $data->id = $request->input('id');
        }
        $data->state = $request->input('state');
        $data->consumerno = $request->input('consumerno');
        $data->username = $request->input('username');
        $data->fname = $request->input('fname');
        $data->lname = $request->input('lname');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->mobile = $request->input('mobile');
        $data->address = $request->input('address');
        if ($request->input('role')) {
            $data->role = $request->input('role');
        }

        if ($data->save()) {
            return new userdataResource($data);
        } else {
            return $this->response->errorNotFound('User data Not Found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = userdata::findorfail($id);
        return new userdataResource($data);
        if (!$data) {
            return $this->response->errorNotFound('User data Not Found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = userdata::findorfail($id);
        if ($data->delete()) {
            return new userdataResource($data);
        }
        if (!$data) {
            return "User data Not Found";
        }
    }
}
