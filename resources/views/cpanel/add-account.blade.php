@extends('cpanel.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="theam-form mn-btn">
                        {!! Form::open(['url' => 'en/cpanel/add-account']) !!}
                        <div>
                            @if ($user->country == '')
                                <div class="alert alert-warning">
                                    To Open Account You Have To Complete Your <a href="/en/cpanel/profile">Profile</a>
                                </div>
                            @endif

                            @if (count($documents) < 2)
                                <div class="alert alert-warning" id="live-alert--0-" style="display: none;">
                                    To Open Account You Must Have 2 Approved <a href="/en/cpanel/documents"> Documents</a>
                                    At Least
                                    Including Customer Account Agreement
                                </div>
                            @endif

                            @if (count($documents) > 1)
                                @if ($documents[0]->status == 0 && $documents[1]->status == 0)
                                    <div class="alert alert-warning " id="live-alert--0-" style="display: none;">
                                        To Open Account You Must Have 2 Approved <a href="/en/cpanel/documents">
                                            Documents</a> At
                                        Least Including Customer Account Agreement
                                    </div>
                                @endif
                            @endif

                            @if (count($documents) > 1)
                                <?php $x = 0; ?>
                                @foreach ($documents as $document)
                                    @if ($document->type == 8)
                                        <?php $x = 1; ?>
                                    @endif
                                @endforeach
                                @if ($x == 0)
                                    <div class="alert alert-warning " id="live-alert--0-" style="display: none;">
                                        To Open Account You Must Have Approved Customer Account Agreement<a
                                            href="/en/cpanel/documents"> Documents</a>
                                    </div>
                                @endif
                            @endif

                            @if (count($live_accounts) > 99)
                                <div class="alert alert-warning " id="live-alert" style="display: none;">
                                    You have reached the maximum allowed number (3) of live accounts
                                </div>
                            @endif

                            @if (session('status-success'))
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('status-success') }}
                                </div>
                            @endif

                            @if (session('status-error'))
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('status-error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form>
                                <div class="row">
                                    <div class="col-md-4 pb-4">
                                        <label for="account_type">Account Type:</label>

                                        <select name="account_type" id="account_type" required>
                                            <option value="" disabled selected>- Select -</option>
                                            <option value="1">Individual</option>
                                            <option value="2">IB</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="account_group">Account Group:</label>

                                        <select name="account_group" id="account_group" required>
                                            <option value="" disabled selected>- Select -</option>
                                            <option value="1" class="forlive">Fixed Spread Account</option>
                                            <option value="5" class="forlive">Scalping Account</option>
                                            <option value="3" class="forlive">Variable Spread Account</option>
                                            <option value="4" class="forlive">Bonus Account</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="currency">Currency base:</label>

                                        <select name="currency" id="currency" required>
                                            <option value="1" selected>USD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 pb-4">
                                        <label for="account_id">MT4 Login User:</label>
                                        <input type="text" placeholder="User Name" name="account_id" id="account_id"
                                            required>
                                    </div>

                                    <div class="col-md-6 pb-4">
                                        <label for="password">MT4 Login Password:</label>
                                        <input type="password" placeholder="***************" name="password" id="password"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        {{-- <div class="">
                                            <label for="iagree" class="iagreecheck"><input type="checkbox" id="iagree">
                                                I
                                                agree the terms and conditions</label>
                                        </div> --}}

                                        <div class="openAccount-formBtn mn-btn">
                                            <input type="number" class="form-control" name="account_radio_type"
                                                value="1" required style="display:none;" />

                                            <input class="lg  w-100" type="submit" id="submit" value="Add Account" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
