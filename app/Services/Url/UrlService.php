<?php

namespace App\Services\Url;

use App\Http\Requests\LinkRequest;
use App\Services\Url\Adapter\IUrlAdapter;
use App\Models\ShortUrl;

/**
 * Represents the service to use for building set of data and storing data in DB,
 * enables users to use several adapters to build set.
 */
class UrlService
{
    /**
     * Gets and stores the Url in DB.
     *
     * @param $request - request from where to take data
     * @param $link_adapter - adapter to use for building set of data
     * @return array
     */
    public function storeUrl(LinkRequest $request, IUrlAdapter $link_adapter)
    {
        ShortUrl::create($link_adapter->getCollection($request));
    }
}
