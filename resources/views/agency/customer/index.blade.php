@extends('agency.layouts.master')

@section('title', 'customers list')

@section('headertitle', "Customers list")

@section('content')

    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="text-right">
                                <button type="button" class="btn btn-danger btn-sm text-bold" data-toggle='modal' data-target='.bs-modal-lg' data-href='{{route('agency.staff.add')}}'>
                                    <i class="fa fa-plus"></i>
                                    Add Staff
                                </button>
                            </div>

                            <hr>
                            <div class="table-responsive">
                                <table id="customer-table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Apartment Name</th>
                                        <th>Customer Name</th>
                                        <th>Account ID</th>
                                        <th>Bill Package</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden" id="search-form">
                <div class="input-group" style="margin-right: 3px;">
                    <div class="input-group-btn">
                        <select name="field" class="form-control d-filter-field">
                            <option value="reset">Filter by Column</option>
                            <option value="flatname">Apartment Name</option>
                            <option value="customername">Customer Name</option>
                            <option value="accountid">Account ID</option>
                        </select>
                    </div><!-- /btn-group -->
                    <input name="query" type="text" class="form-control d-filter-query" aria-label="search" placeholder="Type to search">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary d-submit-query" >
                            Search
                        </button>
                    </div><!-- /btn-group -->
                </div><!-- /input-group -->
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            let dtable = $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('agency.customers.list')}}",
                    method: 'POST',
                    data: function (d) {
                        d.field = $('.d-filter-field').val();
                        d.qquery = $('.d-filter-query').val();
                        d._token= "{{csrf_token()}}";
                    }
                },
                dom: '<"row"<"col-md-6"i><"col-md-6"<"search-form text-right">>>rt<"bottom row"<"col-md-6"l><"col-md-6"p>>',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'customer.0.fullname', name: 'customer.fullname'},
                    {data: 'accountid', name:'accountid', 'seachable':false},
                    {data: 'bill_package', name:'bill_package', 'seachable':false}
                ],
                columnDefs: [ {
                    sortable: false,
                    "class": "index",
                    targets: 0
                } ]
            });

            //To bring in the other form
            $('.search-form').html($('#search-form').html());

            $('.d-submit-query').on('click', function(e) {
                dtable.draw();
                e.preventDefault();

                if($('.d-filter-field').val() === 'reset' || $('.d-filter-query').val() === ''){
                    $('.d-filter-query').val('');
                    $('.d-filter-field').prop('selectedIndex',0)
                }
            });
        });
    </script>
@endpush