<?php

//SysVar|Anwesenheit||ISE_ID=4601|VARIABLE=1|VALUE=true|VALUE_LIST=|MIN=|MAX=|UNIT=|TYPE=2|SUBTYPE=2|LOGGED=false|VISIBLE=true|TIMESTAMP=1443707626|VALUE_NAME_0=abwesend|VALUE_NAME_1=anwesend|
//SysVar|Sonne Azimut||ISE_ID=5920|VARIABLE=300.400000|VALUE=300.400000|VALUE_LIST=|MIN=-360|MAX=360|UNIT=°|TYPE=4|SUBTYPE=0|LOGGED=false|VISIBLE=true|TIMESTAMP=1446322800|VALUE_NAME_0=|VALUE_NAME_1=|
//SysVar|Waschmaschine Status||ISE_ID=7284|VARIABLE=2|VALUE=2|VALUE_LIST=aus;läuft;fertig|MIN=|MAX=|UNIT=|TYPE=16|SUBTYPE=29|LOGGED=false|VISIBLE=true|TIMESTAMP=1443709817|VALUE_NAME_0=|VALUE_NAME_1=|
//SysVar|CCU Boot Zeit||ISE_ID=5580|VARIABLE=14.09.2015 21:17:46 Uhr|VALUE=14.09.2015 21:17:46 Uhr|VALUE_LIST=|MIN=|MAX=|UNIT=|TYPE=20|SUBTYPE=11|LOGGED=false|VISIBLE=true|TIMESTAMP=1442258266|VALUE_NAME_0=|VALUE_NAME_1=|

function SysVar($component) {
    if ($component['visible'] == 'true' && isset($component['ise_id'])) {
        switch($component['type']) {
            case '2':
                // True / False
                $valueList = '';
                if($component['value_name_0'] <> '' ||$component['value_name_1'] <> '') {
                    $valueList = $component['value_name_0'].';'.$component['value_name_1'];
                }
                
                // Farben invertieren?
                if(!isset($component['invert_color'])) {
                    $component['invert_color'] = 'false';
                }

                return '<div class="hh">'
                    . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
                    . '<div class="pull-right">'
                        . '<span class="info set" data-id="' . $component['ise_id'] . '" data-component="' . $component['component'] . '" data-datapoint="2" data-unit="' . htmlentities($component['unit']) . '" data-set-id="' . $component['ise_id'] . '" data-set-value="" data-valuelist="'.$valueList.'" data-invert-color="' . $component['invert_color'] . '"></span>'
                    . '</div>'
                    . '<div class="clearfix"></div>'
                . '</div>';

                break;
            case '4':
                // Number
                $modalId = mt_rand();
        
                return '<div class="hh">'
                    . '<div data-toggle="collapse" data-target="#' . $modalId . '">'
                        . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
                        . '<div class="pull-right">'
                            . '<span class="info" data-id="' . $component['ise_id'] . '" data-component="' . $component['component'] . '" data-datapoint="4" data-unit="' . htmlentities($component['unit']) . '"></span>'
                        . '</div>'
                        . '<div class="clearfix"></div>'
                    . '</div>'
                    . '<div class="hh2 collapse" id="' . $modalId . '">'
                        . '<div class="row text-center">'
                            . '<div class="form-inline">'
                                . '<div class="input-group">'
                                    . '<input type="number" name="' . $component['ise_id'] . '" min="' . $component['min'] . '" max="' . $component['max'] . '" class="form-control" placeholder="Zahl eingeben">'
                                    . '<span class="input-group-btn">'
                                        . '<button class="btn btn-primary set" data-datapoint="4" data-set-id="' . $component['ise_id'] . '" data-set-value="">OK</button>'
                                    . '</span>'
                                . '</div>'
                            . '</div>'
                        . '</div>'
                    . '</div>'
                . '</div>';

                break;
            case '16':
                // Value List
                $modalId = mt_rand();
        
                $valueList = '';
                if($component['value_list'] <> '') {
                    $valueList = $component['value_list'];
                    
                    $dummy = explode(';', $valueList);
                    $buttons = '';
                    foreach($dummy as $key => $value) {
                        $buttons .= '<button type="button" class="btn btn-primary set" data-set-id="' . $component['ise_id'] . '" data-set-value="' . $key .'">'
                            . $value
                        . '</button>';
                    }
                }

                return '<div class="hh">'
                    . '<div data-toggle="collapse" data-target="#' . $modalId . '">'
                        . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
                        . '<div class="pull-right">'
                            . '<span class="info" data-id="' . $component['ise_id'] . '" data-component="' . $component['component'] . '" data-datapoint="16" data-unit="' . htmlentities($component['unit']) . '" data-valuelist="'.$valueList.'"></span>'
                        . '</div>'
                        . '<div class="clearfix"></div>'
                    . '</div>'
                    . '<div class="hh2 collapse" id="' . $modalId . '">'
                        . '<div class="row text-center">'
                            . '<div class="btn-group">'
                                . $buttons
                            . '</div>'
                        . '</div>'
                    . '</div>'
                . '</div>';
            case '20':
                // Text
                $modalId = mt_rand();
        
                return '<div class="hh">'
                    . '<div data-toggle="collapse" data-target="#' . $modalId . '">'
                        . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
                        . '<div class="pull-right">'
                            . '<span class="info" data-id="' . $component['ise_id'] . '" data-component="' . $component['component'] . '" data-datapoint="20" data-unit="' . htmlentities($component['unit']) . '"></span>'
                        . '</div>'
                        . '<div class="clearfix"></div>'
                    . '</div>'
                    . '<div class="hh2 collapse" id="' . $modalId . '">'
                        . '<div class="row text-center">'
                            . '<div class="form-inline">'
                                . '<div class="input-group">'
                                    . '<input type="text" name="' . $component['ise_id'] . '" class="form-control" placeholder="Text eingeben">'
                                    . '<span class="input-group-btn">'
                                        . '<button class="btn btn-primary set" data-datapoint="20" data-set-id="' . $component['ise_id'] . '" data-set-value="">OK</button>'
                                    . '</span>'
                                . '</div>'
                            . '</div>'
                        . '</div>'
                    . '</div>'
                . '</div>';
            default:
                return '<div class="hh">'
                    . '<div class="pull-left"><img src="../assets/icons/' . $component["icon"] . '" class="icon">' . $component['name'] . '</div>'
                    . '<div class="pull-right">'
                        . '<span class="info" data-id="' . $component['ise_id'] . '" data-component="' . $component['component'] . '" data-datapoint="ise_id" data-unit="' . htmlentities($component['unit']) . '"></span>'
                    . '</div>'
                    . '<div class="clearfix"></div>'
                . '</div>';
        }
    }
}