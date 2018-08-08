<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Edit [ {{$staff->name}} ]</h4>
</div>
<div class="modal-body">
    <form id="updateStaff" method="post" action="{{route('tc.staff.update', $staff->id)}}">
        <div class="row">
            <div class="col-sm-6">
                {{csrf_field()}}
                <input type="hidden" name="usrid" value="{{$staff->user->id}}">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="recipient-name"
                               placeholder="Enter name of staff"
                               value="{{$staff->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">UserName</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="username"
                               class="form-control"
                               id="recipient-username"
                               placeholder="Enter staff username"
                               value="{{$staff->user->username}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Confirmed?</label>
                    <div class="col-lg-10">
                        <select name="is_confirmed" class="form-control">
                            <option value="1" @if($staff->user->is_confirmed) selected="selected" @endif>Yes</option>
                            <option value="0" @if(!$staff->user->is_confirmed) selected="selected" @endif>No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">State</label>
                    <div class="col-lg-10">
                        @include('partials.states', ['default_id' => $staff->lga->state->id])
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">LGA</label>
                    <div class="col-lg-10" id="lga-here">
                        @include('partials.lgas', ['default_id' => $staff->lga->id])
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Phone</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="phone"
                               class="form-control"
                               id="recipient-phone"
                               placeholder="Enter staff phone number"
                               value="{{$staff->user->phone}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Email</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="email"
                               class="form-control"
                               id="recipient-email"
                               placeholder="Enter staff email"
                               value="{{$staff->user->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-10">
                        <select name="userstatus_id" class="form-control">
                            @foreach( $userstatuses as $userstatus )
                                <option value="{{$userstatus->id}}" @if($staff->user->userstatus_id === $userstatus->id) selected="selected" @endif>{{$userstatus->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Address</label>
                    <div class="col-lg-10">
                        <textarea rows="3" class="form-control" name="address" id="recipient-address" placeholder="Enter staff address" style="height: 82px;">{{$staff->address}}</textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="hide alert server-msg"></div>
        <h3 class="text-center">Assign one or more roles to this staff</h3>
        <hr/>

        @if($roles->isNotEmpty())
            @foreach($roles->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $role)
                        <div class="col-sm-4">
                            <div class="form-check i-checks">
                                <input type="checkbox" class="form-check-input" name="roles[]" id="roleCheck{{$role->id}}" value="{{$role->id}}" @if($staff->user->roles->contains($role->id)) checked="checked" @endif>
                                <label class="form-check-label font-weight-bold" for="roleCheck{{$role->id}}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="assignRole">Save changes</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#assignRole').processRequest({
            form: '#updateStaff',
            callBack: function(result) {
                $.get("{{route('tc.staff.index')}}", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>