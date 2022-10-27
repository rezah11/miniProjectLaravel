<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LinkController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {

    }

    public function test()
    {

//        $request->(array(
//            'proxy_host' => 'wwwproxy.address',
//            'proxy_port' => 88
//
//));
//        dd($request->getHeaders(),$_SERVER['HTTP_USER_AGENT']);

//        dd();
//        dd(response($response->getBody())->withHeaders($response->getHeaders()));
//        $test=Http::withOptions([
//            'proxy'=>
//        ])
        $user=User::findOrFail(3);
        $links=[
         'https://aradbranding.com/fa/how-to-prepare-sunny-pilaf-raisins-in-different-ways-in-indoor-places/',
            'https://aradbranding.com/fa/natural-ostrich-feather-duster-with-high-diversity-in-different-uses-and-its-interesting-uses/',
            'https://aradbranding.com/fa/buy-cherry-concentrate-in-urmia-and-mashhad-with-high-brix/',
            'https://aradbranding.com/fa/types-of-double-glazed-glass-to-insulate-the-window-structure/',
            'https://aradbranding.com/fa/buying-patterned-ceramic-mugs-in-various-models/',
            'https://aradbranding.com/fa/the-price-of-exported-and-produced-raisins/',
            'https://aradbranding.com/fa/buy-girls-sandals-in-different-iranian-and-foreign-types-directly-from-the-factory/',
        ];
        foreach ($links as $key=>$value){
            $count=$user->link()->count() + 1;
//            dd($value);
        Link::query()->create([
           'user_id'=>$user->id,
           'link'=>$value,
           'slug'=>$user->id.'$'.$count,
        ]);
        }
    }
}
