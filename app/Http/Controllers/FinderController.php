<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class FinderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        $workoutprograms = Program::where('program_type', 1)
            ->where('program_kind', 1)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(6)
            ->get();
        $nutritionprograms = Program::where('program_type', 1)
            ->where('program_kind', 2)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(6)
            ->get();
        $infodocprograms = Program::where('program_type', 1)
            ->where('program_kind', 3)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(6)
            ->get();

        return view('ProgramFinder/FinderIndex', compact('workoutprograms', 'nutritionprograms', 'infodocprograms'));
    }

    public function WorkoutIndex()
    {
        $programs = Program::where('program_type', 1)
            ->where('program_kind', 1)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(42)
            ->get();
        $programtype = "Workout";
        return view('ProgramFinder/AllIndex', compact('programs', 'programtype'));
    }

    public function NutritionIndex()
    {
        $programs = Program::where('program_type', 1)
            ->where('program_kind', 2)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(42)
            ->get();
        $programtype = "Nutrition";
        return view('ProgramFinder/AllIndex', compact('programs', 'programtype'));
    }

    public function InfodocIndex()
    {
        $programs = Program::where('program_type', 1)
            ->where('program_kind', 3)
            ->where('program_ispublished', 1)
            ->orderBy('program_soldcount', 'desc')
            ->limit(42)
            ->get();
        $programtype = "InfoDoc";
        return view('ProgramFinder/AllIndex', compact('programs', 'programtype'));
    }

    public function PurchaseIndex(Request $request)
    {
        $programid = $request->input('purchaseProgramid');
        $program= Program::where('program_id', $programid)->first();
        $programtype = "";
        switch($program->program_kind)
        {
            case 1:
                $programtype = "Workout";
                break;
            case 2:
                $programtype = "Nutrition";
                break;
            case 3:
                $programtype = "InfoDoc";
                break;
            default:
                break;
        }
        return view('ProgramFinder/PurchaseProgram', compact('program', 'programtype'));
    }

    public function PurchaseFinish(Request $request)
    {
        $programid = $request->input('purchaseProgramid');
        $program= Program::where('program_id', $programid)->first();
        $programtype = "";
        switch($program->program_kind)
        {
            case 1:
                $programtype = "Workout";
                break;
            case 2:
                $programtype = "Nutrition";
                break;
            case 3:
                $programtype = "InfoDoc";
                break;
            default:
                break;
        }
        return view('ProgramFinder/PurchaseFinish', compact('program', 'programtype'));
    }

/*
    public function postPayWithStripe()
    {
        return $this->chargeCustomer($program->id, $program->price, $program->name, $request->input('stripeToken'));
    }

    public function chargeCustomer($programid, $programprice, $programname, $token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($token);
        }
        else
        {
            $customer = \Stripe\Customer::retrieve(Auth::user()->stripe_id);
        }

        return $this->createStripeCharge($programid, $programprice, $programname, $customer);
    }

    public function createStripeCharge($programid, $programprice, $programname, $customer)
    {
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $programprice,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $programname
            ));
        } catch(\Stripe\Error\Card $e) {
            return redirect()
                ->route('index')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }

        return $this->postStoreOrder($programname);
    }

    public function createStripeCustomer($token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = \Stripe\Customer::create(array(
            "description" => Auth::user()->email,
            "source" => $token
        ));

        Auth::user()->stripe_id = $customer->id;
        Auth::user()->save();

        return $customer;
    }

    public function isStripeCustomer()
    {
        return Auth::user() && \App\User::where('id', Auth::user()->id)->whereNotNull('stripe_id')->first();
    }

    public function postStoreOrder($product_name)
    {
        Order::create([
            'email' => Auth::user()->email,
            'product' => $product_name
        ]);

        return redirect('/')->with('msg', 'Thanks for your purchase!');
    }*/
}
