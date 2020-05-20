<?php

// validated by Revilo91

function HM_Sen_LI_O($component) {
    if ($component['parent_device_interface'] == 'BidCos-RF' && $component['visible'] == 'true' && isset($component['LUX'])) {
        if (!isset($component['color'])) $component['color'] = '#00CC33';
        return '<div class="hh"style=\'border-left-color: '.$component['color'].'; border-left-style: solid;\'>'
            . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
            . '<div class="pull-right">'
                . '<span class="info" data-id="' . $component['LUX'] . '" data-component="' . $component['component'] . '" data-datapoint="LUX"></span>'
            . '</div>'
            . '<div class="clearfix"></div>'
        . '</div>';
    }
}
