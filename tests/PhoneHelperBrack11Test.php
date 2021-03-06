<?php

require_once 'vendor/autoload.php';

use Manny\PhoneHelper\Brack11;
use PHPUnit\Framework\TestCase;

class PhoneHelperBrack11Test extends TestCase
{
    public function test_blank_string()
    {
        $this->assertEquals((new Brack11(''))->format(), '');
    }

    public function test_1_char()
    {
        $this->assertEquals((new Brack11('8'))->format(), '1 (8');
    }

    public function test_leading_1()
    {
        $this->assertEquals((new Brack11('1'))->format(), '1');
    }

    public function test_4_char()
    {
        $this->assertEquals((new Brack11('8008'))->format(), '1 (800) 8');
    }

    public function test_full()
    {
        $this->assertEquals((new Brack11('8008008000'))->format(), '1 (800) 800-8000');
    }

    public function test_leading_one_full()
    {
        $this->assertEquals((new Brack11('18008008000'))->format(), '1 (800) 800-8000');
    }

    public function test_overflow()
    {
        $this->assertEquals((new Brack11('8008008000123456'))->format(), '1 (800) 800-8000');
    }

    public function test_leading_one_overflow()
    {
        $this->assertEquals((new Brack11('18008008000123456'))->format(), '1 (800) 800-8000');
    }

    public function test_invalid()
    {
        $this->assertEquals((new Brack11('Where in the World Is Carmen Sandiego?'))->format(), '');
    }
}
