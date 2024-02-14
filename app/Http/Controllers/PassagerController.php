<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function index()
{
    $passagers = User::where('role','passager')->paginate(5);
    return view('admin.passager', compact('passagers'));
}

    
public function delete(Request $request){
    $id = $request->id;
    $passagers = User::findOrFail($id);

    $passagers->delete();
return view('admin.passager', compact('passagers'))->with('success', 'Profile deleted successfully');
}

}
