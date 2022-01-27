<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Ganga;
use App\Http\Requests\GangaRequest;
use Illuminate\Http\Request;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
        $this->middleware('premium',['except' => ['index','show']]);

    }
    public function index()
    {
        
    }

    /**    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('gangas.form', compact('categories'));
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
        $ganga->title = $request->get('title');
        $ganga->price = $request->get('price');
        $ganga->discount_price = $request->get('dprice');
        $ganga->id_category = $request->get('category');
        $ganga->points = $request->get('points');
        $ganga->description = $request->get('description');
        $ganga->url = $request->get('url');
        $ganga->available = 1;
        $ganga->save();
        return redirect()->route('ganga.show', $ganga->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gang = Ganga::find($id);
        return view('ganga',compact('gang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $ganga = Ganga::findOrFail($id);
        return view('gangas.form',compact('ganga','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GangaRequest $request, $id)
    {
        $ganga = Ganga::find($id);
        $ganga->title = $request->get('title');
        $ganga->price = $request->get('price');
        $ganga->discount_price = $request->get('dprice');
        $ganga->id_category = $request->get('category');
        $ganga->points = $request->get('points');
        $ganga->description = $request->get('description');
        $ganga->save();
        return redirect()->route('ganga.show', $ganga->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ganga = Ganga::findOrFail($id);
        $ganga->delete();
        return redirect('/');
    }

    public function indexOfDiscountPrice()
    {
        $categories = Categorie::all();
        $gangas = Ganga::orderByRaw('(price - discount_price) Desc')->take(8)->get();
        $collection = collect($gangas)->sortDesc();
        $grouped = $collection->groupBy('id_category'); 
        $grouped->all();
        return view('main',compact('grouped','categories'));
    }
}
