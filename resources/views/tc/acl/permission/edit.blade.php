<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Update [ {{$permission->name}} ] Permission</h4>
</div>
<div class="modal-body">
    <form method="post" action="{{route('acl.permission.update')}}" id="updatePermission">
        {{csrf_field()}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="permission-name" value="{{$permission->name}}">
        </div>
        <input type="hidden" name="id" value="{{$permission->id}}">
        <div class="hide alert server-msg"></div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white pull-left" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#saveChanges').processRequest({
            form: '#updatePermission',
            closeModal: true,
            callBack: function(result) {
                $.get("{{route('acl.permission.index')}}?tab=true", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>