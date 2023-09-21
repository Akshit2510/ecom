<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

    if (! function_exists('getEnumFromSelectedTable')) {
        function getEnumFromSelectedTable($tableName, $columnName)
        {
            $columnInfo = DB::selectOne("SHOW COLUMNS FROM $tableName WHERE Field = ?", [$columnName]);            
            if ($columnInfo && isset($columnInfo->Type)) {
                preg_match("/^enum\(\'(.*)\'\)$/", $columnInfo->Type, $matches);
                return explode("','", $matches[1]);
            }
        }
    }

    if (!function_exists('formatAmount')) {
        /**
         * Number Format
         *
         * @return bool
         */
        function formatAmount($amount,$withCurrency=false)
        {
            if($withCurrency==true){
                return "$".number_format((float)$amount, 2, '.', ''); 
            }
            return number_format((float)$amount, 2, '.', ''); 
        }
    }
    
    if (!function_exists('sendNotificationMail')) {
        function sendNotificationMail($user = [], $slug = "", $params = [])
        {
            if (empty($slug) && empty($params)) {
                $result = Mail::to(strtolower($user['email']))->send(new \App\Mail\CommonNotifyMail($user, NULL, NULL));
            } else {
                $result = Mail::to(strtolower($user['email']))->send(new \App\Mail\CommonNotifyMail($user, $slug, $params));
            }    
            return $result;
        }
    }

    if (!function_exists('stringReplacement')) {
        function stringReplacement($stringName,$capitalize=false)
        {
            if($capitalize==true){
                return ucfirst(str_replace(['_',',','"','[',']'],'',$stringName));
            }
            return str_replace(['_',',','"','[',']'],'',$stringName);
        }
    }    