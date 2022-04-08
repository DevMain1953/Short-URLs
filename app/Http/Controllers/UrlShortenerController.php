<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ShortUrl;
use App\Http\Requests\LinkRequest;
use App\Services\Url\UrlService;
use App\Services\Url\Adapter\IUrlAdapter;

class UrlShortenerController extends AbstractController
{
    /**
     * Creates new controller instance, initializes service.
     *
     * @param $service - the service to use in controller
     */
    public function __construct(UrlService $service)
    {
        $this->service = $service;
    }

    /**
     * Displays the latest created short url from DB.
     *
     * @return view
     */
    public function index()
    {
        if (ShortUrl::exists()) {
            $short_link = ShortUrl::latest()->first()->code;
        } else {
            $short_link = "Empty";
        }
        return view('shortenLink', compact('short_link'));
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
     * Stores the short url in storage.
     *
     * @param $request - request that stores validation rules
     * @param $link_adapter - adapter to use for building set of data
     * @return redirect
     */
    public function store(LinkRequest $request, IUrlAdapter $link_adapter)
    {
        $this->service->storeUrl($request, $link_adapter);
    }

    /**
     * Redirects the client to url that is loaded from short url.
     *
     * @return redirect
     */
    public function getNormal(string $code)
    {
        $find = ShortUrl::where('code', $code)->first();
        return redirect($find->link);
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
