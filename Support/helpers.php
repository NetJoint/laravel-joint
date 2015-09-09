<?php

if (!function_exists('sitename')) {

    /**
     * return site name;
     *
     * @return string
     */
    function sitename()
    {
        return config('app.site_name');
    }

}

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
        if (!$cdn) {
            return asset($asset);
        }
        return rtrim($cdn, '/') . '/' . ltrim($asset, '/');
    }

}

if (!function_exists('domain_url')) {

    /**
     * return url with domain
     *
     * @param $path
     *
     * @return string
     */
    function domain_url($path = '')
    {
        $domain = config('app.domain');        
        return 'http://'.$domain . '/' . ltrim($path, '/');
    }

}

if (!function_exists('subdomain_url')) {

    /**
     * return url with subdomain
     *
     * @param $prefix
     * @param $path
     *
     * @return string
     */
    function subdomain_url($prefix, $path = '')
    {
        $domain = config('app.domain');
        $subdomain = $prefix.'.'.$domain;
        return 'http://'.$subdomain . '/' . ltrim($path, '/');
    }

}

if (!function_exists('email_website')) {

    /**
     * return email website url for login
     *
     * @param $email
     *
     * @return string
     */
    function email_website($email)
    {
        $hostlist = array(
            'vip.sina.com' => 'http://vip.sina.com',
            'vip.163.com' => 'http://vip.163.com',
            'yeah.net' => 'http://www.yeah.net/',
            '139.com' => 'http://mail.10086.cn/',
            'hotmail.com' => 'http://hotmail.com',
            'live.com' => 'http://login.live.com/',
            'live.cn' => 'http://login.live.cn/',
            'live.com.cn' => 'http://login.live.com.cn',
            '189.com' => 'http://webmail30.189.cn/',
            'eyou.com' => 'http://www.eyou.com/',
            '188.com' => 'http://www.188.com/'
        );
        
        $email = explode('@', $email);
        if(!is_array($email) || !isset($email[1])){
            return '#';
        }else{
            $host = $email[1];
        }
        if (in_array($host, $hostlist)) {
            return $hostlist[$host];
        }
        if(substr($host,0,5)!=='mail.'){
            $host = 'mail.'.$host;
        }
        return 'http://'.$host;
    }

}