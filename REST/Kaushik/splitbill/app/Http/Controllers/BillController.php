<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\BillModel;
use App\SplitBtwnModel;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $title=$request->title;
        $price=$request->price;
        $split_user_email=$request->split_between;
         if($split_user_email!= User::where('email',$split_user_email))
            return response(['message'=>'cannot process data'],422);

         $bill = BillModel::create([
                    'title' => $title,
                    'price' => $price,
                    'created_user_email'=>Auth::user()->email]);
         // for ($i=0; $i < $request->split_between->'length'; $i++) { 
         //    $user_id=Auth::user()->where('email',$request->split_between[i]);
         //    return $user_id;
         // }
        
        $split= $bill->splitbtwn()->create(['split_user_email'=>$split_user_email]);
        $bill->save();
        $split->user;
         $bill->splitbtwn;
         if($bill){
            return response(['message'=>'Bill Created Successfully','bill'=>$bill],200);
        }else{
            return response(['message'=>'cannot process data'],422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $bill= BillModel::find($id);
       if($bill){
       $bill->splitbtwn;
        return response($bill,200);
       }else{
        return response(['message'=>'Bill not found'],404);
       }
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $bill=BillModel::find($id);
        $title=$request->title;
        $price=$request->price;
        $split_user_email=$request->split_between;
        if($bill->created_user_email!=Auth::user()->email)
            return response(['message'=>'cannot process data'],422);

        $bill->title=$title;
        $bill->price=$price;
        $bill->save();
         
        $split= $bill->splitbtwn()->update(['split_user_email'=>$split_user_email]);
       
         $bill->splitbtwn;
         if($bill){
                return response(['message'=>'Bill Updated Successfully','bill'=>$bill],200);
         }
         else{
                return response(['message'=>'cannot process data'],422);
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bill=BillModel::find($id);
        $split=SplitBtwnModel::where('bill_id',$id);
        if($bill->created_user_email!=Auth::user()->email)
            return response(['message'=>'cannot delete data'],422);

        $split->delete();
        $bill->delete();
        return response(['message'=>'Bill Deleted Successfully'],200);

    }
}
