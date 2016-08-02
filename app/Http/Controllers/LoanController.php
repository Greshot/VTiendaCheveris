<?php

namespace VTienda\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use VTienda\Http\Requests;
use VTienda\Loan;
use VTienda\Movie;
use VTienda\Client;
use Redirect;
use VTienda\User;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::with('client', 'movies')->get();
        return view('Loan.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $clientdropdown = Client::dropdown();
        return view('Loan.create', compact('movies', 'clientdropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required',
            'client_id' => 'required',
            'idP' => 'required',
            'cantidadP' => 'required'
        ]);

        $movies_ids = $request['idP'];
        $quantityM = $request['cantidadP'];
        foreach ($movies_ids as $key => $id) {
            $movie = Movie::find($id);
            $movie->cantidad = $movie->cantidad - $quantityM[$key];
            $movie->save();
            $movies [$id] = [
                'cantidad' => $quantityM[$key]
            ];
        }
        $loan = Loan::create([
            'fecha' => $request['fecha'],
            'client_id' => $request['client_id']
        ]);

        $loan->movies()->attach($movies);

        return redirect('/loan')->with('message', '¡Prestamo generado éxitosamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = loan::with('client', 'movies')->find($id);
        return response()->json(
            view('Loan.loan', compact('loan'))->render()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = loan::find($id);
        return view('loan.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bestClient()
    {
        if (Loan::count() > 0) {
            $loans = Loan::select('client_id', DB::raw('COUNT(client_id) as count'))
                ->groupBy('client_id')
                ->orderBy('count', 'desc')
                ->take(1);
            $bestClientByLoans = Client::with('loans', 'loans.movies')->find($loans->first()->client_id);
        }
        return view('Loan.bestClient', compact('bestClientByLoans'));

    }

}
