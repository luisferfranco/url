<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
  public function show($liga) {
    $ligaExists = Liga::where('personalizado', $liga)->exists();
    if ($ligaExists) {
      $liga = Liga::where('personalizado', $liga)->first();
      return redirect($liga->original);
    }

    $ligaExists = Liga::where('corto', $liga)->exists();

    if ($ligaExists) {
      $liga = Liga::where('corto', $liga)->first();
      return redirect($liga->original);
    } else {
      return redirect('/')->with('error', "La liga acortada <span class='font-bold'>{$liga}</span> no existe");
    }
  }
}
