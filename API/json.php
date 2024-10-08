<?php

class json {
    function &jsonEncode(&$array) {
        $json = '';
        $first = true;
        foreach($array as $key => $value) {
            if(!$first) {
                $json .= ',';
            }
            $json .= '"' . $key . '":';
            if(is_array($value)) {
                $json .= $this->jsonEncode($value);
            } else {
                $json .= '"' . utf8_encode($value) . '"';
            }
            $first = false;
        }
        $json = '{' . $json . '}';
        return $json;
    }
}