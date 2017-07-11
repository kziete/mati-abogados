<?php

class Cl_Traza {

    public function Cl_Traza($param) {
        $traza = fopen("traza.log", "w");
        fwrite($traza, $param);
        fclose($traza);
    }

}
