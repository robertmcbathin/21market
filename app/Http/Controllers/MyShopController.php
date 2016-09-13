<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;

class MyShopController extends Controller
{
	public function getListPayment()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://my-shop.ru/cgi-bin/p/info.pl',
			CURLOPT_HTTPHEADER => array('charset: cp-1251'),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query(array(
				'partner' => 8666,
				'auth_method' => 'plain',
				'auth_code' => 'gkghkjh8u76yfhgfvhjg768de5e',
				'version' => '1.10',
				'request' => 'list_errors'
				))
			));
		$xml_response = curl_exec($curl);
		curl_close($curl);
		$xml_response = <<<XML
		$xml_response
XML;
		$xml_response = iconv('CP1251', 'UTF-8', $xml_response); 
//$xml = simplexml_load_string($xml_response);
		return view('my-shop-test',['curl_response' => $xml_response]);
	}

}

