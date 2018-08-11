@extends('noauth.layouts.master')

@section('title', 'Login')

@section('content')

    <div class="text-center d-block d-md-none">
        <h3>Welcome to Tracology</h3>
        <p>A smart payment hub for utilities.</p>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox ">
                <div class="ibox-title text-center d-none d-md-block">
                    <h3 class="m-t-none m-b">Welcome to Tracology</h3>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <form role="form" method="post" action="{{route('post.login.page')}}" id="formLogin">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Login ID</label>
                                    <input name="usr"
                                           type="text"
                                           placeholder="Enter your login ID"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password"
                                            type="password"
                                           placeholder="Enter your password"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" id="submitLogin" data-style="zoom-in">
                                        <strong>Log in</strong>
                                    </button>
                                    <a href="#" class="float-right">
                                        Forgot Password?
                                    </a>
                                </div>

                                <div class="form-group">
                                    <div class="msg-place"></div>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6 d-none d-md-block">

                            <p>A smart payment hub for utilities.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#submitLogin').processRequest({
                form: '#formLogin',
                msgPlace: '.msg-place',
                callBack: function(result) {
                    if( result.status && result.status !== 'fail')
                        window.location=result.url
                }
            });
        })
    </script>
@endpush