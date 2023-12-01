@extends('ar.cpanel.layout')
@section('content')

   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>
                                    
            <div class="panel-body">

@if(count($ib_accounts)<1)
<h3>ليس لديك اى حسابات IBs</h3>
@else


	<h4>ماذا يكون رابط الاحالة ?</h4>
	<p>رابط الاحالة الخاص بى هو رابط فريد يتم عمله اليا من خلال نظامنا . من خلال هذا يمكننا ان نعرف اللذين أتوا من خلالك ونكافئك عليهم </p>


	<p>كيف يمكن أستخدام رابط الأحاله:</p>
	<ul>
		<li>أنسخ الرابط وأرسله الى أصدقائك.</li>
		<li>ضع الرابط فى توقيع بريدك الألكترونى.</li>
		<li>ضع الرابط فى موقعك الألكترونى من أجل زوارك.</li>
	</ul>

	<p>ليس المهم كيفية نشر الرابط بل تأكد من تسجيل أصدقائك من خلال الرابط وتأكد من انك حصلت عليهم لكى تتم مكافئتك</p>




<input class="form-control" id="MyRef" value="https://www.jmibrokers.com/ar/signup?myref={{$user->id+10000}}" style="background:#ddd;" /><br />
<button onclick="CopyText()" class="btn btn-success">نسخ الرابط </button>

<script type="text/javascript">
	function CopyText()
	{
	$('input#MyRef').val('https://www.jmibrokers.com/ar/signup?myref={{$user->id+10000}}');
	var copyText = document.getElementById("MyRef");
  	copyText.select();
  	document.execCommand("Copy");
	}

</script>





@endif


    </div>

</div>





       
            <!--End content-->
            </div>
        </div>

    </div>



@stop