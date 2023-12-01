@extends('ru.cpanel.layout')
@section('content')
<style>
  #flexDiv
  {
    display: flex;
  }
  #submit
  {
    max-width: 300px;
    margin: 0px auto;
  }
  #alarmMsg
  {
    color:red;
    font-size: 12px;
  }
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
  .form-control input:focus
  {
    border: none;
    box-shadow: none;
    outline: none;
  }
  .controls select:focus
  {
    border: 1px solid #ccc;
    box-shadow: none;
    outline: none;
  }
  .fa-times-circle
  {
    color: #ff5350;
    font-size: 20px;
    display: none;
  }
  .fa-check-circle
  {
    color: #27e492;
    font-size: 20px;
    display: none;
  }

input
{
  width: calc(100% - 25px);
    border: none;
    height: 32px;
}
div.form-control
  {
    padding: 0px 12px !important;
  }
</style>


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


@if(count($accounts)<=0)<h2>У вас нет реального аккаунта, вы можете добавить свой аккаунт из <a href="/ru/cpanel/add-account"> Здесь </a> или откройте новый аккаунт от <a href="/ru/cpanel/open-account"> Здесь </a></h2> @endif

@if(count($accounts)>0)

	<div class="row">

    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/creditcard.png" alt="Credit Card" class="max-width-100"/>
			<h3>Credit Card</h3>
			<a href="/ru/cpanel/deposit-fund/credit-card" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-creditcard" style="display:none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-creditcard" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content text-left">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Credit Card Детали финансирования</h4>
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


		<div class="col-md-3 col-sm-4 col-xs-6  text-center">
			<img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
			<h3>Bank Wire</h3>
			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-bankwire">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-bankwire" style="display:none;" >More Details</span>



                            <div id="deposit-bankwire" class="modal fade" role="dialog">
                              <div class="modal-dialog  text-left" style="max-width: 880px;width:100%;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bank Wire Детали финансирования</h4>
                                  </div>

                                              <div class="modal-body" style-="display:none;">


                                                    <p id="request-details-success" style="display:none;color:green;"></p>
                                                    <p id="request-details-error" style="display:none;color:red;"></p>

                                                    <?PHP if(count($invoices)>0 ){ ?>

                                                    <a class="btn btn-success" onclick="show_request_invoice_form()">Запросить новый счет</a>
                                                    <script>
                                                      function show_request_invoice_form()
                                                      {
                                                        $('div#request-invoice-form').show();
                                                      }
                                                    </script>
                                                    <span class="btn btn-success cursor-pointer" data-toggle="modal" data-target="#view-recent-invoices" style-="display:none;" >Посмотреть последний счет</span>


                                                    <a href="/ru/cpanel/deposit-fund/bankwire" class="btn btn-default" >Submit SWIFT / TT Copy</a>

                                                  <?PHP  } ?>
                                                  <div id="request-invoice-form" style="<?PHP if(count($invoices)>0 ){echo 'display:none';} ?>">

                                                  {!! Form::open(['url'=>'en/cpanel/deposit-fund/request-invoice','id'=>'request-invoice'])  !!}



                                                  <br />
                                                  <div class="row">
                                                      <label class="col-sm-4">Полное имя:</label>
                                                      <div class="col-sm-8">
                                                        <div class="controls form-control" id="contentfullname">
                                                            <input onkeyup="validFullName()" type="text"  name="fullname" id="fullname"   />
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                            <p style="color:red;" id="validFullName" ></p>
                                                        </div>
                                                      </div>
                                                  </div>



                                                      <br />
                                                      <div class="row">

                                                        <label class="col-sm-4">Номер счета:</label>
                                                          <div class="col-sm-8">
                                                            <div class="controls">
                                                                <select class="form-control" name="account_number" id="account_number"   >
                                                                    @foreach($accounts as $account)
                                                                    <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                          </div>
                                                      </div>



                                                  <br />
                                                  <div class="row">
                                                    <label class="col-sm-4">Сумма вклада:</label>
                                                      <div class="col-sm-8">
                                                        <div class="controls form-control" id="contentamount">
                                                          <input  onkeyup="validAmount()" type="number" name="amount" id="amount"   />
                                                          <input type="number" class="form-control" value="1" name="type" id="type"   style="display:none;" />
                                                          <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                          <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                          <p style="color:red;" id="validAmount" ></p>
                                                        </div>
                                                      </div>
                                                  </div>


                                                  <br />
                                                  <div class="row">
                                                      <label class="col-sm-4">Валюта:</label>
                                                      <div class="col-sm-8">
                                                          <div class="controls">
                                                              <select class="form-control" name="currency" id="currency">
                                                                  <option value="1" selected>доллар США</option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                  </div>




                                                    <br />
                                                    <div class="row">
                                                        <label class="col-sm-4">Адрес:</label>
                                                        <div class="col-sm-8">
                                                          <div class="controls form-control" id="contentaddress" >
                                                              <input onkeyup="validAddress()" id="address" type="text"  name="address"     />
                                                              <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                              <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                              <p style="color:red;" id="validAddress" ></p>
                                                          </div>
                                                        </div>
                                                    </div>


                                                      <br />
                                                      <div class="row">
                                                          <label class="col-sm-4">Страна:</label>
                                                          <div class="col-sm-8">
                                                            <div class="controls form-control" id="contentcountry">
                                                                <input onkeyup="validCountry()" type="text" name="country" id="country"   />
                                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                <p style="color:red;" id="validCountry" ></p>
                                                            </div>
                                                          </div>
                                                      </div>




                                                        <br />
                                                        <div class="row">
                                                            <label class="col-sm-4">Город:</label>
                                                            <div class="col-sm-8">
                                                              <div class="controls form-control" id="contentcity">
                                                                  <input onkeyup="validCity()" type="text" name="city" id="city"    />
                                                                  <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                  <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                  <p style="color:red;" id="validCity" ></p>
                                                              </div>
                                                            </div>
                                                        </div>





                                                  <br />
                                                  <p id="alarmMsg">*Распечатайте счет-фактуру, чтобы получить доступ к реквизитам SEPA и SWIFT Bank для продолжения платежа.</p>


                                                  <div class="row">
                                                      <label class="col-sm-4"></label>
                                                      <div class="col-sm-12">
                                                          <div id="flexDiv" class="controls">
                                                               <input disabled class="btn btn-success form-control" type="submit" id="submit" value="Депозит сейчас" />

                                                          </div>
                                                      </div>
                                                  </div>
                                              {!! Form::close() !!}



                                            </div>
                                          </div>


                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">закрыто</button>



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
                      <h4 class="modal-title">Последние счета</h4>
                    </div>
                    <div class="modal-body">

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Счет</th>
                            <th>Количество</th>
                            <th>Дата</th>
                            <th>Выставленный счет</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?PHP foreach($invoices as $invoice){ ?>
                          <tr>
                            <td>{{$invoice->account_number}}</td>
                            <td>{{$invoice->amount}}</td>
                            <td> {{ substr($invoice->created_at,0,10)}}</td>
                            <td><a class="btn btn-success" target="_blank" href="/assets/invoices/{{$invoice->filename}}.pdf">Посмотреть счет</a></td>
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
			<a href="/ru/cpanel/deposit-fund/epay" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-epay" style="display:none;">More Details</span>
			<!-- Modal -->
			<div id="deposit-epay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Epay Детали финансирования</h4>
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
			<img loading="lazy" src="/assets/cpanel/img/fasapay.png" alt="FasaPay"  class="max-width-100" style="height: 155px;" />
			<h3>FasaPay</h3>
			<a href="/ru/cpanel/deposit-fund/fasapay" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-fasapay" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-fasapay" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">FasaPay Детали финансирования</h4>
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
			<img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="advcash"  class="max-width-100" style="height: 155px;" />
			<h3>advcash</h3>
			<a href="/ru/cpanel/deposit-fund/advcash" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-advcash" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-advcash" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">advcash Детали финансирования</h4>
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
			<img loading="lazy" src="/assets/cpanel/img/payeer.png" alt="payeer"  class="max-width-100" style="height: 155px;" />
			<h3>Payeer</h3>
			<a href="/ru/cpanel/deposit-fund/payeer" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-payeer" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-payeer" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Payeer Детали финансирования</h4>
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
			<img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="perfect-money"  class="max-width-100" style="height: 155px;" />
			<h3>Perfect Money</h3>
			<a href="/ru/cpanel/deposit-fund/perfect-money" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-perfect-money" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-perfect-money" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Perfect Money Детали финансирования</h4>
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
			<img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>CoinBase</h3>
			<a href="/ru/cpanel/deposit-fund/coinbase" class="btn btn-success form-control">Депозит </a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-coinbase" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-coinbase" class="modal fade" role="dialog">
			  <div class="modal-dialog  text-left">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">CoinBase Детали финансирования</h4>
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
      <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
      <h3>Western Union</h3>
      <a href="#"   data-toggle="modal" data-target="#deposit-westernunion" class="btn btn-success form-control">Депозит</a><br />
      <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-westernunion" style="display: none;" >More Details</span>




                              <!-- Modal -->
                              <div id="deposit-westernunion" class="modal fade" role="dialog">
                                <div class="modal-dialog  text-left">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Подробная информация о финансировании Wester Union</h4>
                                    </div>
                                    <div class="modal-body">

                                      <p style="color:red;">* Убедитесь, что перевод отправлен в долларах США.</p>

                                      <p>Имя : RAYANE</p>
                                      <p>Фамилия : BEYDOUN</p>
                                      <p>Страна : Lebanon</p>
                                      <p>Валюта : USD</p>



                                  <p style="color:red;">*если вы уже сделали платеж, продолжите и загрузите свои платежные реквизиты</p>
                                  <a href="/ru/cpanel/deposit-fund/westernunion" class="btn btn-default" >Перейти к оплате</a>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрывать</button>
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
              <h4 class="modal-title">Western Union Детали финансирования</h4>
            </div>
            <div class="modal-body">
              <p>Свяжитесь с нами по адресу finance@jmibrokers.com, чтобы получить инструкции по финансированию Westernunion.</p>
              <p id="request-details-success" style="display:none;color:green;"></p>
              <p id="request-details-error" style="display:none;color:red;"></p>

              <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('westernunion')">Запросить подробности сейчас</button>

                </div>
                <div class="modal-footer">
                  <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Закрывать</button>
                </div>
              </div>

        </div>
      </div>
    </div>



        <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style-="display:none;">
          <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
          <h3>MoneyGram</h3>
          <a href="#"   data-toggle="modal" data-target="#deposit-moneygram" class="btn btn-success form-control">Депозит</a><br />
          <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-moneygram-" style="display: none;" >More Details</span>




                        <!-- Modal -->
                        <div id="deposit-moneygram" class="modal fade" role="dialog">
                          <div class="modal-dialog  text-left">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Подробная информация о финансировании MoneyGram</h4>
                              </div>
                              <div class="modal-body">

                                <p style="color:red;">* Убедитесь, что перевод отправлен в долларах США.</p>

                                <p>Имя : VIVIANA</p>
                                <p>Фамилия :  SALINAS RUIZ</p>
                                <p>Страна : Panama</p>
                                <p>Валюта : USD</p>



                            <p style="color:red;">*если вы уже сделали платеж, продолжите и загрузите свои платежные реквизиты</p>
                            <a href="/ru/cpanel/deposit-fund/moneygram" class="btn btn-default" >Перейти к оплате</a>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Закрывать</button>
                            </div>
                          </div>

                          </div>
                        </div>





          <!-- Modal -->
          <div id="deposit-moneygram-----" class="modal fade" role="dialog">
            <div class="modal-dialog  text-left">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">MoneyGram Детали финансирования</h4>
                </div>
                <div class="modal-body">
                  <p>Свяжитесь с нами по адресу finance@jmibrokers.com, чтобы получить инструкции по финансированию MoneyGram.</p>
                  <p id="request-details-success" style="display:none;color:green;"></p>
                  <p id="request-details-error" style="display:none;color:red;"></p>

                  <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('moneygram')">Запросить подробности сейчас</button>

                    </div>
                    <div class="modal-footer">
                      <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Закрывать</button>
                    </div>
                  </div>

            </div>
          </div>
        </div>





        		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
        			<img loading="lazy" src="/assets/cpanel/img/neteller.png" alt="Neteller"  class="max-width-100" />
        			<h3>Neteller</h3>
        			<a href="#" class="btn btn-success form-control"  data-toggle="modal" data-target="#deposit-neteller">Депозит </a><br />
        			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >More Details</span>
        			<!-- Modal -->
        			<div id="deposit-neteller" class="modal fade" role="dialog">
        			  <div class="modal-dialog  text-left">

        			    <!-- Modal content-->
        			    <div class="modal-content">
        			      <div class="modal-header">
        			        <button type="button" class="close" data-dismiss="modal">&times;</button>
        			        <h4 class="modal-title"> Детали финансирования</h4>
        			      </div>
        			      <div class="modal-body">

                      <p>Свяжитесь с нами по адресу finance@jmibrokers.com, чтобы получить инструкции по финансированию Neteller.</p>
                      <p id="request-details-success" style="display:none;color:green;"></p>
                      <p id="request-details-error" style="display:none;color:red;"></p>

                      <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('neteller')">Запросить подробности сейчас</button>

                        </div>
                        <div class="modal-footer">
                          <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Закрывать</button>
                        </div>
                      </div>

        			  </div>
        			</div>
        		</div>


            		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
            			<img loading="lazy" src="/assets/cpanel/img/skrill.png" alt="Neteller"  class="max-width-100" />
            			<h3>Skrill</h3>
            			<a href="#" class="btn btn-success form-control"  data-toggle="modal" data-target="#deposit-skrill">Депозит </a><br />
            			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >More Details</span>
            			<!-- Modal -->
            			<div id="deposit-skrill" class="modal fade" role="dialog">
            			  <div class="modal-dialog  text-left">

            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title"> Детали финансирования</h4>
            			      </div>
            			      <div class="modal-body">
                          <p>Свяжитесь с нами по адресу finance@jmibrokers.com, чтобы получить инструкции по финансированию Skrill.</p>
                          <p id="request-details-success" style="display:none;color:green;"></p>
                          <p id="request-details-error" style="display:none;color:red;"></p>

                          <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('skrill')">Запросить подробности сейчас</button>

                            </div>
                            <div class="modal-footer">
                              <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">Закрывать</button>
                            </div>
                          </div>


            			  </div>
            			</div>
            		</div>

                
              {{-- visa --}}

    <div class="col-md-3 col-sm-4 col-xs-6  text-center"  style="display-:none;">
			<img loading="lazy" src="/visa_icon.png" alt="Visa"  class="max-width-100" style="height: 155px;" />
			<h3>Visa</h3>
			<a href="/en/ePay" class="btn btn-success form-control">Deposit</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-coinbase" style="display: none;" >More Details</span>
         

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

              $("#deposit-"+payment+" "+"#request-details-success").text("Платежные реквизиты успешно отправлены на ваш адрес электронной почты.");
              $("#deposit-"+payment+" "+"#request-details-success").show();
              $("#deposit-"+payment+" "+"#request-details-error").hide();
              $("#deposit-"+payment+" "+"#submit-request-details").hide();
              $("#deposit-"+payment+" "+"#close-request-details").show();

            }else if(result=='false'){
              $("#deposit-"+payment+" "+"#request-details-error").text("Ошибка, попробуйте позже");
              $("#deposit-"+payment+" "+"#request-details-error").show();
            }
        },
          error:function(result){
            $("#deposit-"+payment+" "+"#request-details-error").text("Ошибка, попробуйте позже");
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

                           $("#deposit-"+payment+" "+"#request-details-success").text("Запрошенный счет-фактура и банковские реквизиты были успешно отправлены на вашу почту  Пожалуйста, предоставьте счет-фактуру своему банку, чтобы облегчить вашу оплату.");
                           $("#deposit-"+payment+" "+"#request-details-success").show();
                           $("#deposit-"+payment+" "+"#request-details-error").hide();
                           $("#deposit-"+payment+" "+"#submit-request-details").hide();
                           $("#deposit-"+payment+" "+"#close-request-details").show();
                           $("form#request-invoice").hide();
                         }else if(result=='false'){
                           $("#deposit-"+payment+" "+"#request-details-error").text("Ошибка, попробуйте позже");
                           $("#deposit-"+payment+" "+"#request-details-error").show();

                         }
                     },
                       error:function(result){
                         $("#deposit-"+payment+" "+"#request-details-error").text("Ошибка, попробуйте позже");
                         $("#deposit-"+payment+" "+"#request-details-error-btn").show();
                     }
                   });


          });





</script>


            <!--End content-->
            </div>
        </div>

    </div>
    <!--**************************************Validations**************** -->
    Разрешены только русские буквы
    <script>
      var fullNameDisable , amountDisable , cityDisable , addressDisable , countryDisable;
      $('.form-control input').blur(function()
      {
          if( !$(this).val() ) {
                $(this).siblings('.fa-times-circle').show();
                $(this).parents(".form-control").css('borderColor' , "#ff5350");
                $(this).siblings('p').text("*требуется");
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
            text = "*требуется";
            fullNameDisable=false;
            document.getElementById("contentfullname").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentfullname').show();
          }
          else if (!regex.test(fullname))
          {
            text = "*Разрешены только английские буквы. ";
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
            text = "*требуется";
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
            text = "*требуется";
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
            text = "*требуется";
            cityDisable=false;
            document.getElementById("contentcity").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentcity').show();
          }
          else if (!regex.test(city))
          {
            text = "*Разрешены только английские буквы. ";
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
            text = "*требуется";
            countryDisable=false;
            document.getElementById("contentcountry").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentcountry').show();
          }
          else if (!regex.test(country))
          {
            text = "*Разрешены только английские буквы. ";
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
        function validButton()
        {
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
