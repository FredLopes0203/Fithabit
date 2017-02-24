<?php

namespace App\Http\Controllers;

use App\Ptinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $curPassword = $request->input['curPassword'];
        $newPassword = $request->input['newPassword'];

        if (!Hash::check($curPassword, $user->password)) {
            return response()->json(["result"=>"false"]);
        }
        else{
            $user->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            return response()->json(["result"=>"true"]);
        }

        //echo "<script>console.log('".$user->password."');</script>";
        //if($user->password == bcrypt($curPassword))
        //{
     /*       $user->password = bcrypt($newPassword);
            $user->save();*/

        /*}
        else
        {
            return response()->json(["result"=>"false"]);
        }*/
    }

    function changebilling(Request $request)
    {
        $userid = Auth::user()->id;

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $cardnumber = $request['cardnumber'];
        $expiremonth = $request['expiremonth'];
        $expireyear = $request['expireyear'];
        $securitycode = $request['securitycode'];
        $country = $request['country'];
        $state = $request['state'];
        $address1 = $request['address1'];
        $address2 = $request['address2'];
        $city = $request['city'];
        $postalcode = $request['postalcode'];
        $phonenumber = $request['phonenumber'];

        $billinginfo = Ptinfo::where('pt_userid', $userid)->first();

        $billinginfo->pt_firstname = $firstname;
        $billinginfo->pt_lastname = $lastname;
        $billinginfo->pt_cardnumber = $cardnumber;
        $billinginfo->pt_expireYear = $expireyear;
        $billinginfo->pt_expireMonth = $expiremonth;
        $billinginfo->pt_securitycode = $securitycode;
        $billinginfo->pt_country = $country;
        $billinginfo->pt_state = $state;
        $billinginfo->pt_address = $address1;
        $billinginfo->pt_address1 = $address2;
        $billinginfo->pt_city = $city;
        $billinginfo->pt_postalcode = $postalcode;
        $billinginfo->pt_phonenumber = $phonenumber;

        $billinginfo->save();

        return response()->json(["result"=>"true"]);
    }

    function userdetailIndex()
    {
        $userid = Auth::user()->id;
        $ptinfo = Ptinfo::where('pt_userid', $userid)->first();

        return response()->json($ptinfo);
    }

    function changecontact(Request $request)
    {
        $userid = Auth::user()->id;

        $name = $request['name'];
        $address = $request['address'];
        $city = $request['city'];
        $country = $request['country'];
        $state = $request['state'];

        $contactinfo = Ptinfo::where('pt_userid', $userid)->first();

        $contactinfo->pt_contactname = $name;
        $contactinfo->pt_contactaddress = $address;
        $contactinfo->pt_contactcity = $city;
        $contactinfo->pt_contactcountry = $country;
        $contactinfo->pt_contactstate = $state;

        $contactinfo->save();

        return response()->json(["result"=>"true"]);
    }

    function Downgrade(Request $request)
    {
        $user = Auth::user()->id;
        $user->user_type = 0;
        $user->save();

        return response()->json(["result"=>"true"]);
    }

    public function orderPost(Request $request)
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $input = $request->all();
        $token = $input['stripeToken'];

        try {
            $user->subscription($input['plane'])->create($token,[
                'email' => $user->email
            ]);
            return back()->with('success','Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }

    }


}

