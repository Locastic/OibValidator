# OibValidator
Symfony oib validator based on oib rules for Croatian citizens ID number which include rules determined and assigned by the Tax Administration like mod 11 check digit. 


<h1 align="center">
    <a href="https://packagist.org/packages/locastic/oib-validator" title="License" target="_blank">
        <img src="https://img.shields.io/packagist/l/locastic/oib-validator.svg" />
    </a>
    <a href="https://packagist.org/packages/locastic/oib-validator" title="Version" target="_blank">
        <img src="https://img.shields.io/packagist/v/Locastic/oib-validator.svg" />
    </a>
    <a href="https://travis-ci.org/Locastic/OibValidator" title="Build status" target="_blank">
        <img src="https://img.shields.io/travis/Locastic/OibValidator/master.svg" />
    </a>
    <a href="https://scrutinizer-ci.com/g/Locastic/OibValidator/" title="Scrutinizer" target="_blank">
        <img src="https://img.shields.io/scrutinizer/g/Locastic/OibValidator.svg" />
    </a>
    <a href="https://packagist.org/packages/locastic/oib-validator" title="Total Downloads" target="_blank">
        <img src="https://poser.pugx.org/locastic/oib-validator/downloads" />
    </a>
</h1>

## Overview

The Personal identification number (hrv. Osobni identifikacijski broj or OIB) is a permanent national identification number of every Croatian citizen and legal persons domiciled in the Republic of Croatia.



## Installation
 
 ```
 composer require locastic/oib-validator
 ```
 ## Annotations
 
 If you are using annotations for validation, include the constraints namespace:
 
 ```php
 use Locastic\Component\OibValidator\Validator\Constraints as LocasticOib;
 ```
 
 and then add the OibValidator constraint to the relevant field:
 
 ```php
 /**
  * @LocasticOib\OibValidator
  */
 protected $oib;
 ```
 
 ## YAML
  ```yaml
  App\Entity\Company:
      properties:
          oib:
              - Locastic\Component\OibValidator\Validator\Constraints\OibValidator
   ```
  
  ## Support
  
  Need help at your project? Write us an email on info@locastic.com