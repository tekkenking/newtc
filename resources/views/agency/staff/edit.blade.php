<div class="modal-header bord-btm">
    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
    <h4 class="modal-title text-center" id="exampleModalLabel">Edit {{$staff->fullname}} profile</h4>
</div>
<div class="modal-body">
    <form id="updateStaff" method="post" action="{{route('agency.staff.update', $staff->id)}}" class="form-horizontal">
        <div class="row">
            <div class="col-sm-6">
                {{csrf_field()}}
                <input type="hidden" name="usrid" value="{{$staff->user->id}}">
                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Full Name</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="fullname"
                               class="form-control"
                               id="recipient-fullname"
                               placeholder="Enter staff fullname"
                               value="{{$staff->fullname}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">State</label>
                    <div class="col-lg-9">
                        @include('partials.states', ['default_id' => $staff->lga->state->id])
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">LGA</label>
                    <div class="col-lg-9" id="lga-here">
                        @include('partials.lgas', ['default_id' => $staff->lga_id])
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Can login?</label>
                    <div class="col-lg-9">
                        <select name="can_login" id="recipient-can-login" class="form-control">
                            <option value="0" @if($staff->user->can_login === 0) selected="selected" @endif>No</option>
                            <option value="1" @if($staff->user->can_login === 1) selected="selected" @endif>Yes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Is admin?</label>
                    <div class="col-lg-9">
                        <select name="is_admin" id="recipient-is-admin" class="form-control">
                            <option value="0" @if($staff->is_admin === 0) selected="selected" @endif>No</option>
                            <option value="1" @if($staff->is_admin === 1) selected="selected" @endif>Yes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Status</label>
                    <div class="col-lg-9">
                        <select name="agencystatus_id" id="recipient-agencystatus" class="form-control">
                            @foreach($agencystatuses as $status)
                            <option value="{{$status->id}}" @if($status->id === $staff->agencystatus_id) selected="selected" @endif>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Phone</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="phone"
                               class="form-control"
                               id="recipient-phone"
                               placeholder="Enter staff phone"
                               value="{{$staff->user->phone}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Alt. Phone</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="alt_phone"
                               class="form-control"
                               id="recipient-alt-phone"
                               placeholder="Enter staff alt phone [optional]"
                               value="{{$staff->alt_phone}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="email"
                               class="form-control"
                               id="recipient-email"
                               placeholder="Enter staff email [optional]"
                               value="{{$staff->user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Address</label>
                    <div class="col-lg-9">
                        <textarea name="address" id="recipient-address" class="form-control" style="height: 130px" placeholder="Enter staff address">{{$staff->address}}</textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="server-msg"></div>
            </div>
        </div>

    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default text-bold pull-left" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success text-bold" data-style="zoom-in" id="saveStaff">Save changes</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#saveStaff').processRequest({
            form: '#updateStaff'
        });
    })
</script>