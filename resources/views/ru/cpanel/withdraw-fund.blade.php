@extends('ru.cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

        <!--start content -->


@if(count($accounts)<=0)<h2>У вас нет реального аккаунта, вы можете добавить свой аккаунт из <a href="/ru/cpanel/add-account"> Здесь </a> или откройте новый аккаунт от <a href="/ru/cpanel/open-account"> Здесь </a></h2> @endif

@if(count($accounts)>0)

	<div class="row">

    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/creditcard.png" alt="Credit Card" class="max-width-100"/>
			<h3>Credit Card</h3>
			<a href="/ru/cpanel/withdraw-fund/credit-card" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-creditcard" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-creditcard" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content text-left">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Credit Card Снятие реквизитов</h4>
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
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>




		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/neteller.png" alt="Neteller"  class="max-width-100" />
			<h3>Neteller</h3>
			<a href="/ru/cpanel/withdraw-fund/neteller" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-neteller" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-neteller" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Neteller Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">

					<h3>Neteller</h3><p>Notes on Deposits and Withdrawals by Neteller</p><ul>

					<li>Deposits may take up to 24 hours to be credited to the
					trading account upon a deposit in the
					Company’s designated client accounts. If your deposit has not
					been credited
					in
					your trading account within 24 hours, please
					check for any emails messages from us</li>
					<li>IronFX&nbsp;will credit your Trading Account with the net amount received .</li>


					<li>If you have used a credit/debit card to deposit, please make sure that you have refunded those deposits back to the same card and up to their full value before making a Neteller withdraw request</li>
					<li>Accounts of payment providers may be held in different jurisdictions (EU or third countries) thus the rights on the specific account could differ from the selection of your provider. </li>
					<li>Please ensure that you make your withdraw request using the same Neteller account that you used to deposit.</li>
					</ul>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
    			<img loading="lazy" src="/assets/cpanel/img/skrill.png" alt="Neteller"  class="max-width-100" />
    			<h3>Skrill</h3>
    			<a href="/ru/cpanel/withdraw-fund/skrill" class="btn btn-success form-control"> Вывод </a><br />
    			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-neteller" style="display:none;">More Details</span>
    			<!-- Modal -->
    			<div id="withdraw-neteller" class="modal fade" role="dialog">
    			  <div class="modal-dialog  text-left">

    			    <!-- Modal content-->
    			    <div class="modal-content">
    			      <div class="modal-header">
    			        <button type="button" class="close" data-dismiss="modal">&times;</button>
    			        <h4 class="modal-title">Neteller Снятие реквизитов</h4>
    			      </div>
    			      <div class="modal-body">

    					<h3>Neteller</h3><p>Notes on Deposits and Withdrawals by Neteller</p><ul>

    					<li>Deposits may take up to 24 hours to be credited to the
    					trading account upon a deposit in the
    					Company’s designated client accounts. If your deposit has not
    					been credited
    					in
    					your trading account within 24 hours, please
    					check for any emails messages from us</li>
    					<li>IronFX&nbsp;will credit your Trading Account with the net amount received .</li>


    					<li>If you have used a credit/debit card to deposit, please make sure that you have refunded those deposits back to the same card and up to their full value before making a Neteller withdraw request</li>
    					<li>Accounts of payment providers may be held in different jurisdictions (EU or third countries) thus the rights on the specific account could differ from the selection of your provider. </li>
    					<li>Please ensure that you make your withdraw request using the same Neteller account that you used to deposit.</li>
    					</ul>

    			      </div>
    			      <div class="modal-footer">
    			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
    			      </div>
    			    </div>

    			  </div>
    			</div>
    		</div>


		<div class="col-md-3 col-sm-4 col-xs-6  text-center">
			<img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
			<h3>Bank Wire</h3>
			<a href="/ru/cpanel/withdraw-fund/bankwire" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-bankwire" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-bankwire" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Bank Wire Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>










    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/fasapay.png" alt="Fasapay"  class="max-width-100" />
			<h3>Fasapay</h3>
			<a href="/ru/cpanel/withdraw-fund/fasapay" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-fasapay" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-fasapay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Fasapay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>


		<div class="col-md-3 col-sm-4 col-xs-6  text-center"  >
			<img loading="lazy" src="/assets/cpanel/img/epay.png" alt="Fasapay"  class="max-width-100" />
			<h3>Epay</h3>
			<a href="/ru/cpanel/withdraw-fund/epay" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-epay" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-epay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/payeer.png" alt="payeer"  class="max-width-100" />
			<h3>Payeer</h3>
			<a href="/ru/cpanel/withdraw-fund/payeer" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-payeer" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-payeer" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>




    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="perfect"  class="max-width-100" />
			<h3>Perfect Money</h3>
			<a href="/ru/cpanel/withdraw-fund/perfect-money" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-perfect" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-perfect" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>



    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="advcash"  class="max-width-100" />
			<h3>advcash</h3>
			<a href="/ru/cpanel/withdraw-fund/advcash" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-advcash" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-advcash" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>


    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="coinbase"  class="max-width-100" style="height: 155px;" />
			<h3>CoinBase</h3>
			<a href="/ru/cpanel/withdraw-fund/coinbase" class="btn btn-success form-control"> Вывод </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#withdraw-coinbase" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="withdraw-coinbase" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Снятие реквизитов</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bla Bla Bla</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>





        <div class="col-md-3 col-sm-4 col-xs-6  text-center" >
          <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
          <h3>Western Union</h3>
          <a href="#"  data-toggle="modal" data-target="#deposit-westernunion" class="btn btn-success form-control">Вывод</a><br />
          <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-westernunion" style="display: none;" >More Details</span>
          <!-- Modal -->
          <div id="deposit-westernunion" class="modal fade" role="dialog">
            <div class="modal-dialog  text-left">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Western Union Детали финансирования</h4>
                </div>
                <div class="modal-body">
                  <p>Обратитесь в службу поддержки для получения дополнительной информации</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
                </div>
              </div>

            </div>
          </div>
        </div>



            <div class="col-md-3 col-sm-4 col-xs-6  text-center" >
              <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
              <h3>MoneyGram</h3>
              <a href="#"  data-toggle="modal" data-target="#deposit-moneygram" class="btn btn-success form-control">Вывод</a><br />
              <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-moneygram" style="display: none;" >More Details</span>
              <!-- Modal -->
              <div id="deposit-moneygram" class="modal fade" role="dialog">
                <div class="modal-dialog  text-left">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">MoneyGram Детали финансирования</h4>
                    </div>
                    <div class="modal-body">
                      <p>Обратитесь в службу поддержки для получения дополнительной информации</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>






	</div>

@endif

    </div>

</div>




            <!--End content-->
            </div>
        </div>

    </div>



@stop
