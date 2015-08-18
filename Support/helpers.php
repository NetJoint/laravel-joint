<?php

if (!function_exists('cdn')) {

    /**
     * return file url with cdn;
     *
     * @param $asset
     *
     * @return string
     */
    function cdn($asset)
    {
        $cdn = env('CDN_HOST', false);
        if (!$cdn){
            return asset($asset);
        }
        return rtrim($cdn, '/').'/'.ltrim($asset, '/');
    }

}