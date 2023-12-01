@extends('cpanel.layout')
@section('content')
    @if(count($accounts)<=0)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card bg-grey">
                    <div class="card-body forexaccountERros">
                        <h5>You have no live account</h5>
                        <p> You can add your account from
                            <a href="/en/cpanel/add-account">Here</a>
                            or open a new account from
                            <a href="/en/cpanel/open-account">Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($accounts)>0)
        <div class="row">
            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire" />
                            </div>
                            <h6 >Bank Wire</h6 >
                            <a href="#" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
                <?PHP if(count($invoices)>0 ){ ?>
                    <!-- Modal -->
                    <div id="view-recent-invoices" class="modal fade" role="dialog">
                    <div class="modal-dialog  text-left">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Recent Invoices</h4>
                        </div>
                        <div class="modal-body">

                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP foreach($invoices as $invoice){ ?>
                                <tr>
                                <td>{{$invoice->account_number}}</td>
                                <td>{{$invoice->amount}}</td>
                                <td> {{ substr($invoice->created_at,0,10)}}</td>
                                <td><a class="btn btn-success" target="_blank" href="/assets/invoices/{{$invoice->filename}}.pdf">View invoice</a></td>
                                </tr>
                                <?PHP   } ?>

                            </tbody>
                            </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Close</button>
                            </div>
                            </div>

                    </div>
                    </div>
                <?PHP } ?>
            </div>

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/epay.png" alt="Epay"/>
                            </div>
                            <h6 >Epay</h6 >
                            <a href="/en/cpanel/deposit-fund/epay" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/fasapay.png" alt="FasaPay"/>
                            </div>
                            <h6 >FasaPay</h6 >
                            <a href="/en/cpanel/deposit-fund/fasapay" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="Advcash"/>
                            </div>
                            <h6 >Advcash</h6 >
                            <a href="/en/cpanel/deposit-fund/advcash" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/payeer.png" alt="Payeer"/>
                            </div>
                            <h6 >Payeer</h6 >
                            <a href="/en/cpanel/deposit-fund/payeer" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="Perfect Money"/>
                            </div>
                            <h6 >Perfect Money</h6 >
                            <a href="/en/cpanel/deposit-fund/perfect-money" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="CoinBase"/>
                            </div>
                            <h6 >CoinBase</h6 >
                            <a href="/en/cpanel/deposit-fund/coinbase" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="Western Union"/>
                            </div>
                            <h6 >Western Union</h6 >
                            <a href="#" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="MoneyGram"/>
                            </div>
                            <h6 >MoneyGram</h6 >
                            <a href="#" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/visa_icon.png" alt="Visa"/>
                            </div>
                            <h6 >Visa</h6 >
                            <a href="/en/visa" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/neteller.png" alt="Neteller"/>
                            </div>
                            <h6 >Neteller</h6 >
                            <a href="#" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-md-4 pb-4" style-="display:none;">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/skrill.png" alt="Skrill"/>
                            </div>
                            <h6 >Skrill</h6 >
                            <a href="#" class="lg w-100">Deposit</a><br />
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    @endif


    @section("script")
        <script>
            function PaymentDetails(payment) {
                $("#deposit-"+payment+" "+"#submit-request-details").text("Sending...");
                $("#deposit-"+payment+" "+"#submit-request-details").prop('disabled', true);
                $.ajax({
                    type: "get",
                    url :"/en/cpanel/deposit-fund/request-details/"+payment+"/",
                    success:function(result){
                        if(result=='true'){
                        $("#deposit-"+payment+" "+"#request-details-success").text("Payment details sent Successfully to your Email.");
                        $("#deposit-"+payment+" "+"#request-details-success").show();
                        $("#deposit-"+payment+" "+"#request-details-error").hide();
                        $("#deposit-"+payment+" "+"#submit-request-details").hide();
                        $("#deposit-"+payment+" "+"#close-request-details").show();
                        }else if(result=='false'){
                        $("#deposit-"+payment+" "+"#request-details-error").text("Error, Try again later");
                        $("#deposit-"+payment+" "+"#request-details-error").show();
                        }
                    },
                        error:function(result){
                        $("#deposit-"+payment+" "+"#request-details-error").text("Error, Try again later");
                        $("#deposit-"+payment+" "+"#request-details-error-btn").show();
                    }
                });
            }

            $("form#request-invoice").submit(function(e) {
                payment='bankwire';
                e.preventDefault(); // avoid to execute the actual submit of the form.
                $("form#request-invoice #submit").val("Sending...");
                $("form#request-invoice #submit").prop('disabled', true);
                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success:function(result){
                        if(result=='true'){

                        $("#deposit-"+payment+" "+"#request-details-success").text("Requested invoice and bank details has been sent successfully to your mail,  Please provide your bank with invoice to facilitate your payment.");
                        $("#deposit-"+payment+" "+"#request-details-success").show();
                        $("#deposit-"+payment+" "+"#request-details-error").hide();
                        $("#deposit-"+payment+" "+"#submit-request-details").hide();
                        $("#deposit-"+payment+" "+"#close-request-details").show();
                        $("form#request-invoice").hide();
                        }else if(result=='false'){
                        $("#deposit-"+payment+" "+"#request-details-error").text("Error, Try again later");
                        $("#deposit-"+payment+" "+"#request-details-error").show();

                        }
                    },
                    error:function(result){
                        $("#deposit-"+payment+" "+"#request-details-error").text("Error, Try again later");
                        $("#deposit-"+payment+" "+"#request-details-error-btn").show();
                    }
                });
            });

            // <!--**************************************Validations**************** -->

            var fullNameDisable , amountDisable , cityDisable , addressDisable , countryDisable;
            $('.form-control input').blur(function(){
                if( !$(this).val() ) {
                        $(this).siblings('.fa-times-circle').show();
                        $(this).parents(".form-control").css('borderColor' , "#ff5350");
                        $(this).siblings('p').text("*required");
                }
            });
            function validFullName() {
                let fullname = document.getElementById("fullname").value;
                let validFullName = document.getElementById("validFullName");
                let regex=/^[A-Za-z ]+$/;
                let text;
                $('.fa-times-circle','#contentfullname').hide();
                $('.fa-check-circle','#contentfullname').hide();
                if(fullname == '' || fullname == ' ')
                {
                    text = "*required";
                    fullNameDisable=false;
                    document.getElementById("contentfullname").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentfullname').show();
                }
                else if (!regex.test(fullname))
                {
                    text = "*English letters only allowed. ";
                    fullNameDisable=false;
                    document.getElementById("contentfullname").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentfullname').show();
                }
                else
                {
                    text = "";
                    fullNameDisable=true;
                    document.getElementById("contentfullname").style.borderColor = "#27e492";
                    $('.fa-check-circle','#contentfullname').show();
                }
                validFullName.innerHTML = text;
                validButton();
            }
            function validAmount() {
                let amount = document.getElementById("amount").value;
                let validAmount = document.getElementById("validAmount");
                let text;
                $('.fa-times-circle','#contentamount').hide();
                $('.fa-check-circle','#contentamount').hide();
                if(amount == '' || amount == ' ')
                {
                    text = "*required";
                    amountDisable=false;
                    document.getElementById("contentamount").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentamount').show();
                }
                else
                {
                    text = "";
                    document.getElementById("contentamount").style.borderColor = "#27e492";
                    $('.fa-check-circle','#contentamount').show();
                    amountDisable=true;
                }
                validAmount.innerHTML = text;
                validButton();
            }
            function validAddress() {
                let address = document.getElementById("address").value;
                let validAddress = document.getElementById("validAddress");
                let text;
                $('.fa-times-circle','#contentaddress').hide();
                $('.fa-check-circle','#contentaddress').hide();
                if(address == '' || address == ' ')
                {
                    text = "*required";
                    addressDisable=false;
                    document.getElementById("contentaddress").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentaddress').show();
                }

                else
                {
                    text = "";
                    document.getElementById("contentaddress").style.borderColor = "#27e492";
                    $('.fa-check-circle','#contentaddress').show();
                    addressDisable=true;
                }
                validAddress.innerHTML = text;
                validButton();
            }
            function validCity() {
                let city = document.getElementById("city").value;
                let validCity= document.getElementById("validCity");
                let regex=/^[A-Za-z ]+$/;
                let text;
                $('.fa-times-circle','#contentcity').hide();
                $('.fa-check-circle','#contentcity').hide();
                if(city == '' || city == ' ')
                {
                    text = "*required";
                    cityDisable=false;
                    document.getElementById("contentcity").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentcity').show();
                }
                else if (!regex.test(city))
                {
                    text = "*English letters only allowed. ";
                    cityDisable=false;
                    document.getElementById("contentcity").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentcity').show();
                }
                else
                {
                    text = "";
                    document.getElementById("contentcity").style.borderColor = "#27e492";
                    $('.fa-check-circle','#contentcity').show();
                    cityDisable=true;
                }
                validCity.innerHTML = text;
                validButton();
            }
            function validCountry() {
                let country = document.getElementById("country").value;
                let validCountry= document.getElementById("validCountry");
                let regex=/^[A-Za-z ]+$/;
                let text;
                $('.fa-times-circle','#contentcountry').hide();
                $('.fa-check-circle','#contentcountry').hide();
                if(country == '' || country == ' ')
                {
                    text = "*required";
                    countryDisable=false;
                    document.getElementById("contentcountry").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentcountry').show();
                }
                else if (!regex.test(country))
                {
                    text = "*English letters only allowed. ";
                    countryDisable=false;
                    document.getElementById("contentcountry").style.borderColor = "#ff5350";
                    $('.fa-times-circle','#contentcountry').show();
                }
                else
                {
                    text = "";
                    document.getElementById("contentcountry").style.borderColor = "#27e492";
                    $('.fa-check-circle','#contentcountry').show();
                    countryDisable=true;
                }
                validCountry.innerHTML = text;
                validButton();
            }
            function validButton(){
                if((addressDisable == true && cityDisable == true) && (amountDisable == true && countryDisable == true) && (fullNameDisable == true))
                {
                    document.getElementById("submit").removeAttribute("disabled");
                }
                else
                {
                    document.getElementById("submit").setAttribute('disabled','disabled');
                }
            }
        </script>
    @stop
@stop
