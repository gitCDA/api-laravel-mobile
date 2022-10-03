<?php

namespace App\Http\Controllers;

use App\Http\Resources\Topicality as ResourcesTopicality;
use App\Models\Topicality;
use Illuminate\Http\Request;

class TopicalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $topicalities = Topicality::all();
        // return $topicalities->toJson(JSON_PRETTY_PRINT);

        // Laravel comprend directement qu'il faut sérialiser en JSON
        // return Topicality::all();

        // return Topicality::orderByDesc('created_at')->get();
        return ResourcesTopicality::collection(Topicality::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // all() = assignement de masse donc il faut paramétrer le model pour spécifier les colonnes à remplir
        if ( Topicality::create($request->all()) ) {
            
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function show(Topicality $topicality)
    {
        // return $topicality ;
        return new ResourcesTopicality($topicality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topicality $topicality)
    {
        
        if ( $topicality->update($request->all()) ) {
            
            return response()->json([
                'success' => 'Actualité modifiée avec succès'
            ], 200);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topicality $topicality)
    {
        $topicality->delete() ;
    }
}
