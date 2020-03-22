<?php


namespace App\Admin\Controllers;


trait Dtk
{
    protected $appKey = '5db936e2366d1';//应用的key

    protected $appSecret = '4ff53c5c1770bc171fde980c1233d1e9';//应用的Secret

    /**参数加密
     * @param $data
     * @return string
     */
    function makeSign($data)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {

            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        return strtoupper(md5($str . '&key=' . $this->appSecret));
    }
}
