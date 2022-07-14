<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once dirname(__FILE__) . '/../libraries/midtrans/Midtrans.php';

class Payment extends CI_Controller
{
  public function index()
  {
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-tRjXlVNgu7E5Ads7grwB4Jc1';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    // Add new notification url(s) alongside the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$appendNotifUrl = "https://example.com/test1,https://example.com/test2";
    // Use new notification url(s) disregarding the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$overrideNotifUrl = "https://example.com/test1";

    $params = array(
      'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
      )
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    $this->load->view('pelanggan/payment', [
      'snapToken' => $snapToken
    ]);
  }
}
