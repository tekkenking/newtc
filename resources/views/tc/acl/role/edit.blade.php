<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Update [ {{$role->name}} ] Role</h4>
</div>
<div class="modal-body">
    <form id="editRole" method="post" action="{{route('acl.role.update')}}">
        <div class="row">
            <div class="col-sm-12">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name of role" value="{{$role->name}}">

                    <input type="hidden" name="id" value="{{$role->id}}"/>
                </div>
                <div class="hide alert server-msg"></div>

                <h3 class="text-center">Select from the following permissions to make up this role</h3>
                <hr/>
            </div>
        </div>

        @if($permissions->isNotEmpty())
            @foreach($permissions->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $permission)
                        <div class="col-sm-4">
                            <div class="form-check i-checks">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="permissionCheck{{$permission->id}}" value="{{$permission->id}}" @if($role->permissions->contains($permission->id)) checked="checked" @endif>
                                <label class="form-check-label font-weight-bold" for="permissionCheck{{$permission->id}}">
                                    {{ $permission->name }}
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
    <button type="button" class="btn btn-primary" id="updateRole">Save changes</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#updateRole').processRequest({
            form: '#editRole',
            callBack: function(result) {
                $.get("{{route('acl.role.index')}}?tab=true", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>