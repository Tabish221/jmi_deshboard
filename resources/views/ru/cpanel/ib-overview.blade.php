@extends('ru.cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>
                                    
            <div class="panel-body">
            
        <!--start content -->

@if(count($ib_accounts)<1)
<h3>У вас нет счетов IB</h3>
@else


<h4> Что такое "Моя реферальная ссылка"? </h4>
<p> Моя реферальная ссылка - это уникальная ссылка, генерируемая нашей системой, которая определяет, кто вы. Таким образом, мы можем дать вам кредит, когда ваш друг или коллега станет постоянным клиентом. </P>

<p> Вот как вы можете использовать уникальную реферальную ссылку: </p>
<ul>
<li> Скопируйте и отправьте ссылку в обычном личном письме. </li>
<li> Включите ссылку в свою подпись электронной почты. </li>
<li> Разместите ссылку на своем сайте для посетителей своего сайта. </li>
</ul>

	<p>Независимо от того, как вы делитесь, убедитесь, что ваш друг нажал на вашу конкретную ссылку, чтобы мы могли убедиться, что вы получите кредит. Если они станут постоянными клиентами, вы оба получите кредиты!</p>


<input class="form-control" id="MyRef" value="https://www.jmibrokers.com/ru/signup?myref={{$user->id+10000}}" style="background:#ddd;" /><br />
<button onclick="CopyText()" class="btn btn-success">Скопировать текст</button>

<script type="text/javascript">
	function CopyText()
	{
	$('input#MyRef').val('https://www.jmibrokers.com/ru/signup?myref={{$user->id+10000}}');
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