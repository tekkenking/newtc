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
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name of staff" value="{{$staff->name}}">
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="recipient-username" placeholder="Enter staff username" value="{{$staff->user->username}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" id="recipient-phone" placeholder="Enter staff phone" value="{{$staff->user->phone}}">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="recipient-email" placeholder="Enter staff email" value="{{$staff->user->email}}">
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
    <button type="button" class="btn btn-primary" id="assignRole">Save changes</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#assignRole').processRequest({
            form: '#updateStaff',
            reset: true,
            callBack: function(result) {
                $.get("{{route('acl.role.index')}}?tab=true", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>