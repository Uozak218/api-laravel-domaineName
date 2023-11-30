<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hebergeur;

class HebergeurController extends Controller
{
    public function store(Request $request)
    {
        $donne = $request->validate([
            "nom" => ["required", "string"],
            "adresse" => ["required", "string"],
            "email" => ["required", "string"],
        ]);

        $var = Hebergeur::create([
            "nom" => $donne["nom"],
            "adresse" => $donne["adresse"],
            "email" => $donne["email"]
        ]);

        return response($var, 201);
    }

    public function get_All_Costs()
    {
        $hebergeurs = Hebergeur::all();

        return response($hebergeurs, 201);
    }

    public function get_Cost($hebergeur_id)
    {
        $var = Hebergeur::find($hebergeur_id);

        return response($var, 201);
    }

    public function update(Request $request, $hebergeur_id)
    {
        $var = Hebergeur::find($hebergeur_id);

        if ($var) {
            $var->update([
                'nom' => $request->input('nom'),
                'adresse' => $request->input('adresse'),
                'email' => $request->input('email')
            ]);
            return response(["message" => "Plan mis à jour avec succès"], 201);
        }
    }

    public function destroy($hebergeur_id)
    {
        $var = Hebergeur::find($hebergeur_id);

        if ($var) {
            $var->delete();
            return response(["message" => "Hebergeur supprime avec succès"], 201);
        } else {
            return response(["message" => "Hebergeur non trouve"], 401);
        }
    }

}
