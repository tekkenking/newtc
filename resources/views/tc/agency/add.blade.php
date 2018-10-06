<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="exampleModalLabel">Add Agency</h4>
</div>
<div class="modal-body">
    <form id="storeAgency" method="post" action="{{route('tc.agency.store')}}">
        <div class="row">

            <div class="col-sm-7 border-right">
                <h3 class="text-center text-info text-body text-uppercase">Agency Info</h3>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       id="recipient-name"
                                       placeholder="Enter agency name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                        <textarea name="address"
                                  class="form-control"
                                  id="recipient-name"
                                  placeholder="Enter agency address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                @include('partials.states')
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12" id="lga-here">
                                @include('partials.lgas')
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="email"
                                       class="form-control"
                                       id="recipient-email"
                                       placeholder="Enter agency email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       id="recipient-phone"
                                       placeholder="Enter agency primary phone number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="alt_phone"
                                       class="form-control"
                                       id="recipient-alt_phone"
                                       placeholder="Enter agency alternate phone number">
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-12">
                        <textarea name="description"
                                  class="form-control"
                                  id="recipient-description"
                                  placeholder="About this agency"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select name="bank_id" class="form-control">
                                    <option value="">Select bank</option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="bank_account_name"
                                       class="form-control"
                                       id="recipient-bank_account_name"
                                       placeholder="Enter account name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="bank_account_number"
                                       class="form-control"
                                       id="recipient-bank_account_number"
                                       placeholder="Enter account number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text"
                                       name="bank_bvn"
                                       class="form-control"
                                       id="recipient-bank_bvn"
                                       placeholder="Enter account BVN">
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select name="agencycategory_id" class="form-control">
                                    <option value="">Select agency category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select name="agencymode_id" class="form-control">
                                    <option value="">Select agency mode</option>
                                    @foreach($modes as $mode)
                                        <option value="{{$mode->id}}">{{$mode->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select name="agencystatus_id" class="form-control">
                                    <option value="">Select agency status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <h3 class="text-center text-info text-body text-uppercase">Agency Admin Info</h3>
                <hr>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="text"
                               name="admin_fullname"
                               class="form-control"
                               id="recipient-admin_fullname"
                               placeholder="Enter admin fullname">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <textarea class="form-control"
                                  name="admin_address"
                                  id="recipient-admin_address"
                                  placeholder="Enter admin address"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        @include('partials.states', ['state_id' => 'state-there', 'target_id' => 'lga-there', 'name'=>'admin_state_id', 'target_lga_name' => 'admin_lga_id'])
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12" id="lga-there">
                        @include('partials.lgas', ['name'=>'admin_lga_id'])
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="tel"
                               name="admin_phone"
                               class="form-control"
                               id="recipient-admin_phone"
                               placeholder="Enter admin phone number">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="tel"
                               name="admin_alt_phone"
                               class="form-control"
                               id="recipient-admin_alt_phone"
                               placeholder="Enter admin phone number">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="email"
                               name="admin_email"
                               class="form-control"
                               id="recipient-admin_email"
                               placeholder="Enter admin email">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <select name="admin_gender_id" class="form-control">
                            <option value="">Select admin gender</option>
                            @foreach( $genders as $gender )
                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <select name="admin_userstatus_id" class="form-control">
                            @foreach( $statuses as $status )
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

        </div>


        <div class="hide alert server-msg"></div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="addAgency">Add</button>
</div>

<script type="text/javascript">
    $(function () {
        $('#addAgency').processRequest({
            form: '#storeAgency',
            reset: true
        });
    })
</script>