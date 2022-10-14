<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Post;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Bcategory;
use App\Models\Fcategory;
use App\Models\Subscriber;
use App\Helpers\EmailHelper;
use App\Models\CampaignItem;
use Illuminate\Http\Request;
use App\Models\HomeCustomize;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\SubscribeRequest;
use App\Models\TrackOrder;
use Illuminate\Support\Facades\Session;
use App\Repositories\Frontend\FrontRepository;

class InstagramController extends Controller
{
    public function index(Request $request)
    {
    	$items = [];


    	if($request->has('username')){


	 $client = new \GuzzleHttp\Client;
	 $url = sprintf('https://www.instagram.com/%s/media', $request->input('username'));
         $response = $client->get($url);
         $items = json_decode((string) $response->getBody(), true)['items'];


    	}


    	return view('instagram',compact('items'));
    }
}




