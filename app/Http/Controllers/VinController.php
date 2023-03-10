<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\ListeBouteille;

use Illuminate\Support\Facades\Auth;


class VinController extends Controller
{
    
    public function create(){
        $celliers= Cellier::select()->where('user_id', Auth::user()->id)->get();
      
        return view("bouteille.create", ['celliers'=>$celliers]);
    }



    public function store(Request $request){
        
// return $request;
        $request->validate([
            'nom' => 'required',
            // 'image'=> 'mimes:jpg, png' 
            'qte'=>'numeric|gt:0',
            'format'=>'numeric|gt:0',
            'prix'=>'numeric|gt:0',
            'cellier'=>'required'
       
        ]);

        // $file = $request->file('file');
        // $filename = $file->getClientOriginalName();

        
        // $file->storeAs('public/uploads', $filename);

        $bouteille = Bouteille::create([
            'nom'=>$request->nom,
            // 'image'=>$filename,
            'description'=>$request->description,
            'pays'=>$request->pays,
            'type'=>$request->type,
            'format'=>$request->format,
            'prix'=>$request->prix,
            

        ]);

        ListeBouteille::create([
            'bouteille_id'=>$bouteille->id,
            'cellier_id'=>$request->cellier,
            'qte'=>$request->qte
        ]);

        return redirect(route('dashboard'))->withSuccess('Nouvelle bouteille créé'); 
    }

    public function show(Cellier $cellier, Bouteille $bouteille ){

        $qte = ListeBouteille::select('qte')
                            ->where('cellier_id', $cellier->id)
                            ->where('bouteille_id', $bouteille->id)
                            ->get();
       
        return view("bouteille.show", ['bouteille' => $bouteille, 'cellier'=>$cellier, 'qte'=>$qte[0]]);
    }


    public function edit(Request $request, Bouteille $bouteille){
        return view("bouteille.edit");
    }
}
