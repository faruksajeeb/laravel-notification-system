<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $users = User::all();
		//dd($users);
		
        $offerData = [
            'name' => 'Sajeeb',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        //Notification::send($user, new OffersNotification($offerData));
		for($i=0;$i<20;$i++){
		foreach($users as $user){
			Notification::send($user, new OffersNotification($offerData));
		}
		}
        
   
        dd('Task completed!');
    }
}