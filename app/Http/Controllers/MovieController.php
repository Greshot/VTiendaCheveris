<?php

namespace VTienda\Http\Controllers;

use Illuminate\Http\Request;

use VTienda\Http\Requests;
use VTienda\Movie;
use Redirect;

class MovieController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('Movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'titulo' => 'required|unique:movies',
            'descripcion' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required'
        ]);
        $movie = new Movie();
        $movie->fill($request->all());
        $movie->save();

        return redirect('/movie')->with('message', '¡Pelicula Almacenada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return response()->json($movie->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('Movie.edit', compact('movie'));
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
        $validate = Movie::find($id);
        if ($validate->titulo == $request['titulo']) {
            $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required'
            ]);
        } else {
            $this->validate($request, [
            'titulo' => 'required|unique:movies',
            'descripcion' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required'
            ]);
        }
        $movie = Movie::find($id);
        $movie->fill($request->all());
        $movie->save();

        return Redirect::to('/movie')->with('message', '¡Pelicula editada correctamente!');
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
    }
}
