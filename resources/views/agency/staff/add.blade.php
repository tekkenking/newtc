<div class="modal-header bord-btm">
    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
    <h4 class="modal-title text-center" id="exampleModalLabel">ADD STAFF</h4>
</div>
<div class="modal-body">
    <form id="storeStaff" method="post" action="{{route('agency.staff.store')}}" class="form-horizontal">
        <div class="row">
            <div class="col-sm-6">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Full Name</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="fullname"
                               class="form-control"
                               id="recipient-fullname"
                               placeholder="Enter staff fullname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">State</label>
                    <div class="col-lg-9">
                        @include('partials.states', ['default_id' => '0'])
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">LGA</label>
                    <div class="col-lg-9" id="lga-here">
                        @include('partials.lgas', ['default_id' => '0'])
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Can login?</label>
                    <div class="col-lg-9">
                        <select name="can_login" id="recipient-can-login" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Is Admin?</label>
                    <div class="col-lg-9">
                        <select name="is_admin" id="recipient-is-admin" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
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
                               placeholder="Enter staff phone">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Alt. Phone</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="alt_phone"
                               class="form-control"
                               id="recipient-alt-phone"
                               placeholder="Enter staff alt phone [optional]">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="email"
                               class="form-control"
                               id="recipient-email"
                               placeholder="Enter staff email [optional]">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Address</label>
                    <div class="col-lg-9">
                        <textarea name="address" id="recipient-address" class="form-control" style="height: 81px" placeholder="Enter staff address"></textarea>
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
    <button type="button" class="btn btn-success text-bold" data-style="zoom-in" id="addStaff">Add</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#addStaff').processRequest({
            form: '#storeStaff',
            reset: true,
            callBack: function(result) {
                $.get("{{route('agency.staff.list')}}", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>