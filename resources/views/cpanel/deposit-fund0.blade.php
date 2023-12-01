@extends('cpanel.layout')
@section('content')

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->



@if(count($accounts)<=0)<h2>You Have no live account, You can add your account from <a href="/en/cpanel/add-account">Here</a> or open a new account from <a href="/en/cpanel/open-account">Here</a></h2> @endif

@if(count($accounts)>0)

	<div class="row">

		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/creditcard.png" alt="Credit Card" class="max-width-100"/>
			<h3>Credit Card</h3>
			<a href="/en/cpanel/deposit-fund/credit-card" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-creditcard" style="display:none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-creditcard" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content text-left">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Credit Card Funding Details</h4>
			      </div>
			      <div class="modal-body">
					<h3 style="text-align: justify;">Debit/Credit Card<br></h3>
					Notes on Deposits and Withdrawals by Debit/Credit Card<br><br><ul>
					<li>Deposits may take up to 24 hours to be credited to the
					trading account upon a deposit in the
					Company’s designated client accounts. If your deposit has not
					been credited
					in
					your trading account within 24 hours, please
					check for any emails messages from us</li>
					<li>We may require further verification of your cards for deposits and withdrawals.&nbsp;</li>
					<li>All withdrawal requests must be credited back to the same credit or debit card before other methods can are offered.</li>
					<li>Accounts of payment providers may be held in different jurisdictions (EU or third countries) thus the rights on the specific account could differ from the selection of your provider. </li>
					<li>No processing fees apply on credit/debit card deposits.</li>
					</ul>
					<h3 style="text-align: justify;">Uploading Credit/Debit Card copies: General Information<br></h3>
					We are forced to apply security measures designed for the security of both our clients and ourselves in line with current recommendations from card providers such as Visa and MasterCard.
					Following on from the above, we are required to obtain copies of any card used for a deposit to ensure that the cardholder is the owner of the trading account. Also be advised that we may request card copies before the approval of a withdrawal request.
					If you have lost any of your cards previously used, we will require either:
					<ul>
					<li>an old credit card statement that includes both your name and your card number or</li>
					<li>Alternatively a written statement from the card issuing bank that confirms you are the card owner but are no longer in possession of that card.</li>
					</ul>
					Please note that, for security purposes before uploading your scanned copy of your Credit or Debit Card, it is advised that you leave only the 1st and last 4 digits of your card number visible and cover the CVV number on the back of your credit card image.
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



		<div class="col-md-3 col-sm-4 col-xs-6  text-center">
			<img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
			<h3>Bank Wire</h3>
			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-bankwire">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-bankwire" style="display:none;" >More Details</span>


      <div id="deposit-bankwire" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left" style="max-width: 600px;width:100%;">

			    <!-- Modal content-->
			    <div class="modal-content" >
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Bank Wire Funding Details</h4>
			      </div>

            <div class="modal-body" style-="display:none;">


              <p id="request-details-success" style="display:none;color:green;"></p>
              <p id="request-details-error" style="display:none;color:red;"></p>

              <?PHP if(count($invoices)>0 ){ ?>

              <a class="btn btn-success" onclick="show_request_invoice_form()">Request new invoice</a>

              <script>
                function show_request_invoice_form()
                {
                  $('div#request-invoice-form').show();
                }
              </script>
              <span class="btn btn-default cursor-pointer" data-toggle="modal" data-target="#view-recent-invoices" style-="display:none;" >View recent invoices</span>



                  <a href="/en/cpanel/deposit-fund/bankwire" class="btn btn-default" >Submit SWIFT / TT Copy</a>


            <?PHP  } ?>
            <div id="request-invoice-form" style="<?PHP if(count($invoices)>0 ){echo 'display:none';} ?>">


              {!! Form::open(['url'=>'en/cpanel/deposit-fund/request-invoice','id'=>'request-invoice'])  !!}



              <br />
              <div class="row" id="amount">
                  <label class="col-sm-4">Full Name:</label>
                  <div class="col-sm-8">
                      <div class="controls">
                          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Just English Letters and Spaces" required />

                      </div>
                  </div>
              </div>



                  <br />
                  <div class="row">

                      <label class="col-sm-4">Account Number:</label>
                      <div class="col-sm-8">
                          <div class="controls">
                              <select class="form-control" name="account_number" id="account_number" required >
                                  <option value="" disabled selected >- Select -</option>
                                  @foreach($accounts as $account)
                                  <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>



              <br />
              <div class="row" id="amount">
                  <label class="col-sm-4">Deposit Amount:</label>
                  <div class="col-sm-8">
                      <div class="controls">
                        <input type="number" class="form-control" name="amount" id="amount" required />
                        <input type="number" class="form-control" value="1" name="type" id="type" required style="display:none;" />

                      </div>
                  </div>
              </div>


                  <br />
                  <div class="row">
                      <label class="col-sm-4">Currency base:</label>
                      <div class="col-sm-8">
                          <div class="controls">
                              <select class="form-control" name="currency" id="currency" required >
                                  <option value="1" selected>USD</option>
                              </select>
                          </div>
                      </div>
                  </div>


                  <br />
                  <div class="row" id="amount">
                      <label class="col-sm-4">Address:</label>
                      <div class="col-sm-8">
                          <div class="controls">
                              <input type="text" class="form-control" name="address" id="address"  required />

                          </div>
                      </div>
                  </div>


                    <br />
                    <div class="row" id="amount">
                        <label class="col-sm-4">Country:</label>
                        <div class="col-sm-8">
                            <div class="controls">
                                <input type="text" class="form-control" name="country" id="country" placeholder="Just Letters and Spaces" required />

                            </div>
                        </div>
                    </div>




                      <br />
                      <div class="row" id="amount">
                          <label class="col-sm-4">City:</label>
                          <div class="col-sm-8">
                              <div class="controls">
                                  <input type="text" class="form-control" name="city" id="city" placeholder="Just Letters and Spaces" required />

                              </div>
                          </div>
                      </div>

                      <br />
                      <p>Please print your invoice to access both SEPA and SWIFT Bank details to proceed with your payment.</p>


              <br />
              <div class="row">
                  <label class="col-sm-4"></label>
                  <div class="col-sm-8 ">
                      <div class="controls">
                           <input class="btn btn-success form-control" type="submit" id="submit" value="Print your invoice" />

                      </div>
                  </div>
              </div>
          {!! Form::close() !!}



            </div>


          </div>


			      <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			      </div>
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


    <?PHP   } ?>


		</div>




		<div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="">
			<img loading="lazy" src="/assets/cpanel/img/epay.png" alt="Epay"  class="max-width-100" style="height: 155px;" />
			<h3>Epay</h3>
			<a href="/en/cpanel/deposit-fund/epay" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-epay" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="deposit-epay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>


		<div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/fasapay.png" alt="FasaPay"  class="max-width-100" style="height: 155px;" />
			<h3>FasaPay</h3>
			<a href="/en/cpanel/deposit-fund/fasapay" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-fasapay" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-fasapay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">FasaPay Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="advcash"  class="max-width-100" style="height: 155px;" />
			<h3>advcash</h3>
			<a href="/en/cpanel/deposit-fund/advcash" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-advcash" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-advcash" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">advcash Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/payeer.png" alt="payeer"  class="max-width-100" style="height: 155px;" />
			<h3>Payeer</h3>
			<a href="/en/cpanel/deposit-fund/payeer" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-payeer" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-payeer" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Payeer Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>




    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="perfect-money"  class="max-width-100" style="height: 155px;" />
			<h3>Perfect Money</h3>
			<a href="/en/cpanel/deposit-fund/perfect-money" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-perfect-money" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-perfect-money" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Perfect Money Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display-:none;">
			<img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>CoinBase</h3>
			<a href="/en/cpanel/deposit-fund/coinbase" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-coinbase" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-coinbase" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">CoinBase Funding Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



        <div class="col-md-3 col-sm-4 col-xs-6  text-center" >
    			<img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
    			<h3>Western Union</h3>
    			<a href="#"  data-toggle="modal" data-target="#deposit-westernunion" class="btn btn-success form-control">Deposit</a><br />
    			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-westernunion-" style="display: none;" >More Details</span>


                        <!-- Modal -->
                        <div id="deposit-westernunion" class="modal fade" role="dialog">
                          <div class="modal-dialog  text-left">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Western Union Funding Details</h4>
                              </div>
                              <div class="modal-body">

                                <p style="color:red;">* Please ensure the transfer is sent in USD.</p>
                                <p>First Name : RAYANE</p>
                                <p>Family Name :  BEYDOUN</p>
                                <p>Country : Lebanon</p>
                                <p>Currency : USD</p>



                            <p style="color:red;">*if you already make the payment is proceed and upload your payment details</p>
                            <a href="/en/cpanel/deposit-fund/westernunion" class="btn btn-default" >Proceed to payment</a>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                          </div>
                        </div>



    			<!-- Modal -->
    			<div id="deposit-westernunion----" class="modal fade" role="dialog">
    			  <div class="modal-dialog  text-left">

    			    <!-- Modal content-->
    			    <div class="modal-content">
    			      <div class="modal-header">
    			        <button type="button" class="close" data-dismiss="modal">&times;</button>
    			        <h4 class="modal-title">Western Union Funding Details</h4>
    			      </div>
    			      <div class="modal-body">

                  <p>Contact us on finance@jmibrokers.com to receive Western Union funding instructions.</p>
                  <p id="request-details-success" style="display:none;color:green;"></p>
                  <p id="request-details-error" style="display:none;color:red;"></p>
                  <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('westernunion')">Request details now</button>

                    </div>
                    <div class="modal-footer">
                      <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Close</button>
                    </div>
                  </div>

    			  </div>
    			</div>
    		</div>



            <div class="col-md-3 col-sm-4 col-xs-6  text-center" >
              <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
              <h3>MoneyGram</h3>
              <a href="#"  data-toggle="modal" data-target="#deposit-moneygram" class="btn btn-success form-control">Deposit</a><br />
              <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-moneygram-" style="display: none;" >More Details</span>


              <!-- Modal -->
              <div id="deposit-moneygram" class="modal fade" role="dialog">
                <div class="modal-dialog  text-left">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">MoneyGram Funding Details</h4>
                    </div>
                    <div class="modal-body">

                      <p style="color:red;">* Please ensure the transfer is sent in USD.</p>
                      <p>First Name : VIVIANA</p>
                      <p>Family Name :  SALINAS RUIZ</p>
                      <p>Country : Panama</p>
                      <p>Currency : USD</p>



                  <p style="color:red;">*if you already make the payment is proceed and upload your payment details</p>

                  <a href="/en/cpanel/deposit-fund/moneygram" class="btn btn-default" >Proceed to payment</a>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

                </div>
              </div>


              <!-- Modal -->
              <div id="deposit-moneygram----" class="modal fade" role="dialog">
                <div class="modal-dialog  text-left">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">MoneyGram Funding Details</h4>
                    </div>
                    <div class="modal-body">



                      <p>Contact us on finance@jmibrokers.com to receive MoneyGramn funding instructions.</p>
                      <p id="request-details-success" style="display:none;color:green;"></p>
                      <p id="request-details-error" style="display:none;color:red;"></p>

                      <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('moneygram')">Request details now</button>

                        </div>
                        <div class="modal-footer">
                          <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Close</button>
                        </div>
                      </div>


                </div>
              </div>
            </div>





            		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
            			<img loading="lazy" src="/assets/cpanel/img/neteller.png" alt="Neteller"  class="max-width-100" />
            			<h3>Neteller</h3>
            			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-neteller">Deposit</a><br />
            			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >More Details</span>
            			<!-- Modal -->
            			<div id="deposit-neteller" class="modal fade" role="dialog">
            			  <div class="modal-dialog  text-left">

            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title"> Funding Details</h4>
            			      </div>
            			      <div class="modal-body">

                      <p>Contact us on finance@jmibrokers.com to receive Netteller funding instructions.</p>
                      <p id="request-details-success" style="display:none;color:green;"></p>
                      <p id="request-details-error" style="display:none;color:red;"></p>

                      <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('neteller')">Request details now</button>

            			      </div>
            			      <div class="modal-footer">
                          <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Close</button>
            			      </div>
            			    </div>

            			  </div>
            			</div>
            		</div>


                		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
                			<img loading="lazy" src="/assets/cpanel/img/skrill.png" alt="Neteller"  class="max-width-100" />
                			<h3>Skrill</h3>
                			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-skrill">Deposit</a><br />
                			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >More Details</span>
                			<!-- Modal -->
                			<div id="deposit-skrill" class="modal fade" role="dialog">
                			  <div class="modal-dialog  text-left">

                			    <!-- Modal content-->
                			    <div class="modal-content">
                			      <div class="modal-header">
                			        <button type="button" class="close" data-dismiss="modal">&times;</button>
                			        <h4 class="modal-title"> Funding Details</h4>
                			      </div>
                			      <div class="modal-body">


                            <p>Contact us on finance@jmibrokers.com to receive Skrill funding instructions.</p>
                            <p id="request-details-success" style="display:none;color:green;"></p>
                            <p id="request-details-error" style="display:none;color:red;"></p>

                            <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('skrill')">Request details now</button>

                  			      </div>
                  			      <div class="modal-footer">
                                <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Close</button>
                  			      </div>
                  			    </div>

                			  </div>
                			</div>
                		</div>

                    

          


	</div>

@endif

    </div>

</div>


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

                       $("#deposit-"+payment+" "+"#request-details-success").text("Requested invoice and bank details have been sent successfully to your mail,  Please provide your bank with invoice to facilitate your payment.");
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







</script>



            <!--End content-->
            </div>
        </div>

    </div>


@stop
