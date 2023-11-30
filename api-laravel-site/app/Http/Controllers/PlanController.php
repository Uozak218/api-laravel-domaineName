<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function store(Request $request)
    {
        $donne = $request->validate([
            "nom" => ["required", "string"],
            "prix" => ["required", "string"],
            "dure" => ["required", "string"],
        ]);

        $plan = Plan::create([
            "nom" => $donne["nom"],
            "prix" => $donne["prix"],
            "dure" => $donne["dure"]
        ]);

        return response($plan, 201);
    }

    public function get_All_Plans()
    {
        $plans = Plan::all();

        return response($plans, 201);
    }

    public function get_Plan($plan_id)
    {
        $plan = Plan::find($plan_id);

        return response($plan, 201);
    }

    public function update(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);

        if ($plan) {
            $plan->update([
                'nom' => $request->input('nom'),
                'prix' => $request->input('prix'),
                'dure' => $request->input('dure')
            ]);
            return response(["message" => "Plan mis à jour avec succès"], 201);
        }
    }

    public function destroy($plan_id)
    {
        $plan = Plan::find($plan_id);

        if ($plan) {
            $plan->delete();
            return response(["message" => "Plan supprime avec succès"], 201);
        } else {
            return response(["message" => "Plan non trouve"], 401);
        }
    }
}
