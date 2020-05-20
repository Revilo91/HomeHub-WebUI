<?php

// HM-RC-19|General-Funkfernbedienung:0|BidCos-RF||0|VISIBLE=|OPERATE=|UNREACH=1503|STICKY_UNREACH=1499|CONFIG_PENDING=1491|LOWBAT=1495|RSSI_DEVICE=27657|RSSI_PEER=27658|
// HM-RC-19|FB1-Tor Nord öffnen|BidCos-RF||1|VISIBLE=true|OPERATE=true|PRESS_SHORT=1510|PRESS_LONG=1509|
// HM-RC-19|FB2-Eingangstür Süd öffnen|BidCos-RF||2|VISIBLE=true|OPERATE=true|PRESS_SHORT=1514|PRESS_LONG=1513|
// HM-RC-19|FB3-Abluft Glashaus Gebläse|BidCos-RF||3|VISIBLE=true|OPERATE=true|PRESS_SHORT=1518|PRESS_LONG=1517|
// bis 17

// LOWBAT wird nicht angezeigt

// Validated by ColleLupi

function HmIP_WRC6($component) {

    global $export;
    $obj = $export;
    $key = array_search(substr($component['address'], 0, -1)."0", array_column($obj['channels'], 'address'));
    foreach($obj['channels'][$key]['datapoints'] as $datapoint)
    { $status_component[$datapoint['type']] = $datapoint['ise_id']; }



    if ($component['parent_device_interface'] == 'HmIP-RF' && $component['visible'] == 'true' && isset($status_component['PRESS_SHORT'])) {
        return '<div class="hh">'
            . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
            . '<div class="pull-right">'
                . '<span class="set btn-text" data-set-id="' . $status_component['PRESS_SHORT'] . '" data-set-value="1">Kurz</span>'
                . '<span class="set btn-text" data-set-id="' . $status_component['PRESS_LONG'] . '" data-set-value="1">Lang</span>'
            . '</div>'
            . '<div class="clearfix"></div>'
        . '</div>';
    }
}
