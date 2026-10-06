<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Adminwallet;
use App\Models\Userdeposit;
use App\Models\CopyTrader;
use App\Models\Userwithdraw;
use Illuminate\Http\Request;
use App\Models\investmentplan;
use App\Models\kyc_verification;
use App\Models\Trade;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class admin_action extends Controller
{
    //
    public function upload_qr(Request $request)
    {
        // Validate the uploaded image (you can add more validation rules as needed)
        $validatedData = $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif', // Example validation rules
        ]);

        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)

        $uploadedImage = $request->file('qr_code');
        // Generate a unique filename for the uploaded image
        $filename = time() . '_' . $uploadedImage->getClientOriginalName();
        $imagePath = $uploadedImage->storeAs('qr_images', $filename, 'public');

        $formType = $request->input('form_type');
        if ($formType === 'btc_address_bitcoin_qr') {
            // Update BTC QR data in the database
            $adminWallet->btc_address_bitcoin_qr = $filename;
        } elseif ($formType === 'btc_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->btc_address_bep20_qr = $filename;
        } elseif ($formType === 'eth_address_erc20_qr') {
            // Update ETH QR data in the database
            $adminWallet->eth_address_erc20_qr = $filename;
        } elseif ($formType === 'eth_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->eth_address_bep20_qr = $filename;
        } elseif ($formType === 'usdt_address_trc20_qr') {
            // Update ETH QR data in the database
            $adminWallet->usdt_address_trc20_qr = $filename;
        } elseif ($formType === 'usdt_address_bep20_qr') {
            // Update ETH QR data in the database
            $adminWallet->usdt_address_bep20_qr = $filename;
        } elseif ($formType === 'usdt_address_erc20_qr') {
            // Update USDT QR data in the database
            $adminWallet->usdt_address_erc20_qr = $filename;
        }

        $adminWallet->save();

        return redirect()
            ->back()
            ->with('success', 'QR Code uploaded successfully.');
    }


    public function update_address(Request $request)
    {
        $validatedData = $request->validate([
            'btc_address_bitcoin' => 'required|string',
            'eth_address_erc20' => 'required|string',
            'eth_address_bep20' => 'required|string',
            'usdt_address_trc20' => 'required|string',
            'usdt_address_bep20' => 'required|string',
            'usdt_address_erc20' => 'required|string',
        ]);

        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)

        // Update the fields with the values from the form
        $adminWallet->btc_address_bitcoin = $request->input('btc_address_bitcoin');
        $adminWallet->eth_address_erc20 = $request->input('eth_address_erc20');
        $adminWallet->eth_address_bep20 = $request->input('eth_address_bep20');
        $adminWallet->usdt_address_trc20 = $request->input('usdt_address_trc20');
        $adminWallet->usdt_address_bep20 = $request->input('usdt_address_bep20');
        $adminWallet->usdt_address_erc20 = $request->input('usdt_address_erc20');

        $adminWallet->save();

        return redirect()
            ->back()
            ->with('success', 'Addresses updated successfully.');
    }

    public function modify_profile(Request $request, $id)
    {
        $validatedData = $request->validate([




            'walletaddress' => 'sometimes|required|numeric',
            // 'tradingBalance' => 'sometimes|required|numeric',
            'profits' => 'sometimes|required|numeric',
            'refbonus' => 'sometimes|required|numeric',
            'investedamount' => 'sometimes|required|numeric',
            'kyc_amount' => 'sometimes|required|numeric',
            // 'signal' => 'sometimes|required|numeric',
            // 'investedin' => 'sometimes|required|string',
        ]);



        $user = User::findOrFail($id); // Fetch the user based on the provided ID
        $formType = $request->input('form_type');
        if ($formType == 'kyc_update') {
            $user->kyc_amount = $request->input('kyc_amount');
            $user->save();
        } elseif ($formType == 'modify_balance') {

            $user->walletbalance = $request->input('walletaddress');
            // $user->trading_balance = $request->input('tradingBalance');
            $user->invested_amount = $request->input('investedamount');
            $user->profit = $request->input('profits');
            $user->refbonus = $request->input('refbonus');
            // $user->signal = $request->input('signal');
            // $user->investedin = $request->input('investedin');

            $user->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }



    public function modify_investmentupdate(Request $request, $id)
    {



        $validatedData = $request->validate([
            'profits' => 'sometimes|required',
            'amount' => 'sometimes|required',
            'status_select' => 'sometimes|required',
            'withdrawal_date' => 'sometimes|required|date',

        ]);

        $investment = investmentplan::findOrFail($id); // Fetch the user based on the provided ID






        $investment->profit = $request->input('profits');
        $investment->amount = $request->input('amount');
        $investment->status = $request->input('status_select');
        $investment->Withdrawaldate = $request->input('withdrawal_date');
        $investment->profit = $request->input('profits');





        $investment->save();

        return redirect()
            ->back()
            ->with('success', 'Investment updated successfully.');
    }



    public function modify_profile_buttons(Request $request, $id)
    {
        $action = $request->query('action');
        $user = User::findOrFail($id); // Fetch the user based on the provided ID



        switch ($action) {
            case 'delete':
                // Handle delete action
                $user->delete();
                return redirect()->route('manage_user')->with('success', 'User deleted successfully.');
                break;

            case 'access':
                // Handle access action
                Auth::login($user);

                // Redirect the user to their dashboard or any other desired page
                return redirect()->route('dashboard')->with('success', 'Login successful!');
                break;

            case 'verify-kyc':
                // Handle verify KYC action
                $user->kyc_verify = 'yes';
                $user->save();
                return redirect()->back()->with('success', 'User kyc successfully verified.');
                break;

            case 'verify-email':
                // Handle verify email action
                $user->email_verify = 'yes';
                $user->save();
                return redirect()->back()->with('success', 'User Email successfully verified.');
                break;

            case 'unverify-kyc':
                // Handle unverify KYC action
                $user->kyc_verify = 'no';
                $user->save();
                return redirect()->back()->with('success', 'User kyc successfully unverified.');
                break;

            default:
                // Handle unknown action or redirect back
                return redirect()->back()->withErrors(['message' => 'Unknown action.']);
        }

        // Perform the desired action and return a response
    }


    public function deposit_action(Request $request, $id)
    {

        $action = $request->query('action');
        $deposit = Userdeposit::findOrFail($id); // Fetch the user based on the provided ID
        $useremail = $deposit->email;
        $user = User::where('email', $useremail)->first();
        $deposit_amount = $deposit->amount;

        switch ($action) {
            case 'confirm':
                $deposit->status = 'confirmed';
                $deposit->save();
                $user->walletbalance += $deposit_amount;
                $user->save();


                //send Mail
                Mail::send('emails.deposit_confirmed', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Deposit Confirmed');
                });


                return redirect()->back()->with('success', 'Deposit confirmed.');
                break;
                break;
            case 'decline':
                $deposit->status = 'canceled';
                $deposit->save();


                //send Mail


                Mail::send('emails.deposit_declined', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Deposit Error');
                });

                return redirect()->back()->withErrors(['message' => 'deposit declined.']);
                break;

            default:
                # code...
                break;
        }
    }


    public function withdrawal_action(Request $request, $id)
    {

        $action = $request->query('action');
        $withdrawal = Userwithdraw::findOrFail($id); // Fetch the withdrawal record based on the provided ID
        $useremail = $withdrawal->email;
        $user = User::where('email', $useremail)->first();
        $withdrawal_amount = $withdrawal->amount;
        $wallet_address = $withdrawal->walletaddress;

        switch ($action) {
            case 'confirm':
                $withdrawal->status = 'success';
                $withdrawal->save();
                $user->walletbalance -= $withdrawal_amount;
                $user->save();

                Transaction::Create([
                    'email' => $withdrawal->email,
                    'date' => $withdrawal->dateadd,
                    'transaction_type' => 'withdrawal',
                    'amount' => $withdrawal->amount,
                    'status' => 'success',
                    'transaction_id' => $withdrawal->transid,
                ]);




                //Send Mail
                Mail::send('emails.withdrawal_confirmed', ['user' => $user, 'withdrawal_amount' => $withdrawal_amount, 'wallet_address' => $wallet_address], function ($message) use ($user) {
                    $message->to($user->email)->subject('withdrawal Confirmed');
                });


                return redirect()->back()->with('success', 'Withdrawal confirmed.');
                break;

            case 'decline':
                $withdrawal->status = 'declined';
                $withdrawal->save();

                //Send Mail
                Mail::send('emails.withdrawal_declined', ['user' => $user, 'withdrawal_amount' => $withdrawal_amount, 'wallet_address' => $wallet_address], function ($message) use ($user) {
                    $message->to($user->email)->subject('withdrawal Declined');
                });

                return redirect()->back()->withErrors(['message' => 'Withdrawal Declined.']);
                break;

            default:
                return redirect()->back()->withErrors(['message' => 'Invalid action.']);
                break;
        }
    }



    // public function end_investment($id){
    //     $investment = investmentplan::findOrFail($id);
    //     $investment->status = 'ended';
    //     $investment->save();
    //     $invested_amount = $investment->amount;
    //     $invested_profit = $investment->profit;
    //     $total = $invested_amount + $invested_profit;

    //     $user = User::where('email', $investment->email)->first();
    //     $user_profit = $user->profit;
    //     $new_profit = $total + $user_profit;
    //     $user->save();









    //     return redirect()->back()->with('success', 'Investment plan has been successfully ended.');
    // }


    public function end_investment($id)
    {
        $investment = investmentplan::findOrFail($id);
        $investment->status = 'ended';
        $invested_amount = $investment->amount;
        $invested_profit = $investment->profit;
        $total = $invested_amount + $invested_profit;
        $investment->save();

        $user = User::where('email', $investment->email)->first();
        $user_profit = $user->profit;
        $new_profit = $total + $user_profit;
        $user->profit = $new_profit; // Update user's profit
        $user->save();

        return redirect()->back()->with('success', 'Investment plan has been successfully ended.');
    }


    public function end_ongoingtrade($id){
        $trade = Trade::findOrFail($id);

        $trade->status = 'ended';
        $trade_amount = $trade->volume;
        $trade_profit = $trade->profit;
        $total = $trade_amount + $trade_profit;
        $trade->save();

        $user = User::where('email', $trade->email)->first();
        $usertradingBalance = $user->trading_balance;
        $newtradingBalance = $total + $usertradingBalance;
        $user->trading_balance = $newtradingBalance; // Update user's profit
        $user->save();


        // Send email notification
        Mail::send('emails.trade_closed', [
            'user' => $user,
            'trade' => $trade,
            'total' => $total,
        ], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your Trade Has Been Closed');
        });


        return redirect()->back()->with('success', 'Trade plan has been successfully ended.');

    }

    public function updatetradeProfit(Request $request, $id){
        $request->validate([
            'profit' => 'required|numeric',
        ]);

        $trade = Trade::findOrFail($id);
        $trade->profit = $request->input('profit');
        $trade->save();

        return redirect()->back()->with('success', 'Profit updated successfully.');
    }





    public function kyc_action(Request $request, $id)
    {
        $action = $request->query('action');
        $kyc_find = kyc_verification::findOrFail($id); // Fetch the user based on the provided ID
        $useremail = $kyc_find->email;
        $user = User::where('email', $useremail)->first();


        switch ($action) {
            case 'confirm':
                $kyc_find->status = 'confirmed';
                $kyc_find->save();
                $user->kyc_verify = 'true';
                $user->save();



                //send Mail
                return redirect()->back()->with('success', 'KYC confirmed.');
                break;
                break;
            case 'decline':
                $kyc_find->delete(); // Delete the record from the database
                return redirect()->back()->withErrors(['message' => 'KYC declined and record deleted..']);
                break;

            default:
                # code...
                break;
        }
    }



    public function update_withdrawal_options(Request $request, $id)
    {
        $validatedData = $request->validate([
            'withdrawal_fee_option' => 'sometimes|required',
            'withdrawal_fee' => 'sometimes|required|numeric',
            'fee_name' => 'sometimes|required|string',
        ]);
        $withdrawal = Userwithdraw::findOrFail($id);

        $withdrawal->wfee = $request->input('withdrawal_fee_option');
        $withdrawal->fee = $request->input('withdrawal_fee');
        $withdrawal->fee_name = $request->input('fee_name');
        $withdrawal->save();
        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }


    public function delete_deposit($id)
    {
        try {
            $deposit = Userdeposit::findOrFail($id); // Find the deposit by ID
            $deposit->delete(); // Delete the deposit

            return redirect()->back()->with('success', 'Deposit deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Failed to delete deposit.']);
        }
    }

    public function store_traders(Request $request)
    {
        $validatedData = $request->validate([
            'tradersimg' => 'required|image|mimes:jpeg,png,jpg,gif', // Example validation rules
            'tgLink'    => 'sometimes|required|string',
            'tradersname' => 'sometimes|required|string',
            'return_rate' => 'sometimes|required|string',
            'followers' => 'sometimes|required|string',
            'profitshare' => 'sometimes|required|string',
        ]);

        $uploadedImage = $request->file('tradersimg');
        // Generate a unique filename for the uploaded image
        $filename = time() . '_' . $uploadedImage->getClientOriginalName();
        $imagePath = $uploadedImage->storeAs('traders_image', $filename, 'public');

        // Step 3: Insert data into the database
        CopyTrader::create([
            'tradersname' => $validatedData['tradersname'],
            'tgLink' => $validatedData['tgLink'],
            'tradersimg' => $filename,
            'return_rate' => $validatedData['return_rate'],
            'followers' => $validatedData['followers'],
            'profitshare' => $validatedData['profitshare'],
        ]);

        // Step 4: Redirect or return success response
        return redirect()->back()->with('success', 'Trader information saved successfully!');
    }

    public function wallet_earn(Request $request)
    {
        $validatedData = $request->validate([
            'min_amount_req' => 'required|numeric|min:0', // Ensures it's a required number greater than or equal to 0
            'daily_earning_amount' => 'sometimes|required|numeric|min:0', // Ensures it's a number if provided
        ]);
        $adminWallet = Adminwallet::first(); // Retrieve the first row from the Adminwallet table (adjust this as needed)


        $adminWallet->Phrase_min_amount = $request->input('min_amount_req');
        $adminWallet->daily_earning = $request->input('daily_earning_amount');

        $adminWallet->save();

        return redirect()
            ->back()
            ->with('success', 'settings updated successfully');
    }

    public function destroy_trader($id)
    {
        $trader = CopyTrader::findOrFail($id);
        $trader->delete();

        return redirect()->back()->with('success', 'Trader deleted successfully.');
    }

    public function admin_deposit_action(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|numeric|min:0', 
            'paymentType' => 'required|string',
            'deposit_datetime' => ['required', 'date'],
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $transactionId = Str::uuid()->toString();
        $deposit_amount = $validatedData['amount'];
        

        Userdeposit::create([
            'fullname' => $user->fullname,
            'email' => $validatedData['email'],
            'amount' => $validatedData['amount'],
            'status' => 'confirmed',
            'ptype' => $validatedData['paymentType'],
            'transid' => $transactionId,
            'dateadd' => $validatedData['deposit_datetime'],

        ]);

        Transaction::Create([
            'email' => $validatedData['email'],
            'date' => $validatedData['deposit_datetime'],
            'transaction_type' => 'Deposit',
            'amount' => $validatedData['amount'],
            'status' => 'success',
            'transaction_id' => $transactionId,
        ]);
        $updatedUserBalance = $user->walletbalance + $deposit_amount;
        $user->walletbalance = $updatedUserBalance;
        $user->save();

        //send Mail
        Mail::send('emails.deposit_confirmed', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
            $message->to($user->email)->subject('Deposit Confirmed');
        });



        // Step 4: Redirect or return success response
        return redirect()->back()->with('success', 'Deposit information saved successfully!');

        



        
        
    }

    public function admin_transaction_action(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|numeric|min:0', 
            'transactionType' => 'required|string',
            'transaction_datetime' => ['required', 'date'],
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $transactionId = Str::uuid()->toString();

        Transaction::Create([
            'email' => $validatedData['email'],
            'date' => $validatedData['transaction_datetime'],
            'transaction_type' => $validatedData['transactionType'],
            'amount' => $validatedData['amount'],
            'status' => 'pending',
            'transaction_id' => $transactionId,
        ]);

        switch ($validatedData['transactionType']) {

            case 'deposit':
                $deposit_amount = $validatedData['amount'];
                $updatedUserBalance = $user->walletbalance + $deposit_amount;
                $user->walletbalance = $updatedUserBalance;
                $user->save();
                //send Mail
                Mail::send('emails.deposit_confirmed', ['user' => $user, 'deposit_amount' => $deposit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Deposit Confirmed');
                });

            case 'withdrawal':
                $withdrawal_amount = $validatedData['amount'];
                $updatedUserBalance = $user->walletbalance - $withdrawal_amount;
                $user->walletbalance = $updatedUserBalance;
                $user->save();
                //Send Mail
                Mail::send('emails.withdrawal_confirmed', ['user' => $user, 'withdrawal_amount' => $withdrawal_amount, 'wallet_address' => $wallet_address], function ($message) use ($user) {
                    $message->to($user->email)->subject('withdrawal Confirmed');
                });
                break;

            case 'profit':
                $profit_amount = $validatedData['amount'];
                $userProfitBalance = $user->profit;
                $user->profit = $userProfitBalance + $validatedData['amount'];
                $user->save();
                Mail::send('emails.profit_credited', ['user' => $user, 'profit_amount' => $profit_amount], function ($message) use ($user) {
                    $message->to($user->email)->subject('Profit Payout');
                });
                break;

            default:
                // optional: log unknown type
                Log::warning('Unknown transaction type: ' . $validatedData['transactionType']);
                break;
        }

        return redirect()->back()->with('success', 'Transaction information saved successfully!');
    }


    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:transactions,id',
            'status' => 'required|in:pending,success,failed',
        ]);

        $transaction = Transaction::findOrFail($request->id);

        $transaction->status = $request->status;

        $transaction->save();

        return redirect()->back()->with('success', 'Transaction status updated successfully.');
    }

}
