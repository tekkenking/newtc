<div class="modal-header bord-btm">
    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
    <h4 class="modal-title text-center" id="exampleModalLabel">ADD BILL PACKAGE</h4>
</div>
<div class="modal-body">
    <form id="storeBill" method="post" action="{{route('agency.bill.store')}}" class="form-horizontal">
        <div class="row">
            <div class="col-sm-12">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Package Name</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="recipient-name"
                               placeholder="Enter package name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Amount</label>
                    <div class="col-lg-9">
                        <input type="text"
                               name="amount"
                               class="form-control"
                               id="recipient-amount"
                               placeholder="Enter amount">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Description</label>
                    <div class="col-lg-9">
                        <textarea name="description" id="recipient-description" class="form-control" style="height: 60px" placeholder="Enter package description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 col-form-label">Status</label>
                    <div class="col-lg-9">
                        <select name="agencystatus_id" id="recipient-agencystatus" class="form-control">
                            @foreach($agencystatuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
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
    <button type="button" class="btn btn-success text-bold" data-style="zoom-in" id="addBill">Add</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#addBill').processRequest({
            form: '#storeBill',
            reset: true
        });
    })
</script>