@extends('ar.cpanel.layout')
@section('content')
<style>
.modal-header .close
{
    float: left;
}
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
   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


@if(count($accounts)<=0)<h2>ليس لديك حسابات حقيقية, يمكنك اضافة حسابك من  <a href="/ar/cpanel/add-account">هنا</a> او افتح حساب جديد من <a href="/ar/cpanel/open-account">هنا</a></h2> @endif

@if(count($accounts)>0)

	<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-6 text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/creditcard.png" alt="Credit Card" class="max-width-100"/>
			<h3>فيزا / بطاقة ائتمانية</h3>
			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-neteller">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-creditcard" style="display:none;" >تفاصيل</span>
			<!-- Modal -->
			<div id="deposit-creditcard" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content text-left">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">تفاصيل الايداع من خلال فيزا / بطاقة ائتمانية</h4>
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
			        <button type="button" class="btn btn-default" data-dismiss="modal">اغلق</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>


		<div class="col-md-3 col-sm-4 col-xs-6  text-center">
			<img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
			<h3>الحوالة البنكية</h3>
			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-bankwire">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-bankwire" style="display:none;" >تفاصيل</span>




            <div id="deposit-bankwire" class="modal fade" role="dialog">
              <div class="modal-dialog  text-left" style="max-width: 880px;width:100%;text-align: right;">

      			    <!-- Modal content-->
      			    <div class="modal-content">
      			      <div class="modal-header">
      			        <button type="button" class="close" data-dismiss="modal">&times;</button>
      			        <h4 class="modal-title">تفاصيل الايداع البنكى</h4>
      			      </div>

                              <div class="modal-body" style-="display:none;text-align: right;ئ">


                            <p id="request-details-success" style="display:none;color:green;"></p>
                            <p id="request-details-error" style="display:none;color:red;"></p>

                            <?PHP if(count($invoices)>0 ){ ?>

                            <a class="btn btn-success" onclick="show_request_invoice_form()">طلب فاتورة جديدة</a>
                            <script>
                              function show_request_invoice_form()
                              {
                                $('div#request-invoice-form').show();
                              }
                            </script>
                            <span class="btn btn-success cursor-pointer" data-toggle="modal" data-target="#view-recent-invoices" style-="display:none;" >عرض الفواتير </span>

                            <a href="/ar/cpanel/deposit-fund/bankwire" class="btn btn-default" >Submit SWIFT / TT Copy</a>


                          <?PHP  } ?>

                            <div id="request-invoice-form" style="<?PHP if(count($invoices)>0 ){echo 'display:none';} ?>">


                                {!! Form::open(['url'=>'en/cpanel/deposit-fund/request-invoice','id'=>'request-invoice'])  !!}



                                <br />
                                <div class="row" id="amount">
                                    <label class="col-sm-4 col-sm-push-8">الأسم بالكامل:</label>
                                    <div class="col-sm-8 col-sm-pull-4">

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

                                      <label class="col-sm-4 col-sm-push-8">رقم الحساب:</label>
                                        <div class="col-sm-8 col-sm-pull-4">
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
                                <div class="row" id="amount">
                                  <label class="col-sm-4 col-sm-push-8">مبلغ الايداع:</label>
                                    <div class="col-sm-8 col-sm-pull-4">
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
                                      <label class="col-sm-4 col-sm-push-8">العملة:</label>
                                        <div class="col-sm-8 col-sm-pull-4">

                                            <div class="controls">
                                                <select class="form-control" name="currency" id="currency"   >
                                                    <option value="1" selected>دولار امريكى</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                <br />
                                <div class="row" id="amount">
                                  <label class="col-sm-4 col-sm-push-8">العنوان:</label>
                                    <div class="col-sm-8 col-sm-pull-4">
                                      <div class="controls form-control" id="contentaddress" >
                                          <input onkeyup="validAddress()" id="address" type="text"  name="address"     />
                                          <i class="fa fa-check-circle" aria-hidden="true"></i>
                                          <i class="fa fa-times-circle" aria-hidden="true"></i>
                                          <p style="color:red;" id="validAddress" ></p>
                                      </div>
                                    </div>
                                </div>


                                  <br />
                                  <div class="row" id="amount">
                                    <label class="col-sm-4 col-sm-push-8">الدولة:</label>
                                      <div class="col-sm-8 col-sm-pull-4">
                                        <div class="controls form-control" id="contentcountry">
                                            <input onkeyup="validCountry()" type="text" name="country" id="country"   />
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                            <p style="color:red;" id="validCountry" ></p>
                                        </div>
                                      </div>
                                  </div>




                                    <br />
                                    <div class="row" id="amount">
                                      <label class="col-sm-4 col-sm-push-8">المدينة:</label>
                                        <div class="col-sm-8 col-sm-pull-4">
                                          <div class="controls form-control" id="contentcity">
                                              <input onkeyup="validCity()" type="text" name="city" id="city"    />
                                              <i class="fa fa-check-circle" aria-hidden="true"></i>
                                              <i class="fa fa-times-circle" aria-hidden="true"></i>
                                              <p style="color:red;" id="validCity" ></p>
                                          </div>
                                        </div>
                                    </div>




                                <br />
                                <p id="alarmMsg">*من فضلك اطبع الفاتورة لكى تحصل على تفاصيل الايداع البنكى ولكى تكمل عملية الايداع</p>




                                <br />
                                <div class="row">
                                    <label class="col-sm-4"></label>
                                    <div class="col-sm-8 col-sm-pull-4">
                                        <div class="controls">
                                             <input disabled class="btn btn-success form-control" type="submit" id="submit" value=" طلب تفاصيل الايداع و الفاتورة"  />

                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}



                              </div>




                            </div>

      			      <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">أغلاق</button>

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
                            <h4 class="modal-title">الفواتير الحالية</h4>
                          </div>
                          <div class="modal-body">

                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>رقم الحساب</th>
                                  <th>المبلغ</th>
                                  <th>التاريخ</th>
                                  <th>الفاتورة</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?PHP foreach($invoices as $invoice){ ?>
                                <tr>
                                  <td>{{$invoice->account_number}}</td>
                                  <td>{{$invoice->amount}}</td>
                                  <td> {{ substr($invoice->created_at,0,10)}}</td>
                                  <td><a class="btn btn-success" target="_blank" href="/assets/invoices/{{$invoice->filename}}.pdf">عرض الفاتورة</a></td>
                                </tr>
                                <?PHP   } ?>

                              </tbody>
                            </table>

                              </div>
                              <div class="modal-footer">
                                <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">اغلاق</button>
                              </div>
                            </div>

                      </div>
                    </div>


                <?PHP   } ?>




		</div>









		<div class="col-md-3 col-sm-4 col-xs-6 text-center"  style="">
			<img loading="lazy" src="/assets/cpanel/img/epay.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>ايباى</h3>
			<a href="/ar/cpanel/deposit-fund/epay" class="btn btn-success form-control">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-epay" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-epay" class="modal fade" role="dialog">
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



    <div class="col-md-3 col-sm-4 col-xs-6 text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/fasapay.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>fasapay</h3>
			<a href="/ar/cpanel/deposit-fund/fasapay" class="btn btn-success form-control">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-fasapay" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-fasapay" class="modal fade" role="dialog">
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




    <div class="col-md-3 col-sm-4 col-xs-6 text-center"  style="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/payeer.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>Payeer</h3>
			<a href="/ar/cpanel/deposit-fund/payeer" class="btn btn-success form-control">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-payeer" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-payeer" class="modal fade" role="dialog">
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



    <div class="col-md-3 col-sm-4 col-xs-6 text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>advcash</h3>
			<a href="/ar/cpanel/deposit-fund/advcash" class="btn btn-success form-control">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-advcash" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-advcash" class="modal fade" role="dialog">
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



    <div class="col-md-3 col-sm-4 col-xs-6 text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>بيرفكت مونى</h3>
			<a href="/ar/cpanel/deposit-fund/perfect-money" class="btn btn-success form-control">ايداع</a><br />
			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-perfect-money" style="display: none;" >More Details</span>
			<!-- Modal -->
			<div id="deposit-perfect-money" class="modal fade" role="dialog">
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




		<div class="col-md-3 col-sm-4 col-xs-6 text-center"  style-="display:none;">
			<img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
			<h3>كوين بيز</h3>
			<a href="/ar/cpanel/deposit-fund/coinbase" class="btn btn-success form-control">ايداع</a><br />
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
      <h3>ويسترن يونيون</h3>
      <a href="#"  data-toggle="modal" data-target="#deposit-westernunion" class="btn btn-success form-control">ايداع</a><br />
      <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-westernunion-" style="display: none;" >More Details</span>




                    <!-- Modal -->
                    <div id="deposit-westernunion" class="modal fade" role="dialog">
                      <div class="modal-dialog  text-left">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">تفاصيل ايداع ويسترن يونيون</h4>
                          </div>
                          <div class="modal-body">

                            <p style="color:red;">* من فضلك تأكد من ان المبلغ بعملة الدولار الأمريكى</p>
                            <p>الأسم الأول: RAYANE</p>
                            <p>أسم العائلة :  BEYDOUN</p>
                            <p>الدولة : Lebanon</p>
                            <p>العملة : USD</p>



                            <p style="color:red;">* إذا قمت بالفعل بإجراء الدفع ، فقم بالمتابعة وقم بتحميل تفاصيل الدفع الخاصة بك</p>
                            <a href="/ar/cpanel/deposit-fund/westernunion" class="btn btn-default" >اكمل الدفع</a>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        </div>
                      </div>

                      </div>
                    </div>


      <!-- Modal -->
      <div id="deposit-westernunion------" class="modal fade" role="dialog">
        <div class="modal-dialog  text-left">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">تفاصيل ايداع ويسترن يونيون</h4>
            </div>
            <div class="modal-body">
              <p>تواصل معنا   على finance@jmibrokers.com لتحصل على تفاصيل الدفع عبر ويسترن يونيون </p>
              <p id="request-details-success" style="display:none;color:green;"></p>
              <p id="request-details-error" style="display:none;color:red;"></p>

              <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('westernunion')">طلب التفاصيل الأن</button>

                </div>
                <div class="modal-footer">
                  <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">اغلاق</button>
                </div>
              </div>


        </div>
      </div>
    </div>



        <div class="col-md-3 col-sm-4 col-xs-6  text-center" >
          <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="CoinBase"  class="max-width-100" style="height: 155px;" />
          <h3>مونى جرام</h3>
          <a href="#"  data-toggle="modal" data-target="#deposit-moneygram" class="btn btn-success form-control">ايداع</a><br />
          <span class="cursor-pointer" data-toggle="modal" data-target="#deposit-moneygram-" style="display: none;" >More Details</span>




                        <!-- Modal -->
                        <div id="deposit-moneygram" class="modal fade" role="dialog" >
                          <div class="modal-dialog  text-right">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الايداع من خلال مونى جرام</h4>
                              </div>
                              <div class="modal-body">

                                <p style="color:red;">* من فضلك تأكد من ان المبلغ بعملة الدولار الأمريكى</p>

                                <p>الأسم الأول : VIVIANA</p>
                                <p>ألأسم الأخير :  SALINAS RUIZ</p>
                                <p>الدولة : بانما</p>
                                <p>العملة : الدولار الأمريكى</p>





                            <p style="color:red;">* إذا قمت بالفعل بإجراء الدفع ، فقم بالمتابعة وقم بتحميل تفاصيل الدفع الخاصة بك</p>
                            <a href="/ar/cpanel/deposit-fund/moneygram" class="btn btn-default" >اكمل الدفع</a>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
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
                  <h4 class="modal-title">تفاصيل أيداع مونى جرام</h4>
                </div>
                <div class="modal-body">
                  <p>تواصل معنا   على finance@jmibrokers.com لتحصل على تفاصيل الدفع عبر  مونى جرام </p>

                  <p id="request-details-success" style="display:none;color:green;"></p>
                  <p id="request-details-error" style="display:none;color:red;"></p>

                  <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('moneygram')">طلب التفاصيل الأن</button>

                    </div>
                    <div class="modal-footer">
                      <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">اغلاق</button>
                    </div>
                  </div>

            </div>
          </div>
        </div>






        		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
        			<img loading="lazy" src="/assets/cpanel/img/neteller.png" alt="Neteller"  class="max-width-100" />
        			<h3>النتلر</h3>
        			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-neteller">ايداع</a><br />
        			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >فاصيل</span>
        			<!-- Modal -->
        			<div id="deposit-neteller" class="modal fade" role="dialog">
        			  <div class="modal-dialog  text-left">

        			    <!-- Modal content-->
        			    <div class="modal-content">
        			      <div class="modal-header">
        			        <button type="button" class="close" data-dismiss="modal">&times;</button>
        			        <h4 class="modal-title">تفاصيل الايداع</h4>
        			      </div>
        			      <div class="modal-body">
                      <div class="modal-body">
                        <p>تواصل معنا   على finance@jmibrokers.com لتحصل على تفاصيل الدفع عبر  النتلر</p>
                        <p id="request-details-success" style="display:none;color:green;"></p>
                        <p id="request-details-error" style="display:none;color:red;"></p>

                        <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('neteller')">طلب التفاصيل الأن</button>

                          </div>
                          <div class="modal-footer">
                            <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">اغلاق</button>
                          </div>
                        </div>

        			  </div>
        			</div>
            </div>
          </div>



            		<div class="col-md-3 col-sm-4 col-xs-6  text-center" style="display:none;">
            			<img loading="lazy" src="/assets/cpanel/img/skrill.png" alt="Neteller"  class="max-width-100" />
            			<h3>سكريل</h3>
            			<a href="#" class="btn btn-success form-control" data-toggle="modal" data-target="#deposit-skrill">ايداع</a><br />
            			<span class="cursor-pointer" data-toggle="modal" data-target="#deposit-neteller" style="display:none;" >فاصيل</span>
            			<!-- Modal -->
            			<div id="deposit-skrill" class="modal fade" role="dialog">
            			  <div class="modal-dialog  text-left">

            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title">تفاصيل الايداع</h4>
            			      </div>
            			      <div class="modal-body">
                          <p>تواصل معنا   على finance@jmibrokers.com لتحصل على تفاصيل الدفع عبر  الاسكريل</p>
                          <p id="request-details-success" style="display:none;color:green;"></p>
                          <p id="request-details-error" style="display:none;color:red;"></p>

                          <button type="button" id="submit-request-details" class="btn btn-default" onclick="PaymentDetails('skrill')">طلب التفاصيل الأن</button>

                            </div>
                            <div class="modal-footer">
                              <button type="button" id="close-request-details" class="btn btn-success" data-dismiss="modal" style="display:none;">اغلاق</button>
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

              $("#deposit-"+payment+" "+"#request-details-success").text("تم ارسال التفاصيل بنجاح الى بريدك الالكترونى");
              $("#deposit-"+payment+" "+"#request-details-success").show();
              $("#deposit-"+payment+" "+"#request-details-error").hide();
              $("#deposit-"+payment+" "+"#submit-request-details").hide();
              $("#deposit-"+payment+" "+"#close-request-details").show();

            }else if(result=='false'){
              $("#deposit-"+payment+" "+"#request-details-error").text("خطأ, حاول مرة أخرى");
              $("#deposit-"+payment+" "+"#request-details-error").show();
            }
        },
          error:function(result){
            $("#deposit-"+payment+" "+"#request-details-error").text("خطأ, حاول مرة أخرى");
            $("#deposit-"+payment+" "+"#request-details-error-btn").show();
        }
    });

    }


          $("form#request-invoice").submit(function(e) {
            payment='bankwire';
              e.preventDefault(); // avoid to execute the actual submit of the form.

               $("form#request-invoice #submit").val("جارى الارسال...");
               $("form#request-invoice #submit").prop('disabled', true);


              var form = $(this);
              var url = form.attr('action');

              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(), // serializes the form's elements.
                     success:function(result){
                         if(result=='true'){

                           $("#deposit-"+payment+" "+"#request-details-success").text("نسخة من الفاتورة تم ارسالها بنجاح الى البريد الالكترونى من فضلك قدم هذه الفاتورة الى البنك الخاص بك لتسهيل عملية الايداع");
                           $("#deposit-"+payment+" "+"#request-details-success").show();
                           $("#deposit-"+payment+" "+"#request-details-error").hide();
                           $("#deposit-"+payment+" "+"#submit-request-details").hide();
                           $("#deposit-"+payment+" "+"#close-request-details").show();
                           $("form#request-invoice").hide();
                         }else if(result=='false'){
                           $("#deposit-"+payment+" "+"#request-details-error").text("خطأ, حاول مرة أخرى");
                           $("#deposit-"+payment+" "+"#request-details-error").show();

                         }
                     },
                       error:function(result){
                         $("#deposit-"+payment+" "+"#request-details-error").text("خطأ, حاول مرة أخرى");
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
    <script>
      var fullNameDisable , amountDisable , cityDisable , addressDisable , countryDisable;
      $('.form-control input').blur(function()
      {
          if( !$(this).val() ) {
                $(this).siblings('.fa-times-circle').show();
                $(this).parents(".form-control").css('borderColor' , "#ff5350");
                $(this).siblings('p').text("*مطلوب..");
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
            text = "*مطلوب.";
            fullNameDisable=false;
            document.getElementById("contentfullname").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentfullname').show();
          }
          else if (!regex.test(fullname))
          {
            text = "*مسموح فقط بالحروف الإنجليزية. ";
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
            text = "*مطلوب.";
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
            text = "*مطلوب.";
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
            text = "*مطلوب.";
            cityDisable=false;
            document.getElementById("contentcity").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentcity').show();
          }
          else if (!regex.test(city))
          {
            text = "*مسموح فقط بالحروف الإنجليزية. ";
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
            text = "*مطلوب.";
            countryDisable=false;
            document.getElementById("contentcountry").style.borderColor = "#ff5350";
            $('.fa-times-circle','#contentcountry').show();
          }
          else if (!regex.test(country))
          {
            text = "*مسموح فقط بالحروف الإنجليزية. ";
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
