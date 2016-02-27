<?php

/**
 * User controller 
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

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Entity\User;
use Mail;

class UserController extends Controller {

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
        $users = $this->em->getRepository("App\Entity\User")->findAll();
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('user.create')
                        ->with('customers', $this->arrayCustomers())
                        ->with('typeusers', $this->arrayTypeUsers());
    }

    private function arrayCustomers() {
        $customers = $this->em->getRepository("App\Entity\Customer")->findAll();
        foreach ($customers as $c) {
            $arrC[$c->id] = $c->stand;
        }
        return $arrC;
    }

    private function arrayTypeUsers() {
        $typeUsers = $this->em->getRepository("App\Entity\Type_User")->findAll();
        foreach ($typeUsers as $c) {
            $arrC[$c->id] = $c->description;
        }
        return $arrC;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        $user = new User($this->em);
        $user->__set("name", $request->name);
        $user->__set("email", $request->email);
        $user->setPassword($request->password);
        $user->__set("status", $request->status);
        $customer = $this->em->getRepository("App\Entity\Customer")->find($request->customer);
        $typeUser = $this->em->getRepository("App\Entity\Type_User")->find($request->type_user);
        $user->__set("customer", $customer);
        $user->__set("type_user", $typeUser);
        $this->em->persist($user);
        $this->em->flush();
        Mail::send('email.newuser', ['name' => $user->__get("name")], function($message) use ($user) {
            $message->to($user->__get("email"), $user->__get("name"))->subject('Welcome to IREMA!');
        });
        flash('The user has been created')->important();
        return \Redirect::route('user_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = new User();
        $user = $this->em->getRepository("App\Entity\User")->find($id);
        return view('user.view')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = new User();
        $user = $this->em->getRepository("App\Entity\User")->find($id);
        return view('user.create')
                        ->with('customers', $this->arrayCustomers())
                        ->with('typeusers', $this->arrayTypeUsers())
                        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id) {
        $user = $this->em->getRepository("App\Entity\User")->find($id);
        $user->__set("name", $request->name);
        $user->__set("email", $request->email);
        $user->__set("status", $request->status);
        $customer = $this->em->getRepository("App\Entity\Customer")->find($request->customer);
        $typeUser = $this->em->getRepository("App\Entity\Type_User")->find($request->type_user);
        $user->__set("customer", $customer);
        $user->__set("type_user", $typeUser);
        $this->em->merge($user);
        $this->em->flush();
        flash('The user has been updated')->important();
        return \Redirect::route('user_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = $this->em->getRepository("App\Entity\User")->find($id);
        $user->__set("status", 0);
        $this->em->merge($user);
        $this->em->flush();
        flash('The user has been deleted')->important();
        return \Redirect::route('user_index');
    }

}
