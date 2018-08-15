<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td class="table-title">Name</td>
                        <td>{{$customer->fullname}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">Type</td>
                        <td>{{$customer->customertype->name}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">Phone</td>
                        <td>{{$customer->user->phone}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">Alt. Phone</td>
                        <td>{{$customer->alt_phone or 'N/A'}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">Phone</td>
                        <td>{{$customer->user->phone}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h5 class="text-center text-bold">Apartment Info</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-title">Apartment Name</td>
                        <td>{{$customer->flat[0]->name}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">Account ID</td>
                        <td>{{$customer->flat[0]->agencies[0]->pivot->accountid}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h5 class="text-center text-bold">Building Info</h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-title">Address</td>
                        <td>{{$customer->flat[0]->building->address}}</td>
                    </tr>
                    <tr>
                        <td class="table-title">LGA</td>
                        <td>
                            {{$customer->flat[0]->building->lga->name}}
                            <span class="label label-default">{{$customer->flat[0]->building->lga->state->name}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-title">Building status</td>
                        <td>{{$customer->flat[0]->building->buildingstatus->name}}</td>
                    </tr>
                </table>

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>