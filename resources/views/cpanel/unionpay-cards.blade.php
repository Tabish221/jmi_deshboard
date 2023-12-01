@extends('cpanel.layout')
@section('content')
    @if ($user->country == '')
        <div class="alert alert-warning">
            To Order Your Card, You Have To Complete Your <a href="/en/cpanel/profile">Profile</a>
        </div>
    @endif

    @if (count($documents) < 2)
        <div class="alert alert-warning" id="live-alert" style-="display: none;">
            To Order Your Card, You Must Have 2 Approved <a href="/en/cpanel/documents"> Documents</a>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="packageSec-main">
        <div class="row">
           <div class="col-md-4">
              <div class="pakageCard">
                    <div class="pakageCard-icon">
                        <img loading="lazy" class="rounded-3" src="/assets/cpanel/img/unionpay-card-only.jpg" />
                    </div>

                    <div class="pakageCard-title">
                        <h6>Card Limits</h6>
                        <h5>Free</h5>
                    </div>

                    <div class="pakageCard-detail mn-btn">
                        <ul>
                            <li>Max Ticket Size - $2,000</li>
                            <li>Max Monthly Volume - $20,000</li>
                            <li>Max hour count - 2 times per hour</li>
                            <li>Max day count - 20 times per day</li>
                            <li>Card loading amount - $2,000</li>
                            <li>Max card balance amount - $50,000</li>
                            <li>Card to card transaction - $2,000</li>
                            <li>ATM - Withdrawal $4.15</li>
                            <li>ATM - Balance Enquiry $4.15</li>
                            <li>POS - $1.25</li>
                            <li>Reload Card - $3.50 or 1.5%, whichever is higher</li>
                            <li>Card to card transfer - $7.00</li>
                            <li>Monthly Fee - $3.00</li>
                        </ul>

                        @if (count($unionpay_cards) > 0)
                        @if ($unionpay_cards[0]->status == 0)
                            <a class="gd-btn" onclick="return false;">You have pending card request</a>
                        @elseif($unionpay_cards[0]->status == 2)
                            <a id="order_card" class="gd-btn" onclick="order_card()">Order your card now</a>
                        @elseif($unionpay_cards[0]->status == 1)
                            <a class="gd-btn" onclick="return false;">Your card is produced successfully, you will receive it soon.</a>
                        @endif
                        @else
                            <a id="order_card" class="gd-btn" onclick="order_card()">Order your card now</a>
                        @endif

                        <p id="success-msg" style="color:green;"></p>
                        <p id="error-msg" style="color:red;"></p>
                        <div class="pt-2">
                            @if (count($unionpay_cards) > 0)
                                @if ($unionpay_cards[0]->status == 0)
                                    <p style="color:#afafaf;">* Your card request still pending..., we will notify you with updates</p>
                                @elseif($unionpay_cards[0]->status == 1)
                                    <p style="color:#afafaf;">* Your card is produced successfully, you will receive it soon. </p>
                                @elseif($unionpay_cards[0]->status == 2)
                                    <p style="color:#fc8383;">* Your card request has been declined</p> @endif
                            @endif
                        </div>

                        @if (count($unionpay_cards) > 0)
                            @if ($unionpay_cards[0]->status == 111)
                            @endif
                        @endif
                    </div>
              </div>
           </div>
        </div>
    </div>

    @section('script')
        <script type="text/javascript">
            function order_card() {
                $("button#order_card").text("Sending...");
                $("button#order_card").prop("disabled", true);

                $.ajax({
                    type: "get",
                    url: "/en/cpanel/order-unionpay-card/",
                    success: function(result) {
                        if (result == 'true') {

                            $("p#success-msg").text(
                                "Your request submitted Successfully, We sent instructions to your email please follow it and We will notify you with updates."
                                );
                            $("p#success-msg").show();
                            $("p#error-msg").hide();
                            $("button#order_card").text("Order your card now");

                            $("button#order_card").prop("disabled", true);
                        } else if (result == 'false') {

                            $("p#error-msg").text("Error, Try again later");
                            $("p#error-msg").show();
                            $("button#order_card").text("Order your card now");
                            $("button#order_card").prop("disabled", false);

                        }
                    },
                    error: function(result) {

                        $("p#error-msg").text("Error, Try again later");
                        $("p#error-msg").show();
                        $("button#order_card").text("Order your card now");
                        $("button#order_card").prop("disabled", false);
                    }
                });
            }
        </script>
    @stop

@stop
