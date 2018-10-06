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
            ->wherePivot('accountid', 'like', '%'. trim($query) . '%');
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

    public function TCstaff_createAgency($request)
    {
        $agencyDataArr = $request->only([
            'name',
            'address',
            'lga_id',
            'email',
            'phone',
            'alt_phone',
            'description',
            'bank_id',
            'bank_account_number',
            'bank_account_name',
            'bank_bvn',
            'agencystatus_id',
            'agencycategory_id',
            'agencymode_id',
        ]);

        $agencyDataArr['tcstaff_id'] = user()->profile_id;
        $agencyDataArr['token'] = generate_token(8, $this->model);

        //We first create agency in DB
        $agencyModel = $this->create($agencyDataArr);

        //Create Agency default config in DB
        $agencyModel->agencyconfig()
            ->create(factory(\App\Http\Models\Agencyconfig::class)->make()->toArray());

        //Create agency default staff as owner in DB
        $staffModel = $agencyModel->agencystaffs()
            ->create([
                'fullname'  =>  $request->admin_fullname,
                'address'   =>  $request->admin_address,
                'lga_id'    =>  $request->admin_lga_id,
                'alt_phone' =>  $request->admin_alt_phone,
                'token'     =>  generate_token(8, new \App\Http\Models\Agencystaff()),
                'is_admin'  =>  1
            ]);

        //Creating agency staff users
        return $staffModel->user()
            ->create([
                'gender_id' =>  $request->admin_gender_id,
                'email'     =>  $request->admin_email,
                'phone'     =>  $request->admin_phone,
                'password'  =>  str_random(6)
            ]);
    }
}