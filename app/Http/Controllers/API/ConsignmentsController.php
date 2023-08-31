<?php

namespace App\Http\Controllers\Api;

use App\Models\Consignment;
use Illuminate\Http\Request;
use App\Http\Resources\ConsignmentResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\ApiController;

class ConsignmentsController extends ApiController
{
    public function index()
    {
        return $this->successResponse('Consignments successfully fetched.', ConsignmentResource::collection(Consignment::all()));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'contact' => 'required',
            'addressline1' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Error validation.', $validator->errors());       
        }

        return $this->successResponse('Post successfully created.', new ConsignmentResource(
        	Consignment::create($validator->validated())
        ));
    }

   
    public function show($id)
    {
        $Consignment = Consignment::find($id);

        if (is_null($Consignment)) {
            return $this->errorResponse('Consignment does not exist.');
        }
        return $this->successResponse('Consignment successfully fetched.', new ConsignmentResource($Consignment));
    }
    

    public function update(Request $request, Consignment $Consignment)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'contact' => 'required',
            'addressline1' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        if($validator->fails()){
            return $this->errorResponse('Error validation.', $validator->errors());       
        }

        $input = $validator->validated();


        


        $Consignment->company = $input['company'];
        $Consignment->contact = $input['contact'];
        $Consignment->addressline1 = $input['addressline1'];
        $Consignment->city = $input['city'];
        $Consignment->country = $input['country'];
        $Consignment->save();
        
        return $this->successResponse('Consignment successfully updated.', new ConsignmentResource($Consignment));
    }
   
    public function destroy($id)
    {
    	$Consignment = Consignment::find($id);

        if (is_null($Consignment)) {
            return $this->errorResponse('Consignment does not exist.');
        }

        $Consignment->delete();

        return $this->successResponse('Consignment successfully deleted.');
    }
}