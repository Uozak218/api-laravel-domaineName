<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domaine;

class DomaineController extends Controller
{
    public function store(Request $request)
    {
        $donne = $request->validate([
            "nom" => ["required", "string"],
            "proprietaire" => ["required", "string"],
            "date_dachat" => ["required", "date"],
            "date_expiration" => ["required", "date"],
        ]);

        $domaine = Domaine::create([
            "nom" => $donne["nom"],
            "proprietaire" => $donne["proprietaire"],
            "date_dachat" => $donne["date_dachat"],
            "date_expiration" => $donne["date_expiration"],
        ]);

        return response($domaine, 201);
    }

    public function get_All_Domaines()
    {
        $domaines = Domaine::all();

        return response($domaines, 201);
    }

    public function get_Domaine($user_id)
    {
        $domaine = Domaine::find($user_id);

        return response($domaine, 201);
    }

    public function update(Request $request, $domaine_id)
    {
        $domaine = Domaine::find($domaine_id);

        if ($domaine) {
            $domaine->update([
                'nom' => $request->input('nom'),
                'proprietaire' => $request->input('proprietaire'),
                'date_dachat' => $request->input('date_dachat'),
                'date_expiration' => $request->input('date_expiration'),
            ]);
            return response(["message" => "Domaine mis à jour avec succès"], 201);
        }
    }

    public function destroy($domaine_id)
    {
        $domaine = Domaine::find($domaine_id);

        if ($domaine) {
            $domaine->delete();
            return response(["message" => "Domaine supprime avec succès"], 201);
        } else {
            return response(["message" => "Domaine non trouve"], 401);
        }
    }
}
