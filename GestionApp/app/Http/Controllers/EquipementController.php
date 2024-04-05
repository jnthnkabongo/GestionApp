<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEquipement;
use App\Models\Equipements;
use App\Models\EquipementType;
use App\Models\Region;
use App\Models\Site;
use App\Models\State;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $state_equipement = State::orderBy('intitule')->get();
        $equipement_type = EquipementType::orderBy('intitule')->get();
        $site_liste = Site::orderBy('site')->get();
        $region_liste = Region::orderBy('nom')->get();
        $liste_equipements = Equipements::with('State', 'Site', 'Region')->orderBydesc('id')->paginate(10);
        return view('administration.page.Equipement.index', compact('liste_equipements','site_liste', 'region_liste','equipement_type','state_equipement'));

    }

    public function indexOperation()
    {
        return view('administration.page.Operation.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createquipement()
    {
        $state_equipement = State::orderBy('intitule')->get();
        $equipement_type = EquipementType::orderBy('intitule')->get();
        $site_liste = Site::orderBy('site')->get();
        $region_liste = Region::orderBy('nom')->get();
        return view('administration.page.Equipement.create', compact('site_liste', 'region_liste','equipement_type','state_equipement'));
    }
    public function create(Equipements $Equipements, SaveEquipement $request)
    {
        try {
            $Equipements->equipement = $request->equipement;
            $Equipements->serialnumber = $request->serialnumber;
            $Equipements->productnumber = $request->productnumber;
            $Equipements->equipementtype = $request->equipementtype;
            $Equipements->location_id = $request->location_id;
            $Equipements->site_id = $request->site_id;
            $Equipements->state_id = $request->state_id;
            $Equipements->available = $request->available;
            $Equipements->feedback = $request->feedback;
            $Equipements->observation = $request->observation;
            $Equipements->save();
            //dd($Equipements);
            return redirect()->route('liste-equipement')->with('message','Operation reussi !');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
