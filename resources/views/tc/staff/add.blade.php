<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Add Staff</h4>
</div>
<div class="modal-body">
    <form id="storeStaff" method="post" action="{{route('tc.staff.store')}}">
        <div class="row">

            <div class="col-sm-6">
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="recipient-name"
                               placeholder="Enter name of staff">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">UserName</label>
                    <div class="col-lg-10">
                        <input type="text"
                               name="username"
                               class="form-control"
                               id="recipient-username"
                               placeholder="Enter staff username">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Confirmed?</label>
                    <div class="col-lg-10">
                        <select name="is_confirmed" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">State</label>
                    <div class="col-lg-10">
                        @include('partials.states', ['default_id' => '0'])
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">LGA</label>
                    <div class="col-lg-10" id="lga-here">
                        @include('partials.lgas', ['default_id' => '0'])
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Phone</label>
                    <div class="col-lg-10">
                        <input type="tel"
                               name="phone"
                               class="form-control"
                               id="recipient-phone"
                               placeholder="Enter staff phone number">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email"
                               name="email"
                               class="form-control"
                               id="recipient-email"
                               placeholder="Enter staff email">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-10">
                        <select name="userstatus_id" class="form-control">
                            @foreach( $userstatuses as $userstatus )
                                <option value="{{$userstatus->id}}">{{$userstatus->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Address</label>
                    <div class="col-lg-10">
                        <textarea rows="3" class="form-control" name="address" id="recipient-address" placeholder="Enter staff address" style="height: 82px;"></textarea>
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
                                <input type="checkbox" class="form-check-input" name="roles[]" id="roleCheck{{$role->id}}" value="{{$role->id}}">
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
    <button type="button" class="btn btn-primary" id="addStaff">Add</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#addStaff').processRequest({
            form: '#storeStaff',
            callBack: function(result) {
                $.get("{{route('tc.staff.index')}}", function(data) {
                    //$('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>