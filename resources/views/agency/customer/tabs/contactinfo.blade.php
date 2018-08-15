<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="bord-r-white bord-l-white bord-t-white">
                            <h5 class="text-info text-bold bord-btm">CUSTOMER INFO</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Name</td>
                        <td>{{$customer->fullname}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Type</td>
                        <td>{{$customer->customertype->name}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Phone</td>
                        <td>{{$customer->user->phone}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Alt. Phone</td>
                        <td>{{$customer->alt_phone or 'N/A'}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Email</td>
                        <td>{{$customer->user->email or 'N/A'}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"class="bord-r-white bord-l-white">
                            <h5 class="text-info text-bold bord-btm">FACILITY INFO</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Bill Package</td>
                        <td>
                            <span class="label label-warning font-sm">
                            {{format_currency($customer->flat[0]->flatbill[0]->amount)}} - {{$customer->flat[0]->flatbill[0]->name}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Apartment Name</td>
                        <td>{{$customer->flat[0]->name}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Account ID</td>
                        <td>{{$customer->flat[0]->agencies[0]->pivot->accountid}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bord-r-white bord-l-white">
                            <h5 class="text-info text-bold bord-btm">PROPERTY INFO</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Barcode</td>
                        <td>{{$customer->flat[0]->building->barcode[0]->code}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Name of street</td>
                        <td>{{$customer->flat[0]->building->address}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">LGA</td>
                        <td>
                            {{$customer->flat[0]->building->lga->name}}
                            <span class="label label-default">{{$customer->flat[0]->building->lga->state->name}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Type</td>
                        <td>{{$customer->flat[0]->building->buildingtype->name}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Structure</td>
                        <td>{{$customer->flat[0]->building->buildingstructure->name}}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Ownership</td>
                        <td>{{$customer->flat[0]->building->buildingmode->name}}</td>
                    </tr>
                    <tr>
                        @php
                            $buildingStatus = $customer->flat[0]->building->buildingstatus;
                            $color = 'danger';
                            if($buildingStatus->id === 2){
                                $color = 'default';
                            }elseif($buildingStatus === 3){
                                $color = 'danger';
                            }
                        @endphp
                        <td class="text-bold">Building status</td>
                        <td><span class="label label-{{$color}}">{{$buildingStatus->name}}</span></td>
                    </tr>
                </table>

            </div>
            <div class="col-md-6">
                <h5 style="margin-top:19px; margin-bottom:17px; " class="text-info text-bold bord-btm">LOCATION ON MAP</h5>
                <div style="width: 100%; height: 500px;">
                    {!! Mapper::render() !!}
                </div>
            </div>
        </div>
    </div>
</div>