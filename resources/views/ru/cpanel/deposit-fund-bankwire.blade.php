@extends('ru.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


    {!! Form::open(['url'=>'ru/cpanel/deposit-fund/bankwire','files'=>true])  !!}


        <hr />
        <div>



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


@if(count($accounts)<=0)<h2>У вас нет реального аккаунта, вы можете добавить свой аккаунт из <a href="/ru/cpanel/add-account"> Здесь </a> или откройте новый аккаунт от <a href="/ru/cpanel/open-account"> Здесь </a></h2> @endif

@if(count($accounts)>0)

            <div class="col-sm-6">

                <br />
                <div class="row">


                    <label class="col-sm-4">Номер счета:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="account_number" id="account_number" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | реальный @if($account->account_type ==1)Индивидуальный аккаунт@endif @if($account->account_type ==2) IB Account @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Валюта:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency" required >
                                <option value="1" selected>доллар США</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="amount">
                    <label class="col-sm-4">Сумма вклада:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">
                  <label class="col-sm-4">Загрузить файл копии TT:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="file" class="form-control" name="ttcopy" id="ttcopy" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">
                  <label class="col-sm-4">Загрузить файл копии TT:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="file" class="form-control" name="invoice" id="ttcopy" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row text-danger">
                    <p>In case your bank account currency is different than the deposit currency assigned, the conversion will be performed by your bank / Card Issuer</p>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Депозит сейчас" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-push-1"  style="display:none;">

                <div id="demoaccount">
                <img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
                    <h3>Bank Wire Детали финансирования</h3>
                    <a class="btn btn-default" data-toggle="modal" data-target="#deposit-bankwire">Детали финансирования</a>

                </div>




                                      <div id="deposit-bankwire" class="modal fade" role="dialog">
                                        <div class="modal-dialog  text-left" style="max-width: 880px;width:100%;">

                                			    <!-- Modal content-->
                                			    <div class="modal-content">
                                			      <div class="modal-header">
                                			        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                			        <h4 class="modal-title">Bank Wire Детали финансирования</h4>
                                			      </div>




                                           <div class="modal-body" style-="display:none;" >

                                              <style>

                                              @media only screen and (max-width: 600px) {

                                              	h3 ,.table4H
                                              	{
                                              		font-size: 16px !important;
                                              	}
                                              	#JMI ,.orangeText
                                              	{
                                              		font-size: 19px !important;
                                              	}
                                              	.grayText ,.sortedText
                                              	{
                                              		font-size: 15px;
                                              	}
                                              	td
                                              	{
                                              		font-size: 13px;
                                              	}
                                              	.table4P
                                              	{
                                              		font-size: 13px;
                                              	}
                                              }

                                              h3
                                              {
                                              	font-size:20px;
                                              }
                                              hr
                                              {
                                                  border-top: 2px solid black !important;
                                              }
                                              table
                                              {
                                                  margin-bottom: 50px !important;
                                              }
                                              td
                                              {
                                                  font-size: 16px;
                                                  color: black;
                                                  border:none !important;
                                              }
                                              td:nth-child(2)
                                              {
                                                  font-weight: bold;
                                              }
                                              tr:last-child td:nth-child(2)
                                              {
                                                  color: #0358b5;
                                              }
                                              .table-striped>tbody>tr:nth-of-type(odd) {
                                                  background-color: white !important;
                                              }
                                              .sortedText
                                              {
                                                  color: #737373;
                                              	font-size: 20px;
                                              	font-weight: bold;
                                              }
                                              .orangeText
                                              {
                                                  background-color: #ffca26;
                                                  color: #365f91;
                                                  font-weight: bold;
                                                  padding: 4px;
                                                  margin-top:50px ;
                                              }
                                              .topTextH4,.topTextH3,#JMI
                                              {
                                                  font-weight: bold;
                                                  text-align: center;
                                              }
                                              #JMI
                                              {
                                                  font-size: 24px;
                                              }
                                              #Effective
                                              {
                                                  font-weight: bold;
                                              	font-size: 19px;
                                              }
                                              .topTextH4
                                              {
                                                  color: black;
                                              }
                                              .topTextH3
                                              {
                                                  color:#0358b5 ;
                                              }
                                              .grayText
                                              {
                                                  color: #737373;
                                                  font-size: 18px;

                                              }
                                              .table4H
                                              {
                                                  color:#0358b5 ;
                                              }
                                              .table4P
                                              {
                                                  color: #737373;
                                                  font-size: 15px;
                                                  padding-left: 15px;
                                                  margin-bottom:70px ;
                                              }






                                              </style>

                                                    <h4 class="topTextH4">Standard Settlement Instructions (SSIs) for Sending Wire Transfers to your trading accounts</h4>
                                                    <h3 class="topTextH3">Valid from 30<sup>th</sup> of June, 2021</h3>
                                                <hr>
                                                <h2 id="JMI">JMI Brokers ltd STANDART SETTLEMENT INSTRUCTIONS</h2>
                                                <h3 id="Effective">Effective30<sup>th</sup> of June 2021, use these instructions to wire funds into your account</h3>
                                                <p class="grayText">If these instructions are not used, the payment may be delayed, fail to reach your account, or be charged with
                                                    additional fees.</p>
                                                <p class="grayText">In the first two pages you will find SEPA details. In the third and fourth pages you will find SWIFT details for EUR
                                                    and USD transfers.</p>
                                                <h3 class="orangeText">Lithuania</h3>
                                                <h3 class="sortedText">1. EUR within Europe (SEPA) – UAB Pervesk -Additional correspondent fees apply</h3>
                                                <table class="table table-striped">
                                                    <tbody>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver:</td>
                                                        <td>Pacific Private Bank Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver’s Address:</td>
                                                        <td>Govant Building, Port Vila, Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank:</td>
                                                        <td>UAB Pervesk</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank Address:</td>
                                                        <td>Rinktines st. 5, LT-09234 Vilnius, Lithuania</td>
                                                      </tr>
                                                      <tr>
                                                        <td>SWIFT BIC:</td>
                                                        <td>UAPELT22XXX</td>
                                                      </tr>
                                                      <tr>
                                                        <td>IBAN:</td>
                                                        <td>LT73 3550 0200 0000 1699</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Reference Message/ <sup>1</sup></td>
                                                        <td>JMI Brokers ltd - VU24PPBL021000002148
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <h3 class="orangeText">Lithuania</h3>
                                                <h3 class="sortedText">2. EUR within Europe (SEPA) – UAB VerifiedPayments -Additional correspondent fees apply</h3>
                                                <table class="table table-striped">
                                                    <tbody>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver:</td>
                                                        <td>Pacific Private Bank Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver’s Address:</td>
                                                        <td>Govant Building, Port Vila, Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank:</td>
                                                        <td>UAB Verified Payments</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank Address:</td>
                                                        <td>GEDIMINO AV. 20, Vilnius, Lithuania</td>
                                                      </tr>
                                                      <tr>
                                                        <td>SWIFT BIC:</td>
                                                        <td>VEPALT21XXX</td>
                                                      </tr>
                                                      <tr>
                                                        <td>IBAN:</td>
                                                        <td>LT91 3750 0200 0000 0008</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Reference Message/ <sup>1</sup></td>
                                                        <td>JMI Brokers Ltd - VU24PPBL021000002148</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <hr>
                                                  <h3 class="orangeText">United Kingdom</h3>
                                                  <h3 class="sortedText">3. EUR within Europe (SEPA) – Financial House-Additional correspondent fees apply</h3>
                                                  <table class="table table-striped">
                                                    <tbody>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver:</td>
                                                        <td>Pacific Private Bank Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver’s Address:</td>
                                                        <td>Govant Building, Port Vila, Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank:</td>
                                                        <td>Financial House Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Beneficiary/ Receiver Bank Address:</td>
                                                        <td>6 Bevis Marks Building, 1st Floor, Bury Court London,England, EC3A 7HL</td>
                                                      </tr>
                                                      <tr>
                                                        <td>SWIFT BIC:</td>
                                                        <td>FNHOGB21XXX</td>
                                                      </tr>
                                                      <tr>
                                                        <td>IBAN:</td>
                                                        <td>GB95FNHO0099 36932230 40</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Reference Message/ <sup>1</sup></td>
                                                        <td>JMI Brokers ltd VU24PPBL021000002148</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <h4 class="table4H"><sup>1</sup>JMI Brokers ltd Client Number provided with account opening confirmation.</h4>
                                                  <p class="table4P">JMI Brokers reserves the right to change these instructions without prior notification. Customers should contact us prior to issuing
                                                    Instructions to new remitters</p>

                                                  <h3 class="orangeText">Turkey – SWIFT - Aktif Bank</h3>
                                                  <h3 class="sortedText">4. EUR outside Europe (SWIFT) –Additional correspondent fees apply</h3>
                                                  <table class="table table-striped">
                                                    <tbody>
                                                      <tr>
                                                        <td>59: Beneficiary/ Receiver:</td>
                                                        <td>JMI Brokers ltd</td>
                                                      </tr>
                                                      <tr>
                                                        <td>59: Beneficiary/ Receiver’s Address:</td>
                                                        <td>1276, Govant Building, Kumul Highway, Port Vila Republic of Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>59: IBAN/ Account Number:</td>
                                                        <td>VU24PPBL021000002148</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: Beneficiary/ Receiver Bank:</td>
                                                        <td>Pacific Private Bank Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: Beneficiary/ Receiver Bank Address:</td>
                                                        <td>Govant Building, Port Vila, Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: SWIFT BIC:</td>
                                                        <td>PPBLVUVU</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank:</td>
                                                        <td>Aktif Bank</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank Address:</td>
                                                        <td>Buyukdere Cad. Zincirlikuyu, Istanbul, Turkey</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank BIC:</td>
                                                        <td>CAYTTRIS</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary Account with Correspondent Bank:</td>
                                                        <td>TR950014300000000001599246</td>
                                                      </tr>
                                                      <tr>
                                                        <td>70: Reference Message/ <sup>1</sup></td>
                                                        <td>
                                            				<div>Payment details:</div>
                                            				<div>Account Number with JMI Brokers : xxx</div>
                                            			</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <h3 class="orangeText">Turkey – SWIFT - Nurol Bank</h3>
                                                  <h3 class="sortedText">5. EUR outside Europe (SWIFT) –Additional correspondent fees might apply</h3>
                                                  <table class="table table-striped">
                                                    <tbody>
                                                      <tr>
                                                        <td>59: Beneficiary/ Receiver:</td>
                                                        <td>JMI Brokers Ltd</td>
                                                      </tr>
                                                      <tr>
                                                        <td>59: Beneficiary/ Receiver’s Address:</td>
                                                        <td>1276, Govant Building, Kumul Highway,Port Vila Republic of Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>59: IBAN/ Account Number:</td>
                                                        <td>VU24PPBL021000002148</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: Beneficiary/ Receiver Bank:</td>
                                                        <td>Pacific Private Bank Limited</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: Beneficiary/ Receiver Bank Address:</td>
                                                        <td>Govant Building, Port Vila, Vanuatu</td>
                                                      </tr>
                                                      <tr>
                                                        <td>57A: SWIFT BIC:</td>
                                                        <td>PPBLVUVUXXX</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank:</td>
                                                        <td>Nurol Investment Bank Inc.</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank Address:</td>
                                                        <td>Maslak Nurol Plaza, Buyukdere Caddesi 71 Masla,Istanbul, Turkey</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary/ Correspondent Bank BIC:</td>
                                                        <td>NUROTRISXXX</td>
                                                      </tr>
                                                      <tr>
                                                        <td>56A: Intermediary Account with Correspondent Bank:</td>
                                                        <td>TR88 0014 1000 0004 4109 9000 04</td>
                                                      </tr>
                                                      <tr>
                                                        <td>70: Reference Message/ <sup>1</sup></td>
                                                        <td>
                                            				<div>Payment Details:</div>
                                            				<div>Account Number with JMI Brokers: xxx</div>
                                            			</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <h4 class="table4H"><sup>1</sup>JMI Brokers ltd Client Number provided with account opening confirmation.</h4>
                                                  <p class="table4P">JMI Brokers ltd reserves the right to change these instructions without prior notification. Customers should contact us prior to issuing
                                                    instructions to new remitters</p>

                                			      </div>
                                			      <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">закрыто</button>
                                			      </div>
                                			    </div>

                                			  </div>
                                			</div>


            </div>


@endif


        </div>


    </div>

</div>

<br>






            <!--End content-->
            </div>
        </div>

    </div>



@stop
