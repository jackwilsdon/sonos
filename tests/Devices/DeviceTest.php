<?php

namespace duncan3dc\SonosTests\Devices;

use duncan3dc\ObjectIntruder\Intruder;
use duncan3dc\Sonos\Devices\Device;
use duncan3dc\SonosTests\MockTest;

class DeviceTest extends MockTest
{

    public function modelProvider()
    {
        $speakers = [
            "S1",
            "S12",
            "S3",
            "S5",
            "S6",
            "S9",
            "ZP80",
            "ZP90",
            "ZP100",
            "ZP120",
        ];
        foreach ($speakers as $model) {
            yield [$model, true];
        }

        $others = [
            "ZB100",
            "",
            0,
            false,
        ];
        foreach ($others as $model) {
            yield [$model, false];
        }
    }
    /**
     * @dataProvider modelProvider
     */
    public function testIsSpeaker($model, bool $expected): void
    {
        $device = new Intruder(new Device("127.0.0.1"));

        $device->model = $model;

        $this->assertSame($expected, $device->isSpeaker());
    }
}
