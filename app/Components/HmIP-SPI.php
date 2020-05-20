<?php

// HM-Sec-MDIR-2|Bewegungsmelder George:0||VISIBLE=|OPERATE=|UNREACH=15714|STICKY_UNREACH=15710|CONFIG_PENDING=15695|LOWBAT=15704|RSSI_DEVICE=15708|RSSI_PEER=15709|DEVICE_IN_BOOTLOADER=15699|UPDATE_PENDING=15718|
// HM-Sec-MDIR-2|BM George||VISIBLE=true|OPERATE=true|BRIGHTNESS=15723|MOTION=15747|ERROR=15724|

// Validated by Manu

function HmIP_SPI($component) {
    if ($component['parent_device_interface'] == 'HmIP-RF' && $component['visible'] == 'true' && isset($component['PRESENCE_DETECTION_STATE'])) {
        return '<div class="hh">'
            . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
            . '<div class="pull-right">'
                . '<span class="info" data-id="' . ($component['ILLUMINATION']-82) . '" data-component="' . $component['component'] . '" data-datapoint="LOWBAT"></span>'
                . '<span class="info" data-id="' . $component['CURRENT_ILLUMINATION'] . '" data-component="' . $component['component'] . '" data-datapoint="CURRENT_ILLUMINATION"></span>'
                . '<span class="info" data-id="' . $component['ILLUMINATION'] . '" data-component="' . $component['component'] . '" data-datapoint="ILLUMINATION"></span>'
                . '<span class="info" data-id="' . $component['PRESENCE_DETECTION_STATE'] . '" data-component="' . $component['component'] . '" data-datapoint="PRESENCE_DETECTION_STATE"></span>'
            . '</div>'
            . '<div class="clearfix"></div>'
        . '</div>';
    }
}
