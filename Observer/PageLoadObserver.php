<?php
namespace BrewerDigital\Affiliate\Observer;

use Magento\Framework\Event\ObserverInterface;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

class PageLoadObserver implements ObserverInterface {
  public function execute(\Magento\Framework\Event\Observer $observer) {
		$url = 'https://toorapi.ngrok.io/test';
		$data = array('key1' => 'Someone has visited Pref*it!');

		// use key 'http' even if you send the request to https://...
		$options = array(
				'http' => array(
						'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
						'method'  => 'POST',
						'content' => http_build_query($data)
				)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
    echo '<pre>';
    var_dump($result);
    echo '</pre>';
	}
}
