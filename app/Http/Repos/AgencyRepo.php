<?php

namespace App\Http\Repos;
use App\Http\Models\Agency as Model;

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
            ->with('customer', 'building.lga.state');
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
            ->where('name', 'like', '%'. trim($query) . '%');
    }

    public function filterCustomerName($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->whereHas('customer', function($qr) use ($query) {
               $qr->where('fullname', 'like', '%'. trim($query) . '%');
            });
    }

    public function filterStateName($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->whereHas('building.lga.state', function($qr) use ($query) {
               $qr->where('name', 'like', '%'. trim($query) . '%');
            });
    }

    public function filterLgaName($agencyID, $query)
    {
        return $this->_common($agencyID)
            ->whereHas('building.lga', function($qr) use ($query) {
                $qr->where('name', 'like', '%'. trim($query) . '%');
            });
    }

    public function serviceCustomerHistory($agencyid, $flatid)
    {
        return $this->find($agencyid)
            ->servicedhistories()
            ->where('flat_id', $flatid)
            ->with(['agencystaff' => function($qr) {
                $qr->select('id', 'fullname');
            }, 'servicestatus'])
            ->select('servicedhistories.*');
    }
}