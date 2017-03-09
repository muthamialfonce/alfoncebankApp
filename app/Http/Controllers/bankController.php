<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\bank;

class bankController extends Controller
{
     protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function report(){
        return view('welcome');
    }
    public function home(){
        return view('welcome');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $balance=bank::all();
        return view('pages.balance', compact('balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.deposit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fetching deposit from Form
        $deposit=$this->request->input('amount');

        $number_of_deposits=$request->session()->get('deposits_number');
        
        if ($request->session()->get('total_deposted')=="" || $request->session()->get('total_deposted')==0) {
            $totaldeposted=$deposit;
        }else{
            $totaldeposted=$request->session()->get('total_deposted');
        }

        if ($deposit <= 0 ) {
            Session::flash('message', 'please enter a valid amount'); 
            Session::flash('alert-class', 'alert-danger'); 
        }elseif ($deposit > 40000) {
           Session::flash('message', 'The maximum deposit per transaction allowed is $40,000'); 
            Session::flash('alert-class', 'alert-danger');  
        /*}elseif($number_of_deposits >4){
             Session::flash('message', 'Sorry, you have exceeded the maximum deposit of 4 times in a day'); 
            Session::flash('alert-class', 'alert-danger');
            $request->session()->forget('deposits_number');
        }elseif ($totaldeposted>150000) {
            Session::flash('message', 'Sorry, you have exceeded the maximum deposit of $150,000 in a day'); 
            Session::flash('alert-class', 'alert-danger');
            $request->session()->forget('total_deposted');*/
        }else{
            //fetching amount from database
            $currentAmount= DB::table('banks')->value('amount');
            if ($currentAmount=="" || $currentAmount=="" ) {
                DB::table('banks')->insert(
                        ['amount' =>$deposit]
                    );
            }else{
                //incrementing the value
                DB::table('banks')->increment('amount',$deposit);
            }

            Session::flash('message', 'Deposit Successful!'); 
            Session::flash('alert-class', 'alert-success');
            $number_of_deposits++;
            $totaldeposted+=$deposit;
            $request->session()->put('deposits_number', $number_of_deposits);
            $request->session()->put('total_deposted', $totaldeposted); 
            
        }
        return Redirect::route('report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withdraw()
    {
        return view('pages.withdraw');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withdrawTransaction(Request $request)
    {
        //fetching withdraw from Form
        $withdraw=$this->request->input('amount');

        $numberofwithdrawals=$request->session()->get('transactions_number');
        
        if ($request->session()->get('total_withdrawn')=="" || $request->session()->get('total_withdrawn')==0) {
            $totalWithdrawn=$withdraw;
        }else{
            $totalWithdrawn=$request->session()->get('total_withdrawn');
        }
        
        
        //fetching current amount from DB
        $currentAmount= DB::table('banks')->value('amount');
        if ($withdraw <= 0 ) {
            Session::flash('message', 'Please enter a valid amount'); 
            Session::flash('alert-class', 'alert-danger'); 
        }elseif ($withdraw > 20000) {
           Session::flash('message', 'Sorry, Transaction not successfull, the maximum withdrawal per transction is $20000'); 
            Session::flash('alert-class', 'alert-danger');  
        }elseif ($currentAmount <= $withdraw) {
            Session::flash('message', 'Sorry You have insuffient funds'); 
            Session::flash('alert-class', 'alert-danger');
        }elseif($numberofwithdrawals >3){
             Session::flash('message', 'Sorry, you have exceeded the maximum widthdraw of 3 times in a day'); 
            Session::flash('alert-class', 'alert-danger');
            //$request->session()->forget('transactions_number');
        }elseif ($totalWithdrawn>50000) {
            Session::flash('message', 'Sorry, you have exceeded the maximum widthdraw of $50,000 in a day'); 
            Session::flash('alert-class', 'alert-danger');
            //$request->session()->forget('total_withdrawn');
        }else{ 
                //decrementing the value
                DB::table('banks')->decrement('amount', $withdraw);

                Session::flash('message', 'Withdrawal Transaction successful!'); 
                Session::flash('alert-class', 'alert-success');

                $numberofwithdrawals++;
                $totalWithdrawn+=$withdraw;
                $request->session()->put('transactions_number', $numberofwithdrawals);
                $request->session()->put('total_withdrawn', $totalWithdrawn);
                
                
        }
        //var_dump($request->session()->get('session_name'));
         return Redirect::route('report');

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
    }
}
