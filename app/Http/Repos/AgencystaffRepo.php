<?php

namespace App\Http\Repos;
use App\Http\Models\Agencystaff as Model;

class AgencystaffRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function saveStaff($request, $user)
    {
        //Lets save at agencystaff first
        $profile['fullname'] = $request->fullname;
        if($request->alt_phone) {
            $profile['alt_phone'] = $request->alt_phone;
        }
        $profile['address'] = $request->address;
        $profile['lga_id'] = $request->lga;
        $profile['agency_id'] = $user->profile->agency_id;
        $profile['token'] = generate_token();
        $profile['is_admin'] = $request->is_admin;


        if($request->email) {
            $staff['email'] = $request->email;
        }
        $staff['can_login'] = $request->can_login;
        $staff['phone'] = $request->phone;
        $staff['is_confirmed'] = 1;
        $staff['password'] = bcrypt('demo');
        $newstaff = $this->create($profile)
            ->user()
            ->create($staff);
        return $newstaff;
    }

    public function updateStaff($id, $request)
    {
        $profile = $this->find($id);
        $profile->fullname = $request->fullname;
        if($request->alt_phone) {
            $profile->alt_phone = $request->alt_phone;
        }
        $profile->address = $request->address;
        $profile->lga_id = $request->lga;
        $profile->is_admin = $request->is_admin;
        $profile->agencystatus_id = $request->agencystatus_id;
        $profile->save();

        $staff = $profile->user;
        if($request->email) {
            $staff->email = $request->email;
        }
        $staff->can_login = $request->can_login;
        $staff->phone = $request->phone;
        $staff->save();
    }

}