# Class Result

Generation universal response:
 - result (bool)
 - data: (bool | number | string | array | object)
 
#Installation
Require this package in your `composer.json` and update composer.
 
```php
"kharanenka/result": "1.0.*"
```

# Usage

You can use class "Result" in any places your application. Class "Result" is singleton.

```php
    use Kharanenka\Helper\Result;
    
    //Check errors
    if($bHasError) {
        $sMessage = 'Error message text';
        return Result::setFalse($sMessage)->get();
    }
    
    ...
    //Call check function
    check();
    if(!Result::flag()) {
        return Result::get();
    }
    
    ...
    //Get result data
    $arData = [
        'id' => 6,
        'name' => 'Andrey',
    ];
    
    return Result::setTrue($arData)->get();
    
    ...
    function check() {
        if($bHasError) {
            $sMessage = 'Error message text';
            return Result::setFalse($sMessage);
        }
    }
```