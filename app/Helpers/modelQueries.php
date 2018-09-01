<?php

//This would fetch the last date an agency serviced this flat
if(! function_exists('qr_lastAgencyService') ){
    function qr_lastAgencyService($flat, $agency){
        return $flat->servicedhistories()
            ->where('agency_id', $agency->id)
            ->latest()
            ->first();
    }
}

//This would fetch the last date an agency serviced this flat
if(! function_exists('qr_lastAgencyServiceDate') ){
    function qr_lastAgencyServiceDate($flat, $agency){
        $data = qr_lastAgencyService($flat, $agency);
        return ($data) ? $data->created_at : null;
    }
}

//This would fetch the last date an agency serviced this flat
if(! function_exists('qr_lastAgencySuccessServiceDate') ){
    function qr_lastAgencySuccessServiceDate($flat, $agency){
        return $flat->servicedhistories()
            ->where('agency_id', $agency->id)
            ->success()
            ->latest()
            ->first();
    }
}

if(! function_exists('qr_getAgencyConfig') ){
    function qr_getAgencyConfig($agency, $option = null){
        $config = json_decode($agency->agencyconfig->tcagencyoptions);
        return ($option) ? $config->$option : $config;
    }
}

if(! function_exists('qr_getAgencyServicechargedays') ){
    function qr_getAgencyServicechargedays($agency){
        return qr_getAgencyConfig($agency, 'servicechargedays');
    }
}


if(! function_exists('qr_getFlatAgencyBill') ){
    function qr_getFlatAgencyBill($flat, $agency){
        return $flat->agencybilling($agency->id)->first()->amount;
    }
}

if(! function_exists('qr_getFlatAgencyCurrentBalance') ){
    function qr_getFlatAgencyCurrentBalance($flat, $agency){
        $currentFlatToAgencyBalance = $flat->agencies()
            ->where('agency_id', $agency->id)
            ->first()->pivot->agency_balance;
        return $currentFlatToAgencyBalance;
    }
}

if(! function_exists('qr_getFlatAgencyBillingArrear') ){
    function qr_getFlatAgencyBillingArrear($flat, $agency){
        $arrear = $flat->agencybillingarrears()
            ->where('agency_id', $agency->id)
            ->unpaids()
            ->first();
        return $arrear;
    }
}