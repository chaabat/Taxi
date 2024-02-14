<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function index()
    {
        $chauffeurs = User::where('role','chauffeur')->paginate(5);
        return view('admin.chauffeur', compact('chauffeurs'));
    }
    
        
    public function delete(Request $request){
        $id = $request->id;
        $chauffeurs = User::findOrFail($id);
    
        $chauffeurs->delete();
        return redirect()->route('chauffeur.index')->with('success', 'Profile deleted successfully');
    }
}
