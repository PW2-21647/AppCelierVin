<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\ListeBouteille;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $celliers = Cellier::select()->where('user_id', Auth::user()->id)->get();
        $utilisateur = Auth::user();
      
        return view("dashboard", ['celliers'=>$celliers, 'utilisateur'=>$utilisateur]);
    }



  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
 
        return view('cellier.create');
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
        $request->validate([
            'nom' => 'required|max:8',
        ]);


        $cellier = Cellier::create([
            'nom'=>$request->nom,
            'user_id'=> Auth::user()->id
        ]);


        return redirect(route('dashboard'))->withSuccess('Nouveau cellier créé'); 
    }



     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Cellier $cellier){

        $bouteilles = ListeBouteille::with('bouteilles')
             ->join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
             ->select('bouteilles.*', 'liste_bouteilles.qte')
             ->where('cellier_id', $cellier->id)
             ->get();
  
        return view('cellier.show', ['bouteilles' => $bouteilles, 'cellier'=>$cellier]);
    }


    public function edit( Cellier $cellier){
      
        return view("cellier.edit", ['cellier' => $cellier]);
    }





    public function update(Request $request, Cellier $cellier){
// return $request;
        $request->validate([
            'nom' => 'required|max:8',
        ]);

        $cellier->update([
            'nom'=>$request->nom,
            
        ]);
        // return redirect()->back();
        return redirect(route('dashboard'))->withSuccess('Cellier modifie'); 
      }




    public function destroy( Cellier $cellier)
    {
        $cellier->delete();
        return redirect(route('dashboard'))->withSuccess('Cellier supprimay'); 
    }



     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function changeQte(Request $request){
        // $bouteille = DB::table('liste_bouteilles')
        //     ->select('*')
        //     ->where('cellier_id', $request->idC)
        //     ->andWhere('bouteille_id', $request->idB)
        //     ->get();
        
        //return $request->qte;
        
        
        // $bouteille = ListeBouteille::where([
        //     'cellier_id' => $request->cellier,
        //     'bouteille_id' => $request->bouteille,
        // ])->first();


        //return $bouteille;
        DB::statement("UPDATE liste_bouteilles SET qte = $request->qte WHERE bouteille_id = $request->bouteille AND cellier_id = $request->cellier;");
        
        
        //return $bouteille;

        // if ($bouteille) {
        //     $bouteille->update([
        //         'qte' => $request->qte,
        //     ]);
        // }
    
        // $test=$request->qte;

        // return response()->json([
        //     "status"=>200,
        //     "reponse"=>$test
        // ]);
    }



 }