<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{

    public $cupon_id,$preciodescuento;
    public $name;

    
    public function checkout(Course $course,Coupon $coupon)
    {
       
        $this->cupon_id=$cupo=$coupon->id;
        
            if($coupon!="")
            {
                
                
                return view('payment.checkout',compact('course','coupon'));
            }
        
        
    }

    public function checkoutt(Course $course)
    {
                return view('payment.checkout',compact('course'));
        
    }


    public function pay(Course $course,Coupon $coupon)
    {
        

        if($coupon->status=="activo" && $coupon->fecha_vencimiento >= now()->toDateString())
        {

        
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),     // ClientID
                    config('services.paypal.client_secret')      // ClientSecret
                )
            );
    
            
    
            // After Step 2
            $payer = new \PayPal\Api\Payer();
            $payer->setPaymentMethod('paypal');
    
           
            
            
    
            $amount = new \PayPal\Api\Amount();
            $amount->setTotal(round($course->price->value-($coupon->valor/100*$course->price->value),2));
            $amount->setCurrency('USD');
    
            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount);
    
            $redirectUrls = new \PayPal\Api\RedirectUrls();
            $redirectUrls->setReturnUrl(route('payment.approvedb',[$course,$coupon]))
                ->setCancelUrl(route('payment.checkout',[$course,$coupon]));
    
            $payment = new \PayPal\Api\Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);
    
            // After Step 3
            try {
                $payment->create($apiContext);
                return redirect()->away($payment->getApprovalLink());
            }
            catch (\PayPal\Exception\PayPalConnectionException $ex) {
                // This will print the detailed information on the exception.
                //REALLY HELPFUL FOR DEBUGGING
                echo $ex->getData();
            }
        
        }else{
            
            return redirect()->route('payment.checkout',[$course,$coupon]);
            
        }
    }
    
    public function payy(Course $course)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );


        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        
       if($course->oferta_id==0)
       {
           $this->preciodescuento=$course->price->value;
       }
       else
           if($course->oferta_id==1)
           {
            $this->preciodescuento=$course->price->value;
           }
           else{
            $this->preciodescuento=$course->oferta->value;
           }
        
       
        

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($this->preciodescuento);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.approved',$course))
            ->setCancelUrl(route('payment.checkoutt',$course));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($apiContext);
            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        } 
    }

    public function approved(Course $course)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $payment->execute($execution, $apiContext);

        if($course->oferta_id==0)
        {
            $this->preciodescuento=$course->price->value;
            $course->students()->attach(auth()->user()->id,['value'=>$course->price->value,'created_at'=>Carbon::now()]);
        }
        else
            if($course->oferta_id==1)
            {
                $course->students()->attach(auth()->user()->id,['value'=>$course->price->value,'created_at'=>Carbon::now()]);
            }
            else{
                $course->students()->attach(auth()->user()->id,['value'=>$course->oferta->value,'created_at'=>Carbon::now()]);
            }

        //$course->students()->attach(auth()->user()->id,[]);

        return redirect()->route('courses.status',$course);
        
        //aqui va cupon aumento en uso
        

    }

    public function approvedb(Course $course,Coupon $coupon)
    {

        
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $payment->execute($execution, $apiContext);

        $course->students()->attach(auth()->user()->id,['value'=>round($course->price->value-($coupon->valor/100*$course->price->value),2),'created_at'=>Carbon::now()]);
        
        $couponuse=$coupon->uso;
        if($coupon->uso<=$coupon->cantidad)
        {
            $id=$coupon->id;
            $datos = Coupon::findOrFail($id);
            $datos->uso=$couponuse+1;
            $datos->save();
        }
        
            

        return redirect()->route('courses.status',$course);
        
        //aqui va cupon aumento en uso
        

    }

}
