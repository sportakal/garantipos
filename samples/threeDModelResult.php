<?php


use Sportakal\Garantipos\Models\Options;

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


try {
    $md_result = new \Sportakal\Garantipos\Results\ThreeDSecureModelResult($options);
} catch (Exception $e) {
    ddd($e->getMessage());
}

if (!$md_result->getMdStatus()) {
    ddd($md_result->getMdStatus(), $md_result->getResponseMessage(), $md_result->getMdErrorMessage());
}

$request = $md_result->getGVPSRequest();

$response = new \Sportakal\Garantipos\Requests\CompleteThreeDSecure($request);
try {
    $result = $response->getResult();
//    ddd($result->getOrder(), $result->getTransaction());

    ddd($result->getStatus(), $result->getStatusMessage(), $result->getErrorMessage());
} catch (Exception $e) {
    ddd($e->getMessage());
}
