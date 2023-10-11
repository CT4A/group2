<?php

namespace App\Http\Controllers;

use App\Models\liquor_mg;
use Illuminate\Http\Request;

class bottleController extends Controller
{
    public function index()
    {
        $liquors=liquor_mg::select('liquor_type')->groupBy('liquor_type')->get();
        return view('bottle-register',compact('liquors'));
    }
    public function RegisterBottle(Request $request)
    {
        $validatedData = $request->validate([
            'liquor_type' => 'required',
            'liquor_name' => 'required'
        ],[
            'liquor_type.required'=>'リストから選択してください。ないの場合はその他を選択して手入力してください。',
            'liquor_name.required'=>'酒名を入力してください。',
        ]);
        liquor_mg::create([
            'liquor_type' => $request->liquor_type,
            'liquor_name'=>$request->liquor_name,
            'remarks' => $request->remarks
        ]);
        return redirect()->route('indexRegister')->with('message','登録完成しました。');
    }
    
}
