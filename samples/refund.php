<?php


use Sportakal\Garantipos\Models\Address;
use Sportakal\Garantipos\Models\Card;
use Sportakal\Garantipos\Models\Customer;
use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Terminal;
use Sportakal\Garantipos\Models\Transaction;


require './env.php';

$options = new Options();
$options->setMode($_ENV['MODE']);
$options->setApiVersion($_ENV['API_VERSION']);
$options->setTerminalId($_ENV['TERMINAL_ID']);
$options->setTerminalProvUserId($_ENV['TERMINAL_PROV_USER_ID_REFUND']);
$options->setTerminalProvUserPassword($_ENV['TERMINAL_PROV_USER_PASSWORD']);
$options->setTerminalUserId($_ENV['TERMINAL_USER_ID']);
$options->setTerminalMerchantId($_ENV['TERMINAL_MERCHANT_ID']);

$customer = new Customer();
$customer->setIpAddress('159.146.45.34');


$order = new Order();
$order->setOrderID('sportakal_garantipos_' . time());

$transaction = new Transaction();
$transaction->setAmount(80);
$transaction->setCurrencyCode('TRY');
$transaction->setOriginalRetrefNum('214707386684');

$request = new GVPSRequestModel();
$request->setOptions($options);
$request->setCustomer($customer);
$request->setOrder($order);
$request->setTransaction($transaction);

$request = new \Sportakal\Garantipos\Requests\Refund($request);

try {
    $result = $request->getResult();
    ddd($result->getStatus(), $result->getStatusMessage(), $result->getErrorMessage());
} catch (Exception $e) {
    ddd($e->getMessage());
}
