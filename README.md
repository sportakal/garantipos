# Garanti Pos PHP SDK

Garanti bankası sanal pos işlemleri için php entegrasyon kütüphanesidir. 3D Secure, XMLPay ve İade işlemlerini kolayca
yapabilirsiniz.

Test ve canlı ortam kullanıcı bilgileri için Garanti Bankası ile iletişime geçmelisiniz.

# Installation

### Composer

Bağımlılıkları [Composer](http://getcomposer.org/) ile yükleyebilirsiniz.

```bash
$ composer require sportakal/garantipos
```

Bağımlılıkları kullanmak için Composer'ın [autoload](https://getcomposer.org/doc/00-intro.md#autoloading) özelliğini
kullanın.

```php
require_once('vendor/autoload.php');
```

# Usage

Sanalpos kullanıcı bilgilerinizi **Options** nesnesine atayın.

```php
use Sportakal\Garantipos\Models\Options;

$options = new Options();
$options->setMode($_ENV['MODE']);
$options->setApiVersion($_ENV['API_VERSION']);
$options->setTerminalId($_ENV['TERMINAL_ID']);
$options->setTerminalProvUserId($_ENV['TERMINAL_PROV_USER_ID_PAY']);
$options->setTerminalProvUserPassword($_ENV['TERMINAL_PROV_USER_PASSWORD']);
$options->setTerminalUserId($_ENV['TERMINAL_USER_ID']);
$options->setTerminalMerchantId($_ENV['TERMINAL_MERCHANT_ID']);
$options->setStoreKey($_ENV['STORE_KEY']);
```

Kart bilgilerini **Card** nesnesine atayın.

```php
$card = new Card();
$card->setNumber('5549608789641500');
$card->setExpireDate('0323');
$card->setCVV2('712');
```

Müşteri bilgilerini **Customer** nesnesine atayın.

```php
$customer = new Customer();
$customer->setIpAddress('159.146.45.34');
$customer->setEmailAddress('portakalsinan@gmail.com');
```

Sipariş bilgilerini **Order** nesnesine atayın.

```php
$order = new Order();
$order->setOrderID('sportakal_garantipos_' . time());
```

Adres bilgilerini **Address** nesnesine atayın.

```php
$address = new Address();
$address->setType('B'); // B for 'billing' or S for 'shipping'
$address->setName('Sinan');
$address->setLastName('Portakal');
$address->setPhoneNumber('+90 532 345 67 89');
$address->setText('Kınıklı Mah.');
$address->setDistrict('Pamukkale');
$address->setCity('Denizli');
$address->setCountry('Turkey');
```

**addAddress** methoduyla siparişinize ekleyin.

```php
$order->addAddress($address);
```

İşlem bilgilerini **Transaction** nesnesine atayın.

```php
$transaction = new Transaction();
$transaction->setInstallmentCnt("");
$transaction->setAmount(1000);
$transaction->setCurrencyCode('TRY');
$transaction->setCardholderPresentCode('0');
$transaction->setMotoInd('N');
$transaction->setDescription('test payment');
```

Tüm bu nesneleri **RequestModel** nesnesinde toplayın.

```php
$request = new RequestModel();
$request->setOptions($options);
$request->setCard($card);
$request->setCustomer($customer);
$request->setOrder($order);
$request->setTransaction($transaction);
```

RequestModel'i yapacağınız işleme göre **Request** nesnesine atayın.

### 3D Secure'siz işlem için

```php
$request = new \Sportakal\Garantipos\Requests\Pay($request);
```

### İade işlemi için

```php
$request = new \Sportakal\Garantipos\Requests\Refund($request);
```

### 3D Secure Pay işlemi için

```php
$request = new \Sportakal\Garantipos\Requests\ThreeDSecurePay($request);
```

### İşlemlerin sonucu

İşlemin sonucunu aşağıdaki şekilde kontrol edebilirsiniz.

```php
$result = $request->getResult();

$status = $result->getStatus(); //boolean
$message = $result->getStatusMessage(); //string
$error_message = $result->getErrorMessage()); //string
```

3D Secure işlemlerde mdStatusCode ve mdErrorMessage değerleri de döner.

3D Secure işlemi sonucunda veriler, **successUrl** veya **errorUrl** olarak belirlediğiniz adrese post edilir. Bu
adreste aşağıdaki methodla bu verileri yakalayabilirsiniz. Ve mdStatus değerlerini kontrol edebilirsiniz.

```php
$result = new \Sportakal\Garantipos\Results\ThreeDSecurePayResult($options);

$md_status = $result->getMdStatus();
$md_response_message = $result->getResponseMessage();
$md_error_message = $result->getErrorMessage()
```

***/samples*** klasöründe daha fazla örnek bulabilirsiniz.

## Development

Bağımlılıkları yükleyin:

``` bash
composer install
```

## Milestones

* Daha fazla işlem türü eklenecek
    * İptal İşlemi
    * Garanti Pay
    * Bin sorgulama
    * TCKN sorgulama
    * Ön Provizyon işlemleri











