@extends('cpanel.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="theam-form mn-btn">
                {!! Form::open(['url' => 'en/cpanel/password', 'id' => 'changepassword']) !!}
                <div class="row">
                    <div class="col-md-12 pb-4 controls">
                        <label for="currentpassword">Current Password <span class="redStar">*</span></label>
                        <input type="password" class="form-control " placeholder=" Current Password" id="currentpassword" name="currentpassword" required>
                    </div>

                    <div class="col-md-12 pb-4 controls">
                        <label for="password">New Password <span class="redStar">*</span></label>
                        <input type="password" class="form-control-" placeholder="New Password" id="password" name="password" required>
                    </div>

                    <div class="col-md-12 pb-4 controls">
                        <label for="confirmpassword">Confirm Password <span class="redStar">*</span></label>
                        <input type="password" class="form-control " placeholder="Confirm New Password" id="confirmpassword" name="confirmpassword" required>
                    </div>

                    <div class="col-md-4">
                        <div class="openAccount-formBtn mn-btn">
                            <button type="submit" class="lg w-100">Update Password</button>
                            {{-- <input class="lg w-100" type="submit" value="Submit" /> --}}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
