<?php

namespace App\Http\Controllers\Backend;

// use App\Helpers\EmailHelper;
use App\Http\Controllers\Controller;
use App\Mail\CustomerRestockMail;
// use App\Models\CustomerMessages;
use App\Models\EmailTemplate;
use App\Models\Item;
use App\Models\RestockReminder;
use App\Models\Setting;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restockItem(Request $request)
    {
        if (Item::where('id', $request->id)->update([ 'stock' => $request->stock ])) {


         if (RestockReminder::where('prod_id',$request->id)->exists()) {

            $item = Item::where('id',$request->id)->first();
            // $msg = CustomerMessages::first();

            // $subject = 'We have restocked'.' '.$item->name;
            if (app()->environment('production')) {
                //code goes here
                $url = "https://dev.beautykink.com/";
            }else{
                $url = "http://localhost:8000/";
            }
            // $url = env('APP_URL');
            // $msg     = 'Visit the link to see the product'.$url.'/product'.'/'.$item->slug;
            foreach (RestockReminder::where('prod_id',$request->id)->get() as $user) {
                $template = EmailTemplate::whereType('Restock')->first();
                $emailData = [
                    'email'      => $user->email,
                    'subject'    => $template->subject,
                    'body'       => preg_replace("/{product_name}/", $item->name, $template->body),
                    'img'       => $url.$item->photo,
                    'url'        => $url.'product'.'/'.$item->slug
                ];

                Mail::to($user->email)->send(new CustomerRestockMail($emailData));

            }

            return response()->json([
                'success'=>"Product Restocked & Reminder Sent Successfully"
            ]);
         }
           
         return response()->json([
            'success'=>"Product Restocked Successfully"
        ]);
        }else{
            return response()->json(['error'=>'Error Restocking!']);
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function itemRestockLimit(Request $request)
    {
        // $this->repository->update($request);
        $data = Setting::first();
        $input = $request->all();
        $data->update($input);
        return response()->json(['success'=>'Restock Limit Set!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
