# Class Result

Universal result store:
 - status (bool)
 - data (mixed)
 - message (string)
 - code (string)
 
#Installation
Require this package in your `composer.json` and update composer.
 
```php

"kharanenka/php-result-store": "2.2.*"

```

# Usage

You can use class "Result" in any places your application. Class "Result" is singleton.

## Set result data methods:
  - setData(mixed $obData) - Set result data
  - setTrue(mixed $obData = null) - Set result data with status "true"
  - setFalse(mixed $obData = null) - Set result data with status "false"
  - setMessage(string $sMessage) - Set message string
  - setCode(string $sCode) - Set code value

## Get result data method:
  - status() - Get result status flag true/false
  - data() - Get data value (object/array/string)
  - message() - Get message value
  - code() - Get code value
  - get() - Get array result array
  - getJSON() - Get array result array in JSON string
  
```php

    //Result array
    [
        'status'    => false/true
        'data'      => object
        'message'   => 'Message text',
        'code'      => 1015,
    ]
```

```php
    //Example 1
    Result::setMessage('Error')->setCode(400)->setFalse();
    
    ...
    if(!Result::status()) {
        return Result::get();
    }
    
    //Example 2
    return Result::setTrue($obData)->getJSON();
```