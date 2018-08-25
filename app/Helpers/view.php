<?php

if(!function_exists('customer_agency_color')) {
    function customer_agency_color($flatModel, $agencyModel, $customColors=[]){
        $colors = [
            'danger'    => 'danger',
            'warning'   => 'warning',
            'success'   =>  'mint'
        ];

        $colors = array_merge($colors, $customColors);
        $currentBalance = qr_getFlatAgencyCurrentBalance($flatModel, $agencyModel);
        $charge = qr_getFlatAgencyBill($flatModel, $agencyModel);

        //dd($charge);

        if ($currentBalance < $charge) {

            $lastServicedDate = qr_lastAgencyServiceDate($flatModel, $agencyModel);
            $now = sqldate();
            $diffDays = diff_in('days', $lastServicedDate, $now);
            $dangerDays = 10;
            $circleDays = qr_getAgencyServicechargedays($agencyModel);
            if (!$lastServicedDate || ($circleDays - $diffDays) <= $dangerDays) {
                return $colors['danger'];
            }

            return $colors['warning'];
        }

        return $colors['success'];
    }

    if(!function_exists('customer_agency_balance')) {
        function customer_agency_balance($flatModel, $agencyModel){
            return format_currency(qr_getFlatAgencyCurrentBalance($flatModel, $agencyModel), true);
        }
    }

    //returns arrears object or 'balance' string
    if(!function_exists('billOrBalance')) {
        function billOrBalance($flatModel, $agencyModel){
            $arrears = qr_getFlatAgencyBillingArrear($flatModel, $agencyModel);
            $lastServicedDate = qr_lastAgencyServiceDate($flatModel, $agencyModel);
            $now = sqldate();
            $diffDays = diff_in('days', $lastServicedDate, $now);
            $dangerDays = 10;
            $circleDays = qr_getAgencyServicechargedays($agencyModel);
            if ($arrears && ($circleDays - $diffDays) <= $dangerDays) {
               return $arrears;
            }

            return 'balance';
        }
    }
}