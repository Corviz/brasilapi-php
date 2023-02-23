# BrasilApi PHP

A PHP SDK for BrasilAPI project (PHP 8.1+)

## Install with composer

```
composer require corviz/brasilapi-php
```

## How to use

* Every api segment (or sub-path) is represented by a class in this SDK. Eg: 
  * `/banks/` -> `BanksApi`
  * `/cep/` -> `CepApi`
  * `/cnpj/` -> `CnpjApi`
  *  And so on...
* Each api response is stored into a data transfer object (`BankData`, `CnpjData`, etc...)
* Every unsuccessful request will throw an `GuzzleException`
* All indexes have the same name as documented in the [official api docs](https://brasilapi.com.br/docs). 
* Indexes that are composed by two or more words, are formatted as **lowerSnakeCase** 

## Environment variables

`BRASILAPI_TIMEOUT` - maximum request time in seconds

`BRASILAPI_PROXY` - Proxy configuration for guzzle (ip)

## Usage examples

### Example 1. Listing all banks:

```php
use Corviz\BrasilAPI\BankApi;

$banks = BankApi::all();

foreach ($banks as $bank) {
    echo $bank->code, ' - ', $bank->name;
}
```

### Example 2. Show address data by CEP (ZIP code)

```php
use Corviz\BrasilAPI\CepApi;

$address = CepApi::get('13087901');

echo $address->street; //Avenida Guilherme Campos
echo $address->neighborhood; //Jardim Santa Genebra
echo $address->city; //Campinas

//and so on... 
```
