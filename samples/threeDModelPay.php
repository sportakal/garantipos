<?php


use Sportakal\Garantipos\Models\Address;
use Sportakal\Garantipos\Models\Card;
use Sportakal\Garantipos\Models\Customer;
use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Terminal;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\InitializeThreeDSecure;
use Sportakal\Garantipos\Requests\ThreeDSecurePay;

require './env.php';

$options = new Options();
$options->setMode($_ENV['MODE']);
$options->setApiVersion($_ENV['API_VERSION']);
$options->setTerminalId($_ENV['TERMINAL_ID']);
$options->setTerminalProvUserId($_ENV['TERMINAL_PROV_USER_ID_PAY']);
$options->setTerminalProvUserPassword($_ENV['TERMINAL_PROV_USER_PASSWORD']);
$options->setTerminalUserId($_ENV['TERMINAL_USER_ID']);
$options->setTerminalMerchantId($_ENV['TERMINAL_MERCHANT_ID']);
$options->setStoreKey($_ENV['THREED_STORE_KEY']);

$card = new Card();
$card->setNumber('5549608789641500'); //5406697543211173 //5549608789641500
$card->setExpireDate('0323'); //0323 //0323
$card->setCVV2('712'); //465 //712

$customer = new Customer();
$customer->setIpAddress('127.0.0.1');
$customer->setEmailAddress('portakalsinan@gmail.com');


$order = new Order();
$order->setOrderID('sportakal_garantipos_' . time());
$order->addAddress(new Address());

$transaction = new Transaction();
$transaction->setType('sales');
$transaction->setInstallmentCnt("");
$transaction->setAmount(80);
$transaction->setCurrencyCode('TRY');
$transaction->setCardholderPresentCode('0');
$transaction->setMotoInd('N');
$transaction->setDescription('test payment');

$request = new RequestModel();
$request->setOptions($options);
$request->setCard($card);
$request->setCustomer($customer);
$request->setOrder($order);
$request->setTransaction($transaction);
$request->setSuccessURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/garantipos/samples/threeDModelResult.php");
$request->setErrorURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/garantipos/samples/threeDModelResult.php");

$response = new InitializeThreeDSecure($request);
$response = $response->getResult();

echo $response->getHtml();

//echo '<pre>';
//dd($response->getRawBody());
//echo '</pre>';

