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

    public function testCalcStorageFee()
    {
        $result = $this->_utils->calcStorageFee((new ParamsOfCalcStorageFee())
            ->setAccount("te6ccgECHQEAA/wAAnfAArtKDoOR5+qId/SCUGSSS9Qc4RD86X6TnTMjmZ4e+7EyOobmQvsHNngAAAg6t/34DgJWKJuuOehjU0ADAQFBlcBqp0PR+QAN1kt1SY8QavS350RCNNfeZ+ommI9hgd/gAgBToB6t2E3E7a7aW2YkvXv2hTmSWVRTvSYmCVdH4HjgZ4Z94AAAAAvsHNwwAib/APSkICLAAZL0oOGK7VNYMPShBgQBCvSkIPShBQAAAgEgCgcBAv8IAf5/Ie1E0CDXScIBn9P/0wD0Bfhqf/hh+Gb4Yo4b9AVt+GpwAYBA9A7yvdcL//hicPhjcPhmf/hh4tMAAY4SgQIA1xgg+QFY+EIg+GX5EPKo3iP4RSBukjBw3vhCuvLgZSHTP9MfNCD4I7zyuSL5ACD4SoEBAPQOIJEx3vLQZvgACQA2IPhKI8jLP1mBAQD0Q/hqXwTTHwHwAfhHbvJ8AgEgEQsCAVgPDAEJuOiY/FANAdb4QW6OEu1E0NP/0wD0Bfhqf/hh+Gb4Yt7RcG1vAvhKgQEA9IaVAdcLP3+TcHBw4pEgjjJfM8gizwv/Ic8LPzExAW8iIaQDWYAg9ENvAjQi+EqBAQD0fJUB1ws/f5NwcHDiAjUzMehfAyHA/w4AmI4uI9DTAfpAMDHIz4cgzo0EAAAAAAAAAAAAAAAAD3RMfijPFiFvIgLLH/QAyXH7AN4wwP+OEvhCyMv/+EbPCwD4SgH0AMntVN5/+GcBCbkWq+fwEAC2+EFujjbtRNAg10nCAZ/T/9MA9AX4an/4Yfhm+GKOG/QFbfhqcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLe+Ebyc3H4ZtH4APhCyMv/+EbPCwD4SgH0AMntVH/4ZwIBIBUSAQm7Fe+TWBMBtvhBbo4S7UTQ0//TAPQF+Gp/+GH4Zvhi3vpA1w1/ldTR0NN/39cMAJXU0dDSAN/RVHEgyM+FgMoAc89AzgH6AoBrz0DJc/sA+EqBAQD0hpUB1ws/f5NwcHDikSAUAISOKCH4I7ubIvhKgQEA9Fsw+GreIvhKgQEA9HyVAdcLP3+TcHBw4gI1MzHoXwb4QsjL//hGzwsA+EoB9ADJ7VR/+GcCASAYFgEJuORhh1AXAL74QW6OEu1E0NP/0wD0Bfhqf/hh+Gb4Yt7U0fhFIG6SMHDe+EK68uBl+AD4QsjL//hGzwsA+EoB9ADJ7VT4DyD7BCDQ7R7tU/ACMPhCyMv/+EbPCwD4SgH0AMntVH/4ZwIC2hsZAQFIGgAs+ELIy//4Rs8LAPhKAfQAye1U+A/yAAEBSBwAWHAi0NYCMdIAMNwhxwDcIdcNH/K8UxHdwQQighD////9vLHyfAHwAfhHbvJ8")
            ->setPeriod(1000));

        $this->assertEquals("330", $result->getFee());
    }

    public function testCalcStorageFee_async()
    {
        $result = $this->_utils->async()
            ->calcStorageFeeAsync((new ParamsOfCalcStorageFee())
                ->setAccount("te6ccgECHQEAA/wAAnfAArtKDoOR5+qId/SCUGSSS9Qc4RD86X6TnTMjmZ4e+7EyOobmQvsHNngAAAg6t/34DgJWKJuuOehjU0ADAQFBlcBqp0PR+QAN1kt1SY8QavS350RCNNfeZ+ommI9hgd/gAgBToB6t2E3E7a7aW2YkvXv2hTmSWVRTvSYmCVdH4HjgZ4Z94AAAAAvsHNwwAib/APSkICLAAZL0oOGK7VNYMPShBgQBCvSkIPShBQAAAgEgCgcBAv8IAf5/Ie1E0CDXScIBn9P/0wD0Bfhqf/hh+Gb4Yo4b9AVt+GpwAYBA9A7yvdcL//hicPhjcPhmf/hh4tMAAY4SgQIA1xgg+QFY+EIg+GX5EPKo3iP4RSBukjBw3vhCuvLgZSHTP9MfNCD4I7zyuSL5ACD4SoEBAPQOIJEx3vLQZvgACQA2IPhKI8jLP1mBAQD0Q/hqXwTTHwHwAfhHbvJ8AgEgEQsCAVgPDAEJuOiY/FANAdb4QW6OEu1E0NP/0wD0Bfhqf/hh+Gb4Yt7RcG1vAvhKgQEA9IaVAdcLP3+TcHBw4pEgjjJfM8gizwv/Ic8LPzExAW8iIaQDWYAg9ENvAjQi+EqBAQD0fJUB1ws/f5NwcHDiAjUzMehfAyHA/w4AmI4uI9DTAfpAMDHIz4cgzo0EAAAAAAAAAAAAAAAAD3RMfijPFiFvIgLLH/QAyXH7AN4wwP+OEvhCyMv/+EbPCwD4SgH0AMntVN5/+GcBCbkWq+fwEAC2+EFujjbtRNAg10nCAZ/T/9MA9AX4an/4Yfhm+GKOG/QFbfhqcAGAQPQO8r3XC//4YnD4Y3D4Zn/4YeLe+Ebyc3H4ZtH4APhCyMv/+EbPCwD4SgH0AMntVH/4ZwIBIBUSAQm7Fe+TWBMBtvhBbo4S7UTQ0//TAPQF+Gp/+GH4Zvhi3vpA1w1/ldTR0NN/39cMAJXU0dDSAN/RVHEgyM+FgMoAc89AzgH6AoBrz0DJc/sA+EqBAQD0hpUB1ws/f5NwcHDikSAUAISOKCH4I7ubIvhKgQEA9Fsw+GreIvhKgQEA9HyVAdcLP3+TcHBw4gI1MzHoXwb4QsjL//hGzwsA+EoB9ADJ7VR/+GcCASAYFgEJuORhh1AXAL74QW6OEu1E0NP/0wD0Bfhqf/hh+Gb4Yt7U0fhFIG6SMHDe+EK68uBl+AD4QsjL//hGzwsA+EoB9ADJ7VT4DyD7BCDQ7R7tU/ACMPhCyMv/+EbPCwD4SgH0AMntVH/4ZwIC2hsZAQFIGgAs+ELIy//4Rs8LAPhKAfQAye1U+A/yAAEBSBwAWHAi0NYCMdIAMNwhxwDcIdcNH/K8UxHdwQQighD////9vLHyfAHwAfhHbvJ8")
                ->setPeriod(1000))
            ->await();

        $this->assertEquals("330", $result->getFee());
    }
}