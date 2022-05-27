<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\ThreeDSecurePay;
use Sportakal\Garantipos\Results\Constructors\PostResult;

class ThreeDSecureModelResult extends PostResult
{
    public function setHashData(): void
    {
        $order = new Order();
        $order->setOrderID($this->postResultModel->orderid);

        $transaction = new Transaction();
        $transaction->setType($this->postResultModel->txntype);
        $transaction->setInstallmentCnt($this->postResultModel->txninstallmentcount);
        $transaction->setAmount($this->postResultModel->txnamount);

        $request = new RequestModel();
        $request->setOptions($this->options);
        $request->setOrder($order);
        $request->setTransaction($transaction);
        $request->setSuccessURL($this->postResultModel->successurl);
        $request->setErrorURL($this->postResultModel->errorurl);

        $pay = new ThreeDSecurePay($request);
        $this->hash_data = $pay->getHashData();;
    }
}
