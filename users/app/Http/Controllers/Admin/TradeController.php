<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Trade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    //
    public function transactions(){
        $user = Auth::user();
        $email = $user->email;
        $myTrades = Trade::where('email', $email)->orderBy('id', 'Desc')->get();
        return view('Userview.tradeHistory', compact('myTrades'));
    }


    public function store(Request $request){
        $validatedData = $request->validate([

            'form_type' => 'required|string|max:100', // used internally
            'volume' => 'required|numeric|min:0|max:99999999.99',
            'type' => 'required|string|max:255',
            'symbol' => 'required|string|max:100',
            'stopLoss' => 'required|numeric|min:0|max:100', // renamed from stopLoss
            'takeProfit' => 'required|numeric|min:0|max:100', // renamed from takeProfit
            'comment' => 'nullable|string|max:100', // add comment field in DB or remove this line
            
            
        ]);


        

        

        $user = Auth::user();
        $email = $user->email;
        $amount = $request->input('volume');
        $userbalance = $user->walletbalance;
        $transactionId = Str::uuid()->toString();



        if ($amount > $userbalance) {
            return redirect()->back()->withErrors(['message' => 'Insufficient wallet balance.']);
        }



        $trade = Trade::create([
            'order' => $request->form_type,
            'type' => $request->type,
            'symbol' => $request->symbol,
            'volume' => $request->volume,
            'sl' => $request->stopLoss,
            'tp' => $request->takeProfit,
            'transaction_id' => $transactionId,
            'email' => $email,
            'status' => 'Active',
            
        ]);

        $newuserBalance = $userbalance - $amount;
        $user->walletbalance = $newuserBalance;
        $user->save();

        // Send email
        Mail::send('emails.trade_placed', ['user' => $user, 'trade' => $trade], function ($message) use ($user) {
            $message->to($user->email)
            ->subject('Your Trade Has Been Placed');
        });


        return redirect()->route('Transactions')->with('success', 'Trade Placed successfully!');
       


        


        

    }
}
