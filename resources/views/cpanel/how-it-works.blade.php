@extends('cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>
                                    
            <div class="panel-body">
            
              <!--start content -->

<img loading="lazy" src="/assets/img/copy_trade_1.png" alt="Copy Trade">


	<h4>What's "Copy trade system"?</h4>
	<p>Copy trade system is designed to help you to copy FX orders from specific trade account (Sender) to your accounts (Receiver).</p>

	<p>Here's how you can use copy tade system:</p>
	<ul>
		<li>1. Add your Receiver Account that will reciver orders from the sender.</li>
		<li>2. Choose sender that you will copy orders from him or you can all your own sender.</li>
		<li>3. Make the following relation between sender and Receiver with your own options.</li>
	</ul>


<p>Important Notes:</p>
	<ul>


		<li>Follow type "Same Copy" means you will copy the same orders from the sender, if he buy you will buy if he sell you will sell.</li>
		<li>Follow type "Reverse Copy" means you will copy reverse orders from the sender, if he buy you will sell if he sell you will buy.</li>


		<li>Volume type "Fixed Volume" meanas you will copy the orders from the sender with fixed volume that won't change, for example of you choose it fixed volume and then put the value 0.1 so you will copy the orders with volume 0.1 always and it doesn't matter the sender volume.</li>
		<li>Volume type "Fixed Volume" meanas you will copy the orders from the sender with fixed volume that won't change, for example of you choose it fixed volume and then put the value 0.1 so you will copy the orders with volume 0.1 always and it doesn't matter the sender order volume.</li>
		<li>Volume type "Percentage Volume" meanas you will copy the orders from the sender with percentage volume of his order volume, for example if you choose it percentage volume and then put the value 10% so if the sender take order with volume 1 so your order's volume will be 0.1 " 1*10/100=0.1 ".</li>
		<li>The minimum order value is 0.01 for the percentage value so if the sender take order with volume 0.01 and your relation value is 10% so your order value will be the same value of the sender order 0.01 because you can't make order with value 0.001 (10*0.01/100=0.001).</li>



		<li>If you change the password of the Receiver the relation will stop unless your update the password again  so you will lose any new orders or updated orders from the sender during this issue.</li>
		<li>If your balance isn't enough for one order the relation will stop unless your fund it again and update the status so you will lose any new orders or updated orders from the sender during this issue, so you have to choose the suitable volume value for your balance.</li>
		<li>If you delete the relation you have to close the open orders by your own to avoid massive loss.</li>


	</ul>





    </div>

</div>


            <!--End content-->
            </div>
        </div>

    </div>

@stop