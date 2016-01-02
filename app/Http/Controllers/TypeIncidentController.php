<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCatalogRequest;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Type_Incident;

class TypeIncidentController extends Controller {

    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $types = $this->em->getRepository("App\Entity\Type_Incident")->findAll();
        return view('typeincident.index')->with(
                        'typeIncidents', $types
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('typeincident.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatalogRequest $request) {
        $typeIncident = new Type_Incident();
        $typeIncident->__set("description",$request->description);
        $typeIncident->__set("status",$request->status);
        $this->em->persist($typeIncident);
        $this->em->flush();
         flash('Your type of incident has been created')->important();        
        return \Redirect::route('typeincident_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $typeIncident = new Type_Incident();
        $typeIncident = $this->em->getRepository("App\Entity\Type_Incident")->find($id);
        return view('typeincident.view')->with('typeincident', $typeIncident);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $typeIncident = new Type_Incident();
        $typeIncident = $this->em->getRepository("App\Entity\Type_Incident")->find($id);
        return view('typeincident.create')->with('typeincident', $typeIncident);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $typeIncident = $this->em->getRepository("App\Entity\Type_Incident")->find($id);
        $typeIncident->__set("description", $request->description);
        $typeIncident->__set("status", $request->status);
        $this->em->merge($typeIncident);
        $this->em->flush();
        flash('Your type incident has been updated')->important();
        return \Redirect::route('typeincident_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $typeIncident = $this->em->getRepository("App\Entity\Type_Incident")->find($id);
        $this->em->remove($typeIncident);        
        $this->em->flush();    
        flash('Your type incident has been deleted')->important();
        return \Redirect::route('typeincident_index');    
    }

}
