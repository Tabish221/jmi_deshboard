<?
@extends('master')
@section('content')
<meta name="robots" content="index">


				<div class="row gray_bg">
					<img src="{{ URL::to('/assets/img/commoditiescover.jpg')}}" alt="" class="img-responsive center-block picHeight" />
			</div>

		<!-------------------------------------- Start Collapse ------------------------------------------------------------------->

        <h1 class="cfdHeader"> CFD Commodities </h1>
				<ul class="nav nav-tabs" style="margin-bottom: 30px; margin-left:20px;">
						<li class="active"><a data-toggle="tab" href="#menu1" >CFDs/Energy</a></li>
						<li><a data-toggle="tab" href="#menu2" >CFDs Commodity</a></li>
						<li style="display:none;"><a data-toggle="tab" href="#menu3" >CFD Commodity</a></li>
				</ul>

				<div class="tab-content">
						<div id="menu1" class="tab-pane fade in active">
								<iframe src="/en/datatable1"></iframe>
						</div>
						<div id="menu2" class="tab-pane fade">
								<iframe src="/en/datatable2"></iframe>
						</div>

				</div>
      <!-- <div id="collapses">
            <div class="collapseContainer">
                <button type="button" class="collapsibleBtn">CFDs/Energy </button>
                <div class="contentClps">
                    <p class="ParaCollapse"> *The Company’s default margin requirements (below), which may be adjusted subject to the underlined market conditions. Notifications of any such adjustments will be sent via the MT4 platform.</p>
                    <iframe src="/en/datatable1" style=" width: 100%; height: 500px;"></iframe>
                </div>
            </div>
            <div class="collapseContainer">
                <button type="button" class="collapsibleBtn">CFD Commodity </button>
                <div class="contentClps">
                    <p class="ParaCollapse"> *The Company’s default margin requirements (below), which may be adjusted subject to the underlined market conditions. Notifications of any such adjustments will be sent via the MT4 platform.</p>
                    <iframe src="/en/datatable2" style=" width: 100%; height: 500px;"></iframe>

                </div>
            </div>


        </div>-->
<a class="read cfdHeader" href="/en/stocks2">Read more ...</a>

        <!------------------------------------------------------ End Collapse------------------------------------------------------->

@endsection
