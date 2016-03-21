<?php

/**
 * incident controller 
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

use App\Http\Requests\IncidentRequest;
use App\Http\Requests\WorkInProgressRequest;
use App\Http\Requests\CompleteRequest;
use Doctrine\ORM\EntityManagerInterface;
use App\Http\Controllers\Controller;
use App\Entity\Incident;
use Auth;

class IncidentController extends Controller {

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
        if (Auth::User()->type_user->description == "ADMIN") {
            $incidents = $this->em->getRepository("App\Entity\Incident")->findAll();
            return view('incident.index')->with(
                            'incidents', $incidents
            );
        } elseif (Auth::User()->type_user->description == "SUPPORT") {
            $incidents = $this->em->getRepository("App\Entity\Incident")->findAll();
            $nInc = null;
            foreach ($incidents as $in) {
                if ($in->asigned->id == Auth::User()->id) {
                    $nInc[] = $in;
                }
            }
            return view('incident.index')->with(
                            'incidents', $nInc
            );
        } elseif (Auth::User()->type_user->description == "USER") {
            $incidents = $this->em->getRepository("App\Entity\Incident")->findAll();
            $nInc = null;
            foreach ($incidents as $in) {
                if ($in->entered_by->id == Auth::User()->id) {
                    $nInc[] = $in;
                }
            }
            return view('incident.index')->with(
                            'incidents', $nInc
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('incident.create')
                        ->with("apps", $this->arrayApplication())
                        ->with("types", $this->arrayTypeIncident())
                        ->with("priorities", $this->arrayPriority())
                        ->with("asigned", $this->arrayUsers());
    }

    private function arrayCustomers() {
    	$arrC = array();
        $customers = $this->em->getRepository("App\Entity\Customer")->findAll();
        foreach ($customers as $c) {
            $arrC[$c->id] = $c->stand;
        }
        return $arrC;
    }

    private function arrayApplication() {
    	$arrC = array();
        $apps = $this->em->getRepository("App\Entity\Application")->findAll();
        foreach ($apps as $c) {
            if ($c->customer->id == Auth::User()->customer->id) {
                $arrC[$c->id] = $c->name;
            }
        }
        return $arrC;
    }

    private function arrayUsers() {
    	$arrC = array();
        $users = $this->em->getRepository("App\Entity\User")->findAll();
        foreach ($users as $c) {
            if ($c->type_user->id == 4) {
                $arrC[$c->id] = $c->name;
            }
        }
        return $arrC;
    }

    private function arrayPriority() {
    	$arrC = array();
        $priorities = $this->em->getRepository("App\Entity\Priority")->findAll();
        foreach ($priorities as $c) {
            $arrC[$c->id] = $c->description;
        }
        return $arrC;
    }

    private function arrayTypeIncident() {
    	$arrC = array();
        $types = $this->em->getRepository("App\Entity\Type_Incident")->findAll();
        foreach ($types as $c) {
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
    public function store(IncidentRequest $request) {
        $incident = new Incident();
        $incident->__set("application", $this->em->getRepository("App\Entity\Application")->find($request->application_id));
        $incident->__set("type_incident", $this->em->getRepository("App\Entity\Type_Incident")->find($request->type_incident_id));
        $incident->__set("priority", $this->em->getRepository("App\Entity\Priority")->find($request->priority_id));
        $incident->__set("asigned", $this->em->getRepository("App\Entity\User")->find($request->asigned));
        $incident->__set("entered_by", $this->em->getRepository("App\Entity\User")->find(Auth::User()->id));
        $incident->__set("updated_by", $this->em->getRepository("App\Entity\User")->find(Auth::User()->id));
        $incident->__set("date_incident", new \DateTime("now"));
        $incident->__set("last_update", new \DateTime("now"));
        $incident->__set("description", $request->description);
        $incident->__set("solution", "still without solution");
        $incident->__set("status_incident", 0);
        $this->em->persist($incident);
        $this->em->flush();
        $date_incident =$incident->__get("date_incident")->format('d/m/Y');
        $user = Auth::User();
        Mail::send('email.newincident', ['inc' => $incident,'date_incident'=>$date_incident], function($message) use ($incident,$user) {
            $message->to($incident->asigned->__get("email"), $user->__get("name"))->subject('New Incident!');
            $message->cc([$incident->application->customer->__get("email"),$user->__get("email")]);
        });
        flash('The incident has been created')->important();
        return \Redirect::route('incident_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
        return view('incident.view')->with('incident', $incident);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Auth::User()->type_user->description == "ADMIN") {
            $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
            return view('incident.create')
                            ->with('incident', $incident)
                            ->with("apps", $this->arrayApplication())
                            ->with("types", $this->arrayTypeIncident())
                            ->with("priorities", $this->arrayPriority())
                            ->with("asigned", $this->arrayUsers());
        } elseif (Auth::User()->type_user->description == "USER") {
            $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
            return view('incident.view')->with('incident', $incident);
        } elseif (Auth::User()->type_user->description == "SUPPORT") {
            $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
            return view('incident.editsupport')->with('incident', $incident);
        } else {
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateToWorkInProgress(WorkInProgressRequest $request, $id) {
        $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
        $incident->__set("status_incident", 1);
        $this->em->merge($incident);
        $this->em->flush();
        $user = Auth::User();
        Mail::send('email.updateincident', ['inc' => $incident], function($message) use ($incident,$user) {
            $message->to($incident->asigned->__get("email"), $user->__get("name"))->subject('The incident has been updated!');
            $message->cc([$incident->application->customer->__get("email"),$user->__get("email")]);
        });
        flash('The incident has been updated')->important();
        return \Redirect::route('incident_index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateToSolution(CompleteRequest $request, $id) {
        $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
        $incident->__set("solution", $request->solution);
        $incident->__set("status_incident", 2);
        $this->em->merge($incident);
        $this->em->flush();
        $user = Auth::User();
        Mail::send('email.updateincident', ['inc' => $incident], function($message) use ($incident,$user) {
            $message->to($incident->asigned->__get("email"), $user->__get("name"))->subject('The incident has been updated!');
            $message->cc([$incident->application->customer->__get("email"),$user->__get("email")]);
        });
        flash('The incident has been updated')->important();
        return \Redirect::route('incident_index');
    }

    public function update(IncidentRequest $request, $id) {
        $incident = $this->em->getRepository("App\Entity\Incident")->find($id);
        $incident->__set("application", $this->em->getRepository("App\Entity\Application")->find($request->application_id));
        $incident->__set("type_incident", $this->em->getRepository("App\Entity\Type_Incident")->find($request->type_incident_id));
        $incident->__set("priority", $this->em->getRepository("App\Entity\Priority")->find($request->priority_id));
        $incident->__set("asigned", $this->em->getRepository("App\Entity\User")->find($request->asigned));
        $incident->__set("entered_by", $this->em->getRepository("App\Entity\User")->find(Auth::User()->id));
        $incident->__set("updated_by", $this->em->getRepository("App\Entity\User")->find(Auth::User()->id));
        $incident->__set("date_incident", new \DateTime("now"));
        $incident->__set("last_update", new \DateTime("now"));
        $incident->__set("description", $request->description);
        $incident->__set("status_incident", 0);
        $this->em->merge($incident);
        $this->em->flush();
        $user = Auth::User();
        Mail::send('email.updateincident', ['inc' => $incident], function($message) use ($incident,$user) {
            $message->to($incident->asigned->__get("email"), $user->__get("name"))->subject('The incident has been updated!');
            $message->cc([$incident->application->customer->__get("email"),$user->__get("email")]);
        });
        flash('The incident has been updated')->important();
        return \Redirect::route('incident_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
