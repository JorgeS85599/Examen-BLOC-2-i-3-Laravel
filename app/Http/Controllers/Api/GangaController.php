<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ganga;
use Illuminate\Http\Request;
use App\Http\Requests\GangaRequest;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['index','show']]);
    }

    public function index()
    {
        $gangas = Ganga::get();
        return response()->json($gangas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GangaRequest $request)
    {
        $ganga = new Ganga();
        $ganga->title = $request->title;
        $ganga->price = $request->price;
        $ganga->discount_price = $request->dprice;
        $ganga->id_category = $request->category;
        $ganga->points = $request->points;
        $ganga->description = $request->description;
        $ganga->url = $request->url;
        $ganga->available = 1;
        $ganga->save();
        return response()->json($ganga,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function show(Ganga $ganga)
    {
        return response()->json($ganga,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function update(GangaRequest $request, Ganga $ganga)
    {
        $ganga->title = $request->title;
        $ganga->price = $request->price;
        $ganga->discount_price = $request->dprice;
        $ganga->id_category = $request->category;
        $ganga->points = $request->points;
        $ganga->description = $request->description;
        $ganga->available = $request->available;
        $ganga->save();
        return response()->json($ganga,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ganga $ganga)
    {
        $copyGanga = $ganga;
        $ganga->delete();
        return response()->json($copyGanga,203);
    }
}
