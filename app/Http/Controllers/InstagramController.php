<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Vinkla\Instagram\Instagram;



class InstagramController extends Controller
{

    public $access_token = "1614132944.f167a91.8d75434ed8c64317a834c94be6d204f1";

    /**
     * Get data from api url.
     *
     * @return json
    */
    public function curlURL($url)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2,
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function index(Request $request)
    {
	    
	    $instagram = new Instagram('1614132944.f167a91.8d75434ed8c64317a834c94be6d204f1');  
	    $instagram_items = $instagram->get(); 

	    dd($instagram_items);
    	return view('instagram')->with('instagram_items', $instagram_items);
      	
    }

    public function user($user_id)
    {
        $user_id = 'avengers';
        $url = 'https://api.instagram.com/v1/users/' .$user_id. '/media/recent/?access_token=' . $this->access_token;

        $all_result  = $this->curlURL($url); 
        $decoded_results = json_decode($all_result, true);

  		dd($decoded_results);
    }

    public function tag($tag)
    {
        $tag = 'srilanka';
        $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?access_token=' . $this->access_token;

        $all_result  = $this->curlURL($url); 
        $decoded_results = json_decode($all_result, true);

        dd($decoded_results); 
    }

}
