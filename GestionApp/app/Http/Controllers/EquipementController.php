<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveAffectation;
use App\Http\Requests\SaveEquipement;
use App\Models\affectation;
use App\Models\Equipements;
use App\Models\EquipementType;
use App\Models\EtatAffectation;
use App\Models\Region;
use App\Models\Site;
use App\Models\Staff;
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
        $liste_equipements = Equipements::with('State', 'Site', 'Region','Equipement')->orderBydesc('id')->paginate(10);
        return view('administration.page.Equipement.index', compact('liste_equipements','site_liste', 'region_liste','equipement_type','state_equipement'));

    }

    /**
     * Show the form for creating a new resource.
     */
    // Le route qui renvoi le formulaire de création d'un équipement
    public function createquipement()
    {
        $state_equipement = State::orderBy('intitule')->get();
        $equipement_type = EquipementType::orderBy('intitule')->get();
        $site_liste = Site::orderBy('site')->get();
        $region_liste = Region::whereNotNull('nom')->orderBy('nom')->with('Regions')->get();
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
    public function store(Equipements $item)
    {
        $site_liste = Site::all();
        $region_liste = Region::all();
        $state_equipement = State::all();
        $equipement_type = EquipementType::all();
        //$item = Equipements::with(['Site', 'State', 'Region','Equipement'])->find($item);
        //dd($item);
        //return view('administration.page.Equipement.modifier', compact('item','equipement_type','state_equipement','region_liste','site_liste'));
        //$relations = Equipements::with('State', 'Site', 'Region','Equipement');
        //$state_equipement = State::orderBy('intitule')->get();
        //$equipement_type = EquipementType::orderBy('intitule')->get();
        //$site_liste = Site::orderBy('site')->get();
        //$region_liste = Region::orderBy('nom')->get();
        return view('administration.page.Equipement.modifier', compact('item','site_liste', 'region_liste','equipement_type','state_equipement'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipements $item)
    {
        $state_equipement = State::orderBy('intitule')->get();
        $equipement_type = EquipementType::orderBy('intitule')->get();
        $site_liste = Site::orderBy('site')->get();
        $region_liste = Region::orderBy('nom')->get();
        return view('administration.page.Equipement.detail', compact('site_liste', 'region_liste','equipement_type','state_equipement','item'));

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

    //Liste des matériles affectés
    public function indexOperation()
    {
        $liste_affecattion = affectation::with('EquipementAffect','Site','Region','Staff','Operation')->where('operation','=','1')->orderBy('operation')->paginate(10);
        return view('administration.page.Operation.index', compact('liste_affecattion'));
    }

    //Les fonction d'affectation
    public function affectation(Equipements $item){
        $state_equipement = State::orderBy('intitule')->get();
        $equipement_type = EquipementType::orderBy('intitule')->get();
        $site_liste = Site::orderBy('site')->get();
        $region_liste = Region::orderBy('nom')->get();
        $etat_affectation = EtatAffectation::orderBy('intitule')->get();
        $liste_staff = Staff::orderBy('names')->get();
        //dd($liste_staff);
        return view('administration.page.Operation.affectation', compact('site_liste', 'region_liste','equipement_type','state_equipement','item','etat_affectation','liste_staff'));
    }

    //Affectation d'une machine
    public function affectation_equipement(affectation $Affectation, saveAffectation $request){
        try {
            $Affectation->operation = $request->operation;
            $Affectation->useraffected = $request->useraffected;
            $Affectation->location = $request->location;
            $Affectation->site = $request->site;
            $Affectation->reason = $request->reason;
            $Affectation->equipement_id = $request->equipement_id;
            //dd($Affectation);
            $Affectation->save();
            return redirect()->route('liste-operation')->with('message','Operation reussi !');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
