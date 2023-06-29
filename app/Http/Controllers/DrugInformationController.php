<?php

namespace App\Http\Controllers;

use App\Models\DrugInformation;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class DrugInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadAllDrugPrescriptions()
    {
        $drugInformation = DrugInformation::all();

        if (count($drugInformation) > 0) {
            return response()->json(["status" => "success", "message" => "Prescriptions attached in prescription object", "prescription" => $drugInformation]);

        } else {
            return response()->json(["status" => "success", "message" => "No Prescriptions saved yet", "prescription" => $drugInformation]);

        }
       
    }

    public function loadUsersDrugPrescriptions(Request $request)
    {

        $request->validate([
            'user_id' => 'required',

        ]);

        $drugInformation = DrugInformation::where('user_id', $request->user_id)->get();

        if (count($drugInformation) > 0) {
            return response()->json(["status" => "success", "message" => "Prescriptions attached in prescription object", "prescription" => $drugInformation]);

        } else {
            return response()->json(["status" => "success", "message" => "No Prescriptions saved yet", "prescription" => $drugInformation]);

        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDrugPrescription(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'name_of_drug' => 'required|string',
            'prescription' => 'required|string',
            'timings_for_drug' => 'required',
        ]);

        $drugInformation = new DrugInformation();

        $drugInformation->user_id = $request->user_id;
        $drugInformation->name_of_drug = $request->name_of_drug;
        $drugInformation->prescription = $request->prescription;
        $drugInformation->timings_for_drug = $request->timings_for_drug;

        if ($drugInformation->save()) {
            return response()->json(["status" => "success", "message" => "Prescription Created", "prescription" =>$drugInformation]);

        } else {
            return response()->json(["status" => "error", "message" => "Prescription Failed to Create"]);

        }


    }


    public function updateDrugPrescription(Request $request)
    {
        $request->validate([
            'name_of_drug' => 'required',
            'prescription' => 'nullable',
            'timings_for_drug' => 'nullable',

        ]);


        $drugInformation = DrugInformation::where('name_of_drug', $request->name_of_drug)->first();

        if($drugInformation){
            $drugInformation = new DrugInformation();

            $drugInformation->name_of_drug = $request->name_of_drug;
            $drugInformation->prescription = $request->prescription;
            $drugInformation->timings_for_drug = $request->timings_for_drug;

            if($drugInformation->save()){
                return response()->json(["status" => "success", "message" => "Prescription Updated", "prescription" => $drugInformation]);
                
            }
            else{
                return response()->json(["status" => "error", "message" => "Prescription Failed to Update"]);

            }

        }
        else{
            return response()->json(["status" => "error", "message" => "No Prescription with name ".$request->name_of_drug]);

        }


    }

    public function deleteDrugPrescription(Request $request)
    {
        $request->validate([
            'name_of_drug' => 'required',

        ]);

        $drugInformation = DrugInformation::where('name_of_drug', $request->name_of_drug)->first();

        if($drugInformation){
            if($drugInformation->delete()){
                return response()->json(["status" => "success", "message" => "Drug prescription deleted successfully"]);

                //username HealthSmsApp
                //Api key 71741ed76a893f6f061c0c41638ba251d71f80aa8079b1d0734b4772d94d6766

            }
            else{
                return response()->json(["status" => "error", "message" => "Prescription failed to delete"]);

            }

        }
        else{
            return response()->json(["status" => "error", "message" => "No Prescription with name ".$request->name_of_drug]);

        }

    }

    public function sendReminderForPrescription(Request $request){
        $request->validate([
            'reminder_message' => 'required',
            'phone_number' => 'required',

        ]);

        $msg = new MessageController();
        $msg->send($request->phone_number,$request->reminder_message);




    }
}
