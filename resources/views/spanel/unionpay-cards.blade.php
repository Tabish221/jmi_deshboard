@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>All UnionPay Cards</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1">Users UnionPay Cards</h4>
        <div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="col-sm-12">











@if(count($unionpay_cards)>0)

        <hr />
            <div class="col-sm-12">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Created AT</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1; ?>
                                @foreach($unionpay_cards as $unionpay_card)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>
                                        @foreach($website_accounts as $account)
                                            @if($account->id == $unionpay_card->user_id)
                                                {!! $account->email !!}
                                            @endif
                                        @endforeach
                                        </td>

                                        <td class="@if($unionpay_card->status==0) text-danger @endif @if($unionpay_card->status==1) text-success @endif">@if($unionpay_card->status==0) Pending @endif @if($unionpay_card->status==1) Produced @endif @if($unionpay_card->status==8) Canceling @endif @if($unionpay_card->status==9) cancelled @endif</td>
                                        <td>{{ $unionpay_card->created_at}}</td>
                                        <td>
                                        {!! Form::open(['url'=>'en/spanel/unionpay-card/'.$unionpay_card->id,'method'=>'delete','onsubmit' => 'return confirmDelete()', 'style'=>'display:inline-block']) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}

                                        @if($unionpay_card->status==0)
                                        {!! Form::open(['url'=>'en/spanel/unionpay-card/'.$unionpay_card->id,'method'=>'patch','onsubmit' => 'return confirmApprove()', 'style'=>'display:inline-block']) !!}
                                        <button class="btn btn-success" type="submit" >Approve</button>
                                        {!! Form::close() !!}
                                        @endif

                                        </td>
                                    </tr>
                                    <?PHP $i++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="col-sm-12">
                        {{ $unionpay_cards->links() }}

                </div>

                <br />

@endif
</div>


    </div>
</div>
<script type="text/javascript">

function confirmDelete() {
var result = confirm("Are you sure you want to delete this Unionpay Request, You can't undo this?");

if (result) {
        return true;
    } else {
        return false;
    }
}
function confirmApprove() {
var result = confirm("Did you reviewed this UnionPay Request and want to approve it");

if (result) {
        return true;
    } else {
        return false;
    }
}
</script>


<script>
act='<?PHP if(isset($_GET['per'])){echo "&per=".$_GET['per'];}else{echo "0-0-0";} ?>';
page='<?PHP if(isset($_GET['page'])){echo "&page=".$_GET['page'].'&';}else{echo "0-0-0";} ?>';

select='<?PHP if(isset($_GET['per'])){echo $_GET['per'];}else{echo 25;} ?>';

$('select#paginate option[value="'+select+'"]').attr('selected','selected');


function paginate(){
val=$('select#paginate').val();
action = '&per='+val+'&page=1&';
var url=document.location.href;
url=url.replace(act, "");
url=url.replace(page, "");
document.location = url+action;
};


</script>

                <script>
                //change pagination
                $( document ).ready(function() {
                $('ul.pagination li a').each(function(){
                    var fullurl= $(this).attr('href');
                    var result = fullurl.split('page=');
                    var page=result[1];
                        if(window.location.href.indexOf("&page") > -1) {
                    var pageaction= "<?PHP  if(isset($_GET['page'])){echo 'page='.$_GET['page'];}else{echo 'asdasdasdasd';} ?>";
                        }else if(window.location.href.indexOf("?page") > -1){
                        var pageaction= "<?PHP  if(isset($_GET['page'])){echo 'page='.$_GET['page'];}else{echo 'asdasdasdasd';} ?>";
                    }

                    currenturl=document.location.href;

                    if(pageaction == undefined || pageaction == null){
                    var currenturl = currenturl+'&page='+page;

                    }else{
                    currenturl=location.href.replace(pageaction, "page="+page);
                    }
                    $(this).attr('href',currenturl);



                });
                });
                </script>



@stop
