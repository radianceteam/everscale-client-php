<?php declare(strict_types=1);

namespace TON\Utils;

use TON\AbstractModuleTestCase;

class UtilsModuleTests extends AbstractModuleTestCase
{
    private UtilsModule $_utils;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_utils = new UtilsModule($this->_context);
    }

    public function testConvertAddress_hex()
    {
        $converted = $this->_utils->convertAddress(
            (new ParamsOfConvertAddress())
                ->setAddress("fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260")
                ->setOutputFormat(new AddressStringFormat_Hex()));

        $this->assertEquals(
            "0:fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260",
            $converted->getAddress());
    }

    public function testConvertAddress_accountId()
    {
        $converted = $this->_utils->convertAddress(
            (new ParamsOfConvertAddress())
                ->setAddress("fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260")
                ->setOutputFormat(new AddressStringFormat_AccountId()));

        $this->assertEquals(
            "fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260",
            $converted->getAddress());
    }

    public function testConvertAddress_base64()
    {
        $converted = $this->_utils->convertAddress(
            (new ParamsOfConvertAddress())
                ->setAddress("-1:fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260")
                ->setOutputFormat(new AddressStringFormat_Base64()));

        $this->assertEquals(
            "Uf/8uRo6OBbQ97jCx2EIuKm8Wmt6Vb15+KsQHFLbKSMiYG+9",
            $converted->getAddress());
    }

    public function testConvertAddress_base64_options()
    {
        $converted = $this->_utils->convertAddress(
            (new ParamsOfConvertAddress())
                ->setAddress("Uf/8uRo6OBbQ97jCx2EIuKm8Wmt6Vb15+KsQHFLbKSMiYG+9")
                ->setOutputFormat((new AddressStringFormat_Base64())
                    ->setBounce(true)
                    ->setTest(true)
                    ->setUrl(true)));

        $this->assertEquals(
            "kf_8uRo6OBbQ97jCx2EIuKm8Wmt6Vb15-KsQHFLbKSMiYIny",
            $converted->getAddress());
    }

    public function testConvertAddress_hex2()
    {
        $converted = $this->_utils->convertAddress(
            (new ParamsOfConvertAddress())
                ->setAddress("kf_8uRo6OBbQ97jCx2EIuKm8Wmt6Vb15-KsQHFLbKSMiYIny")
                ->setOutputFormat(new AddressStringFormat_Hex()));

        $this->assertEquals(
            "-1:fcb91a3a3816d0f7b8c2c76108b8a9bc5a6b7a55bd79f8ab101c52db29232260",
            $converted->getAddress());

    }
}