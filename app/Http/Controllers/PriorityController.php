<?php

/**
 * Priority controller 
 *
 *
 * PHP version 5
 *
 * @package    App\Entity
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version    1.0
 * @link       http://hightechcoders.com/apps/irema2/
 * @since      1.0
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogRequest;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Priority;

class PriorityController extends Controller {

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
        $priorities = $this->em->getRepository("App\Entity\Priority")->findAll();
        return view('priority.index')->with(
                'priorities', $priorities
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatalogRequest $request) {
        $priority = new Priority();
        $priority->__set("description", $request->description);
        $priority->__set("status", $request->status);
        $priority->__set("time_priority", $request->time_priority);
        $this->em->persist($priority);
        $this->em->flush();

        flash('Your priority has been created')->important();
        
        return \Redirect::route('priority_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $priority = new Priority();
        $priority = $this->em->getRepository("App\Entity\Priority")->find($id);
        return view('priority.view')->with('priority', $priority);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $priority = new Priority();
        $priority = $this->em->getRepository("App\Entity\Priority")->find($id);
        return view('priority.create')->with('priority', $priority);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreateCatalogRequest $request) {
        $priority = $this->em->getRepository("App\Entity\Priority")->find($id);
        $priority->__set("description", $request->description);
        $priority->__set("time_priority", $request->time_priority);
        $priority->__set("status", $request->status);
        $this->em->merge($priority);
        $this->em->flush();
        flash('Your priority has been updated')->important();
        return \Redirect::route('priority_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CreateCatalogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $priority = $this->em->getRepository("App\Entity\Priority")->find($id);
        $this->em->remove($priority);        
        $this->em->flush();    
        flash('Your priority has been deleted')->important();
        return \Redirect::route('priority_index');    
    }

}
