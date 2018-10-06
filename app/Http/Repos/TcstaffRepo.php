<?php

namespace App\Http\Repos;
use App\Http\Models\Tcstaff as Model;

class TcstaffRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function createStaff($data)
    {
        $profile['name'] = $data->name;
        $profile['lga_id'] = $data->lga;
        $profile['address'] = $data->address;

        $user['phone'] = $data['phone'];
        $user['username'] = $data['username'];
        $user['email'] = $data['email'];
        $user['is_confirmed'] = $data['is_confirmed'];
        $user['userstatus_id'] = $data['userstatus_id'];
        $user['password'] = bcrypt('demo');

        //dd($user);

        $userModel = $this->create($profile)
            ->user()
            ->create($user);

        return $userModel;
    }

    public function updateStaff($id, $data)
    {
        //Lets first fetch the staff
        $profile = $this->find($id);

        //Lets first update the tcstaff profile
        $profile->name = $data->name;
        $profile->lga_id = $data->lga;
        $profile->address = $data->address;
        $profile->save();

        //Lets update it's user info
        $user = $profile->user;
        $user->username = $data->username;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->is_confirmed = $data->is_confirmed;
        $user->userstatus_id = $data->userstatus_id;
        $user->save();

        //Then we return the profile object
        return $profile;
    }

    public function getList()
    {
        return $this->model
            ->with('user.userstatus')
            ->select('tcstaffs.*');
    }
}