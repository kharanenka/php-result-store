<?php namespace Kharanenka\Helper;

/**
 * Generate universal result answer
 *
 * Class Result
 * @package Kharanenka\Helper
 * @author Andrey Kharanenka, kharanenka@gmail.com
 */

class Result {

    /**
     * Status of result (true|false)
     * @var bool
     */
    private $bResult = false;

    /**
     * Data of result
     * @var mixed
     */
    private $obData;

    /** @var Result */
    private static $obThis =  null;

    private function __construct() {}

    /**
     * @return Result
     */
    private static function getInstance() {

        if(empty(self::$obThis)) {
            self::$obThis = new Result();
        }

        return self::$obThis;
    }

    /**
     * Set status of result in true
     * Set data of result
     * @param mixed $obData
     * @return Result
     */
    public static function setTrue($obData = null) {

        $obThis = self::getInstance();
        $obThis->bResult  = true;
        $obThis->obData = $obData;
        return $obThis;
    }

    /**
     * Set status of result in false
     * Set data of result
     * @param mixed $obData
     * @return Result
     */
    public static function setFalse($obData = null) {

        $obThis = self::getInstance();
        $obThis->bResult  = false;
        $obThis->obData = $obData;
        return $obThis;
    }

    /**
     * @return bool
     */
    public static function result() {

        $obThis = self::getInstance();
        return $obThis->bResult;
    }

    /**
     * @return mixed
     */
    public static function data() {

        $obThis = self::getInstance();
        return $obThis->obData;
    }

    /**
     * @return array
     */
    public static function get() {

        $obThis = self::getInstance();

        return [
            'result' => $obThis->bResult,
            'data'   => $obThis->obData,
        ];

    }

    /**
     * Generate result JSON string
     * @return string
     */
    public static function getJSON() {

        $obThis = self::getInstance();
        return json_encode($obThis->get());
    }
}