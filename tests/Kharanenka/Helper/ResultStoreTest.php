<?php namespace Kharanenka\Helper\Tests;

use Kharanenka\Helper\Result;
use Kharanenka\Helper\ResultStore;
use PHPUnit\Framework\TestCase;

class ResultStoreTest extends TestCase
{
    public function testGetInstance()
    {
        $this->assertInstanceOf(ResultStore::class, ResultStore::getInstance());
    }

    public function testSetTrue()
    {
        $expected = ['key1' => 'value1', 'key2' => 'value2'];
        $resultStore = Result::setTrue($expected);

        $this->assertInstanceOf(ResultStore::class, $resultStore);
        $this->assertSame($expected, Result::data());
        $this->assertSame($expected, $resultStore->data());
        $this->assertTrue($resultStore->status());
    }

    public function testSetFalse()
    {
        $expected = ['key1' => 'value1', 'key2' => 'value2'];
        $resultStore = Result::setFalse($expected);

        $this->assertInstanceOf(ResultStore::class, $resultStore);
        $this->assertSame($expected, Result::data());
        $this->assertSame($expected, $resultStore->data());
        $this->assertFalse($resultStore->status());
    }

    public function testSetMessage()
    {
        $expected = 'this_is_a_message';
        $resultStore = Result::setMessage($expected);

        $this->assertInstanceOf(ResultStore::class, $resultStore);
        $this->assertSame($expected, Result::message());
        $this->assertSame($expected, $resultStore->message());
    }

    public function testSetCode()
    {
        $expected = 'this_is_error_code_value';
        $resultStore = Result::setCode($expected);

        $this->assertInstanceOf(ResultStore::class, $resultStore);
        $this->assertSame($expected, Result::code());
        $this->assertSame($expected, $resultStore->code());
    }

    public function testSetData()
    {
        $expected = ['key1' => 'value1', 'key2' => 'value2'];
        $resultStore = Result::setData($expected);

        $this->assertInstanceOf(ResultStore::class, $resultStore);
        $this->assertSame($expected, Result::data());
        $this->assertSame($expected, $resultStore->data());
    }

    public function testGet()
    {
        $data = ['key1' => 'value1', 'key2' => 'value2'];
        $message = 'this_is_a_message';
        $code = 'this_is_error_code_value';
        $expected = [
            'status'  => true,
            'data'    => $data,
            'message' => $message,
            'code'    => $code,
        ];
        $resultStore = Result::setTrue($data);
        $resultStore->setMessage($message)->setCode($code);

        $this->assertSame($expected, $resultStore->get());
        $this->assertSame($expected, Result::get());
    }

    public function testGetJSON()
    {
        $data = ['key1' => 'value1', 'key2' => 'value2'];
        $message = 'this_is_a_message';
        $code = 'this_is_error_code_value';
        $expected = '{"status":true,"data":{"key1":"value1","key2":"value2"},"message":"this_is_a_message","code":"this_is_error_code_value"}';
        $resultStore = Result::setTrue($data);
        $resultStore->setMessage($message)->setCode($code);

        $this->assertSame($expected, $resultStore->getJSON());
        $this->assertSame($expected, Result::getJSON());
    }
}
