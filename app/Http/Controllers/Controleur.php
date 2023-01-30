<?php

namespace App\Http\Controllers;

use App\Models\mots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controleur extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function ajouter_premiere_lettre(request $request)
    {
        $request->validate([
            'nombre_de_lettre' => 'required',
            'premiere_lettre' => 'required',
        ]);
        $resultats = DB::table('tablename')->where('mots', 'like', $request->premiere_lettre.'%')->where(DB::raw('LENGTH(mots)'), $request->nombre_de_lettre)->take(50)->get();
        return view('page_secondaire', [
            'resultats' => $resultats,
            'premiere_lettre' => $request->premiere_lettre,
            'nombre_de_lettre' => $request->nombre_de_lettre,
        ]);
        
    }

    public function ajouter_lettre(request $request)
    {
        $test=0;
        $resultats = DB::table('tablename')->where('mots', 'like', $request->lettre[0].'%')->where(DB::raw('LENGTH(mots)'), $request->nombre_de_lettre)->get();
        for($key = 1; $key < $request->nombre_de_lettre; $key++) {
            if($request->lettre[$key] !== null) {
                foreach($resultats as $resultat) {
                    if(substr($resultat->mots, $key, 1) != $request->lettre[$key]) {
                        $resultats = $resultats->reject(function ($item) use ($resultat) {
                            return $item == $resultat;
                        });
                    }
                }
            }
        }

        for($key = 0; $key < 18; $key++) {
            if($request->lettre_incorrect[$key] !== null) {
                foreach($resultats as $resultat) {
                    if(strpos($resultat->mots, $request->lettre_incorrect[$key]) !== false) {
                        $resultats = $resultats->reject(function ($item) use ($resultat) {
                            return $item == $resultat;
                        });
                    }
                }
            } 
        }

        for($key = 0; $key < $request->nombre_de_lettre*6; $key++) {
            if($request->lettre_correct_mal_place[$key] !== null) {
                $longueur = $key;
                if(9<$key && $key<20){
                    $longueur = $key-10;
                }
                if(19<$key && $key<30){
                    $longueur = $key-20;
                }
                if(29<$key && $key<40){
                    $longueur = $key-30;
                }
                if(39<$key && $key<50){
                    $longueur = $key-40;
                }
                if(49<$key && $key<60){
                    $longueur = $key-50;
                }
                foreach($resultats as $resultat) {
                    if(substr($resultat->mots, $longueur, 1) == $request->lettre_correct_mal_place[$key]) {
                        $resultats = $resultats->reject(function ($item) use ($resultat) {
                            return $item == $resultat;
                        });
                    }
                    if(strpos($resultat->mots, $request->lettre_correct_mal_place[$key]) === false) {
                        $resultats = $resultats->reject(function ($item) use ($resultat) {
                            return $item == $resultat;
                        });
                    }
                }
            }
        }
        $test=0;
        foreach($resultats as $resultat) {
            $test++;
            echo $resultat->mots;
            echo "<br>";
        }

    }
    
}
