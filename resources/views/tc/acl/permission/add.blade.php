<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Add Permission</h4>
</div>
<div class="modal-body">
    <form id="storePermission" method="post" action="{{route('acl.permission.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name of permission:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
        </div>
        <div class="hide alert server-msg"></div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="addPermission">Add</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#addPermission').processRequest({
            form: '#storePermission',
            reset: true,
            callBack: function(result) {
                $.get("{{route('acl.permission.index')}}?tab=true", function(data) {
                    $('.tab-content .tab-pane.active.show .panel-body').html(data);
                })
            }
        });
    })
</script>