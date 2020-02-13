<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adherent;

class AdherentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $adherents = Adherent::all();

        return view('adherents.index', ['adherents' => $adherents]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $adherent = Adherent::find($id);

        return view('adherents.show', ['adherent' => $adherent]);
    }

}
