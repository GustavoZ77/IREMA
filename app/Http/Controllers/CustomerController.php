<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Customer;


class CustomerController extends Controller {
    
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
        $customers = $this->em->getRepository("App\Entity\Customer")->findAll();
        return view('customer.index')->with(
                        'customers', $customers
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request) {
        $customer = new Customer();
        $customer->__set("name", $request->name);
        $customer->__set("email", $request->email);
        $customer->__set("stand", $request->stand);
        $customer->__set("phone", $request->phone);
        $customer->__set("address", $request->address);
        $customer->__set("status", $request->status);
        $this->em->persist($customer);
        $this->em->flush();
        flash('The customer has been created')->important();
        return \Redirect::route('customer_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $customer = new Customer();
        $customer = $this->em->getRepository("App\Entity\Customer")->find($id);
        return view('customer.view')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $customer = new Customer();
        $customer = $this->em->getRepository("App\Entity\Customer")->find($id);
        return view('customer.create')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id) {
        $customer = $this->em->getRepository("App\Entity\Customer")->find($id);
        $customer->__set("name", $request->name);
        $customer->__set("email", $request->email);
        $customer->__set("stand", $request->stand);
        $customer->__set("phone", $request->phone);
        $customer->__set("address", $request->address);
        $customer->__set("status", $request->status);
        $this->em->merge($customer);
        $this->em->flush();
        flash('The customer has been updated')->important();
        return \Redirect::route('customer_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $customer = $this->em->getRepository("App\Entity\Customer")->find($id);
        $this->em->remove($customer);        
        $this->em->flush();    
        flash('The customer has been deleted')->important();
        return \Redirect::route('customer_index');    
    }

}
