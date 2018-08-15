<?php

namespace App\Http\Repos;
use App\Http\Models\Agency as Model;
use App\Http\Models\Customer;

class AgencyRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    private function _common($agencyID)
    {
        $agency = $this->find($agencyID);
        return $agency->flats()
            ->with('customer', 'building');
    }

    public function customers($agencyID)
    {
        return $this->_common($agencyID);
    }

    public function filterAccountID($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->wherePivot('accountid', $query);
    }

    public function filterFlatName($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->where('name', $query);
    }

    public function filterCustomerName($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->whereHas('customer', function($qr) use ($query) {
               $qr->where('fullname', trim($query));
            });
    }


}