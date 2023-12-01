@extends('cpanel.layout')
@section('content')


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->


                <div class="ad_types_table">

                    <div class="widthcolumn">

                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="height: 123px;">
                                        <h4>Package Details</h4><br />
                                        <p class="job_cost bold"></p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><p>SPREAD </p></td>
                                </tr>
                                <tr>
                                    <td><p>LEVERAGE</p></td>
                                </tr>
                                <tr>
                                    <td><p>MINIMUM DEPOSIT</p></td>
                                </tr>
                                <tr>
                                    <td><p>COMMISSION</p></td>
                                </tr>
                                <tr>
                                    <td><p>Deposit Currencies</p></td>
                                </tr>
                                <tr>
                                    <td><p>Islamic (Swap-free)</p></td>
                                </tr>
                                <tr>
                                    <td><p>MINIMUM LOT</p></td>
                                </tr>
                                <tr>
                                    <td><p>Expert Advisors (EAs)</p></td>
                                </tr>
                                <tr>
                                    <td><p>Scalping</p></td>
                                </tr>

                                <tr>
                                    <td><p>Hedging</p></td>
                                </tr>

                                <tr>
                                    <td><p>Digit</p></td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><p></p></td>
                                </tr>
                                </tfoot>
                            </table>

                    </div>




                        <div class="widthcolumn">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="height: 123px;">
                                      <h4>Variable Spread Account</h4><br />
                                        <p class="job_cost bold"></p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Start From 2.6</td>
                                </tr>

                               <tr>
                                    <td>1:200</td>
                                </tr>
                                <tr>
                                    <td>$1000</td>
                                </tr>

                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>0.01 Lot</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <a href="/en/cpanel/open-account?t=1&g=5"  class="btn btn-success">Request Now</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>


                        <div class="widthcolumn" style="">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="height: 123px;">
                                      <h4>Fixed Spread Account</h4><br />
                                        <p class="job_cost bold"></p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1 PIP Fixed</td>
                                </tr>

                               <tr>
                                    <td>1:500</td>
                                </tr>
                                <tr>
                                    <td>$100</td>
                                </tr>


                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>0.01 Lot</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <a href="/en/cpanel/open-account?t=2&g=3"  class="btn btn-success">Request Now</a>
									</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>


                        <div class="widthcolumn" style="">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="height: 123px;">
                                      <h4>Scalping Account</h4><br />
                                        <p class="job_cost bold"></p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2 PIP Fixed</td>
                                </tr>

                                <tr>
                                    <td>1:500</td>
                                </tr>
                                <tr>
                                    <td>$100</td>
                                </tr>


                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>0.01 Lot</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <a href="/en/cpanel/open-account?t=2&g=4"  class="btn btn-success">Request Now</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>



                        <div class="widthcolumn" id="premium-pack" >
                            <div class="breakout_table-">




                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="height: 123px;">
                                        <span class="most_popular">MOST POPULAR</span>
                                        <h4>Bonus Account</h4><br />
                                        <p class="job_cost bold"></p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>As Low As 0.2</td>
                                </tr>

                               <tr>
                                    <td>1:200</td>
                                </tr>
                                <tr>
                                    <td>$100</td>
                                </tr>

                                <tr>
                                    <td><span class="fa fa-close error" ></span></td>
                                </tr>
                                <tr>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td>0.01 Lot</td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-close error"></span></td>
                                </tr>
                                <tr>
                                    <td><span class="fa fa-check blue"></span></td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <a href="/en/cpanel/open-account?t=2&g=1"  class="btn btn-success">Request Now</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            </div>
                        </div>



                    <div id="ad_packs"></div>
                </div>


    </div>

</div>



<style>
.ad_types_table {
    width: 100%;
    margin-bottom: 55px;
    border-: 1px solid #d6d6d6;
    border-radius: 4px;
	border-bottom: none;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
}

.ad_types_table th {
    padding-: 10px 0px;
    border-bottom: 1px solid #d6d6d6;
}
.ad_types_table table:hover  th,.ad_types_table table:hover  td{background:#0059b2  !important;} .ad_types_table th, .ad_types_table td {background:#eee;
    width: 25%;
}
.ad_types_table td > p {
    height: 30px;
    min-height: 30px;
    display: table-cell;
    vertical-align: middle;
    text-align: left;
}
.breakout_table {
    top: -26px;
    left-: -11px;
    width-: 105%;
    z-index: 99;
    background: #fff;
    position: absolute;
    box-shadow: 5px 10px 20px 5px rgba(0,0,0,0.25);
}
.most_popular {
    color: #fff;
    margin: 5px 0;
    font-size: 13px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 2px;
    background: #333;
    display: inline-block;
    text-transform: uppercase;
}
.ad_types_table tbody tr {
    background-color: #eee;color:#0059b2;
}
.ad_types_table td {
    height: 60px;
    padding: 5px;
}
.ad_types_table .widthcolumn {
  padding: 0;
  border: 1px solid #d6d6d6;
  width: 151px;
  display: inline-block;
  margin: 0px;
}
.ad_types_table th h4 {
    font-weight: 700;
    color: #0059b2;
}
.ad_types_table .blue{color:#0059b2;}
.ad_types_table .error{color:#0059b2;padding: 4px 5px;}
 .ad_types_table .fa{border: 1px solid #0059b2;
    border-radius: 50%;
    padding: 4px;
    margin-right: 10px;background:#fff;}
 .ad_types_table .error{border: 1px solid #0059b2;}
	tfoot {
    display: table-footer-group;
    vertical-align: middle;
    border-: 1px solid #d6d6d6;
}
.ad_types_table th .job_cost {
    font-size: 30px;
    line-height: 35px;
	text-align:center;
}
.ad_types_table tbody tr:nth-child(9), .ad_types_table tbody tr:nth-child(11) , .ad_types_table tbody tr:nth-child(13) {
    height: 85px;
}

tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
td, th {
    display: table-cell;
    vertical-align: middle;text-align:center;
}
.ad_types_table tr:last-child td{text-align:center;}
@media only screen and (max-width: 768px)
{
#premium-pack
{
    margin-top: 35px;
margin-bottom: 20px;
}
}
@media only screen and (max-width: 300px)
{
#premium-pack
{
    margin-top: 50px;
margin-bottom: 160px;
}
}
</style>

<script>

$(document).ready(function(){


  var tr_th_height = $(".ad_types_table table tr th").map(function (){return $(this).height();}).get();
  tr_th_height_max = Math.max.apply(null, tr_th_height);


        $(".ad_types_table table tr th").css("height",tr_th_height_max);

});

    </script>


       <!--End content-->
            </div>
        </div>

    </div>


@stop
