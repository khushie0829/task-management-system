<?php

namespace App\core\Classes;

class CurlHelper
{
    protected static $base_api_url = null;
    public static function get($url, $headers = [])
    {
        $url = self::getBaseApiUrl() . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array_merge(self::getHeaders(), $headers);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public static function post($url, $data = [], $headers = [])
    {
        $url = self::getBaseApiUrl() . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array_merge(self::getHeaders(), $headers);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public static function put($url, $data = [], $headers = [])
    {
        $url = self::getBaseApiUrl() . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array_merge(self::getHeaders(), $headers);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public static function delete($url, $data = [], $headers = [])
    {
        $url = self::getBaseApiUrl() . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array_merge(self::getHeaders(), $headers);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public static function patch($url, $data = [], $headers = [])
    {
        $url = self::getBaseApiUrl() . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array_merge(self::getHeaders(), $headers);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public static function asObject($response)
    {
        return json_decode($response);
    }
    public static function asArray($response)
    {
        return json_decode($response, true);
    }
    protected static function getBaseApiUrl()
    {
        return config("App")->get('app_api_url', 'http://localhost/api');
    }
    protected static function getHeaders($additionalHeaders = [])
    {
        $headers = [
            'Content-Type: application/json',
        ];
        if (isset($_SESSION['token'])) {
            $headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
        }
        return array_merge($headers, $additionalHeaders);
    }
}
