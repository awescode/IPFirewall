<?php


/**
 *
 * Function for mysql performance.
 * Return BIGINT(8)
 *
 * @return string
 */

if (! function_exists('getIpHash')) {
    function getIpHash($ip)
    {
        return base_convert(
            mb_substr(
                md5($ip)
                , 0, 16)
            , 16, 10
        );
    }
}

