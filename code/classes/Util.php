<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author usager
 */
class Util {
    public static function getSelect($t,$selected='', $name='list',$useKeysAsOptionValues=false) {
        $s = "<select name='".$name."' id='".$name."'>";
        foreach ($t as $key => $value) {
            $s = $s."<option value='".(($useKeysAsOptionValues)?$key:$value)."'";
            if ((($useKeysAsOptionValues)?$key:$value) == $selected)  
                    $s .= " selected='selected'";
            $s = $s.">".$value."</option>";
        }
        $s = $s."</select>";
        return $s;
    }
    public static function deleteFile($f) {
        return realpath($f); //unlink($f);
    }
}
