<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employ;
class ApiController extends Controller
{
    public function createUser(Request $request)
    {
        $employ = new Employ;
        $employ->name = $request->name;
        $employ->number = $request->number;
        $employ->email = $request->email;
        $employ->password = $request->password;
        $employ->roll = $request->roll;
        $employ->save();
        return response()->json($employ);
    }
    public function userDelete(Request $request)
    {
        $catid = $request->id;
        $result = Employ::where('id', $catid)->delete();
        if($result){
            return response()->json([ 'msg' => 'Delete Successfully']);
        }else{
            return response()->json([ 'msg' => 'Not Successfully']);
        }
    }
    public function userUpdate(Request $request)
    {
        //return $request->all();
        $catid = $request->id;
        $result = Employ::where('id', $catid)->update( array(
            'name'=> $request->name, 
            'number'=> $request->number,
            'email'=> $request->email, 
            'password'=> $request->password,
            'roll'=> $request->roll,
        ));
        if($result){
        return response()->json([ 'msg' => 'Updated Successfully']);
        }else{
        return response()->json([ 'msg' => 'Not Successfully']);
        }
    }
}

