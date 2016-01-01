<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Application;
use Auth;

class ApplicationController extends Controller {

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

        $apps = $this->em->getRepository("App\Entity\Application")->findAll();
        return view('application.index')->with(
                        'apps', $apps
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return View('application.create')->with(
                        'customers', $this->arrayCustomers()
        );
    }

    private function arrayCustomers() {
        $customers = $this->em->getRepository("App\Entity\Customer")->findAll();
        foreach ($customers as $c) {
            $arrC[$c->id] = $c->stand;
        }
        return $arrC;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request) {
        $app = new Application();
        $app->__set("name", $request->name);
        $customer = $this->em->getRepository("App\Entity\Customer")->find($request->customer_id);
        $app->__set("customer", $customer);
        $app->__set("description", $request->description);
        $app->__set("status", $request->status);
        $this->em->persist($app);
        $this->em->flush();
        flash('The application has been created')->important();
        return \Redirect::route('app_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $app = $this->em->getRepository("App\Entity\Application")->find($id);
        return view('application.view')->with('ire_app', $app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $app = $this->em->getRepository("App\Entity\Application")->find($id);
        return view('application.create')->with('ire_app', $app)->with(
                        'customers', $this->arrayCustomers());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, $id) {
        $app = $this->em->getRepository("App\Entity\Application")->find($id);
        $app->__set("name", $request->name);
        $customer = $this->em->getRepository("App\Entity\customer")->find($request->customer_id);
        $app->__set("customer", $customer);
        $app->__set("description", $request->description);
        $app->__set("status", $request->status);
        $this->em->merge($app);
        $this->em->flush();
        flash('The application has been updated')->important();
        return \Redirect::route('app_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $app = $this->em->getRepository("App\Entity\Application")->find($id);
        $this->em->remove($app);
        $this->em->flush();
        flash('The application has been deleted')->important();
        return \Redirect::route('app_index');
    }

}
