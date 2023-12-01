@extends('cpanel.layout')
@section('content')

    @if (count($ib_accounts) < 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card bg-grey">
                    <div class="card-body forexaccountERros">
                        <h5>You Don't Have Any IB Accounts</h5>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (count($allref) < 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="referral-system">
                                <h6>You Don't Have Any Referalls Yet</h6>
                                <div class="copylink mn-btn">
                                    <input id="MyRef" value="https://www.jmibrokers.com/en?myref={{ $user->id + 10000 }}">
                                    <button  onclick="CopyText()" class="sm">Copy Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @section('script')
                <script type="text/javascript">
                    function CopyText() {
                        $('input#MyRef').val('https://www.jmibrokers.com/en?myref={{ $user->id + 10000 }}');
                        var copyText = document.getElementById("MyRef");
                        copyText.select();
                        document.execCommand("Copy");
                    }
                </script>
            @stop
        @else
            <div class="transactionHistory-table mt-4">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Mobile</th>
                        <th>Live Accounts</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; $ii = 1; ?>
                        <?php
                            $ref_live_accounts0 = [];
                            foreach ($ref_live_accounts as $ref_live) {
                                array_push($ref_live_accounts0, $ref_live);
                            }
                        ?>
                        @foreach ($allref as $ref)
                            <tr>
                                <td>{{ $ii }}</td>
                                <td>{{ $ref->fullname }}</td>
                                <td>{{ $ref->email }}</td>
                                <td>{{ $ref->country }}</td>
                                <td>{{ $ref->country_code }}{{ $ref->mobile }}</td>
                                <td>
                                    <?php
                                        $filtered_live = array_filter($ref_live_accounts0, function ($ref_live_accounts0) use ($ref) {
                                            return $ref_live_accounts0->website_accounts_id == $ref->id;
                                        });
                                        if (count($filtered_live) > 0) {
                                            echo '<span class="btn btn-success"  data-toggle="modal" data-target="#live-' . $ref->id . '" >' . count($filtered_live) . ' Show</span>';
                                        }
                                    ?>
                                    @if (count($filtered_live) > 0)
                                        <!-- Modal -->
                                        <div id="live-{{ $ref->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Account</th>
                                                                    <th>Server</th>
                                                                    <th>Type</th>
                                                                    <th>Group</th>
                                                                    <th>Currency</th>
                                                                    <th>Leverage</th>
                                                                    <th>Investor</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $i = 1;
                                                                    $n = 0;
                                                                ?>
                                                                @foreach ($filtered_live as $account0)
                                                                    <tr>
                                                                        <td>{!! $i !!}</td>
                                                                        <td>{!! $account0->account_id !!}</td>
                                                                        <td>JMI-Server</td>
                                                                        <td>
                                                                            @if ($account0->account_type == 3)
                                                                                Variable Spread Account
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($account0->account_group == 5)
                                                                                Scalping Account
                                                                            @endif
                                                                            @if ($account0->account_group == 1)
                                                                                Fixed Spread Account
                                                                            @endif
                                                                            @if ($account0->account_group == 4)
                                                                                Bonus Account
                                                                            @endif

                                                                        </td>

                                                                        <td>USD</td>
                                                                        <td>1:{!! $account0->leverage !!}</td>
                                                                        <td>{!! $account0->investor_password !!}</td>



                                                                    </tr>
                                                                    <?php
                                                                        $i++;
                                                                        $n++;
                                                                    ?>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <?php $ii++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif


@stop
