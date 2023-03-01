<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $id)
    {
        // $url = Url::where("user_id", +$id)->latest()->get();
        return response(User::find($id)->urls, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUrlRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrlRequest $request)
    {
        //
        $rest = Url::create($request->all());
        return response($rest, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
        $url->increment("visits");
        return redirect($url->originalUrl);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrlRequest  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrlRequest $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        //
        $url->delete();
        return response("Successfull Deleted", Response::HTTP_OK);
    }
}
