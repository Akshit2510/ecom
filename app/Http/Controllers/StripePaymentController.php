<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Interfaces\ConfigurationRepositoryInterface;

class StripePaymentController extends Controller
{
    private ConfigurationRepositoryInterface $configurationRepository;
    public function __construct(ConfigurationRepositoryInterface $configurationRepository)
    {
        $this->configurationRepository = $configurationRepository;
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $data = $request->input();
        $stripeKey = $this->configurationRepository('stripe_key')->value;
        return view('stripe',compact('stripeKey','data'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $stripeSecret = $this->configurationRepository('stripe_secret')->value;
        Stripe\Stripe::setApiKey($stripe_secret);    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        Session::flash('success', 'Payment successful!');              
        return back();
    }
}