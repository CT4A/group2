<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\liquor_link;
use Illuminate\Http\Request;
use App\Models\liquor_mg;
use Illuminate\Support\Facades\DB;

class keepbottleController extends Controller
{
    //キープボトル一覧。
    public function indexList(){

        // $liquors=liquor_link::select('liquor_id','liquor_name')->orderBy('liquor_id')->get();
        $liquors = liquor_link::leftJoin('liquor_mgs','liquor_links.liquor_id','=','liquor_mgs.liquor_id')
                                ->select('liquor_links.liquor_number','liquor_links.liquor_id','liquor_links.customer_id','liquor_mgs.liquor_type')
                                ->orderBy('liquor_type')
                                ->get();                            
        return view('keepbottle-list',compact('liquors'));
    }
    //編集画面表示
    public function indexEditor(Request $request){
        //urlを直接に入力防止
        if($request->has('customer_id')&&$request->has('liquor_id')&&$request->has('liquor_number')){
            $liquor_id=$request->liquor_id;
            $customer_id=$request->customer_id;
            $liquor_number=$request->liquor_number;
            
            $existsliquor = DB::table('liquor_links')->where([
                ['liquor_id', '=', $liquor_id],
                ['liquor_number', '=',$liquor_number],   
                ['customer_id', '=', $customer_id],
                ])->exists();
                
            //urlから受けたのIDは存在のチェック（urlに直接入力する防止）
            if ($existsliquor) {
                $liquor = liquor_link::leftJoin('customers', 'customers.customer_id', '=', 'liquor_links.customer_id')
                                    ->leftJoin('liquor_mgs', 'liquor_mgs.liquor_id', '=', 'liquor_links.liquor_id')
                                    ->select('customers.customer_id','customers.customer_name','liquor_links.liquor_id','liquor_links.liquor_number','liquor_links.liquor_day','liquor_links.remarks','liquor_mgs.liquor_name','liquor_mgs.liquor_type')
                                    ->where([
                                        ['liquor_links.liquor_id', '=', $liquor_id],
                                        ['liquor_links.liquor_number', '=',$liquor_number],   
                                        ['customers.customer_id', '=', $customer_id],
                                        ])
                                    ->first();
                $liquorTypes=liquor_mg::select('liquor_id','liquor_type')->where('liquor_name',$liquor->liquor_name)->get();
                $liquorNames =liquor_mg::select('liquor_name')->groupBy('liquor_name')->get();
                $customers = customer::select('customer_id','customer_name')->get();  
                // return view('test',compact('customers','liquors','liquor'));

                return view('keepbottle-editor',compact('customers','liquorNames','liquorTypes','liquor'));
            } else {
                //存在してない場合顧客リストページに転送します。
                return redirect()->route('keepbottle-list');
            }            
            return redirect()->route('keepbottle-list');
        }else{
            return redirect()->route('keepbottle-list');
        }
    }
    //編集処理
    public function editor(Request $request){
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'liquor_id' => 'required',
            'liquor_type' => 'required',
            'liquor_day' => 'required',
        ],[
            'customer_id.required'=>'リストからスタッフの名前を選択してください。',
            'liquor_id.required'=>'リストからスタッフの名前を選択してください。ないの場合は顧客新規登録してください',
            'liquor_type.required'=>'リストからお酒の種類を選択してください。',
            'liquor_day.required'=>'日付を入力してください。'            
        ]);
        $liquorNumberOld=$request->liquor_number;
        //編集した前のボトルの数を減る
        $liquorOld = liquor_mg::find(  $request->liquor_id_old);
        $NewLiquor_number = $liquorOld->liquor_number - 1;
        $liquorOld->liquor_number = $NewLiquor_number;
        $liquorOld->save();

        //編集したボトルの数を増える
        $liquorNew = liquor_mg::find($request->liquor_id);
        $NewLiquor_number = $liquorNew->liquor_number + 1;
        $liquorNew->liquor_number = $NewLiquor_number;
        $liquorNew->save();
        $test = liquor_link::where([
                ['liquor_id', '=',$request->liquor_id_old],
                ['liquor_number', '=',$liquorNumberOld],   
                ['customer_id', '=', $request->customer_id],
            ])->update([
                'customer_id' => $request->customer_id,
                'liquor_id'=>$request->liquor_id,
                'liquor_number' => $NewLiquor_number,
                'liquor_day' => $request->liquor_day,
                'remarks' => $request->remarks
            ]);
        //アップデート成功のチェック
        if ($test > 0) {
            return redirect()->route('keepbottle-list')->with('message','編集は完成しました。');
        } else {
            return redirect()->route('keepbottle-list')->with('message','編集は失敗しました。');
        }
    }
    //キープボトル登録画面の表示。
    public function indexRegister(){
        $customers= customer::select('customer_id','customer_name')->get();
        $liquors=liquor_mg::distinct()->select('liquor_name')->orderBy('liquor_name')->get();
        return view('keepbottle-register',compact('liquors','customers'));
    }
    //キープボトルタイプをゲットする
    public function GetLiquorType(Request $request){
        if($request->ajax()){
            $liquor_name = $request->liquor_name;
            $liquorTypes=liquor_mg::select('liquor_id','liquor_type')->where('liquor_name',$liquor_name)->get();
            return response()->json($liquorTypes);
        }
    }

    // キープボトル登録
    public function RegisterLiquorLink(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'liquor_id' => 'required',
            'liquor_type' => 'required',
            'liquor_day' => 'required',
        ],[
            'customer_id.required'=>'リストからスタッフの名前を選択してください。',
            'liquor_id.required'=>'リストからスタッフの名前を選択してください。ないの場合は顧客新規登録してください',
            'liquor_type.required'=>'リストからお酒の種類を選択してください。',
            'liquor_day.required'=>'日付を入力してください。'            
        ]);
        $liquor = liquor_mg::find(  $request->liquor_id);
        $NewLiquor_number = $liquor->liquor_number + 1;
        $liquor->liquor_number = $NewLiquor_number;
        $liquor->save();
        liquor_link::create([
            'customer_id' => $request->customer_id,
            'liquor_id'=>$request->liquor_id,
            'liquor_number' => $NewLiquor_number,
            'liquor_day' => $request->liquor_day,
            'remarks' => $request->remarks
        ]);
        
        return redirect()->route('indexKeepRegister')->with('message','登録完成しました。');
    }
    //キープボトルの詳細情報(各キープボトルをクリックする処理)
    public function GetInfoKeepBottle(Request $request){
        if($request->ajax()){
        $liquorId = $request->input('liquor_id');
        $liquorNumber = $request->input('liquor_number');
        $customerId = $request->input('customer_id');
        $KeepbotleInfo = liquor_link::join('liquor_mgs', 'liquor_links.liquor_id', '=', 'liquor_mgs.liquor_id')
        ->join('customers', 'liquor_links.customer_id', '=', 'customers.customer_id')
        ->select('customers.customer_id','customers.customer_name','liquor_mgs.liquor_id','liquor_links.liquor_number','liquor_mgs.liquor_name','liquor_mgs.liquor_type','liquor_links.liquor_day','liquor_links.remarks')
        ->where([
            ['liquor_links.liquor_id', '=', $liquorId],
            ['liquor_links.liquor_number', '=',$liquorNumber],   
            ['customers.customer_id', '=', $customerId],
            ])
        ->first();
        return response()->json($KeepbotleInfo);
    }
        
        return response()->json(['message' => 'This is not an Ajax request']);
    }
}