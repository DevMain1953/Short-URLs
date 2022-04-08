<?php

namespace App\Services\Url\Adapter;

/**
 * Adapter to build custom set of data.
 */
class CustomUrlAdapter implements IUrlAdapter
{
    /**
     * Builds and returns the set of data.
     *
     * @param $request - request from where to take data
     * @return array
     */
    public function getCollection($request)
    {
        $input['link'] = $request->link;
        $input['code'] = str_random(10);
        return $input;
    }
}
