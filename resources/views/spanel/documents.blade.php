@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>All Uploaded Documents</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1">Users Documents</h4>
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











@if(count($documents)>0)

        <hr />
            <div class="col-sm-12">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Email</td>
                                <td>File Type</td>
                                <td>File</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Created AT</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$types=['National Identity Card','Passport','Driver License','Bank account statement','Credit Card Statement','Phone Bill','Electricity bill','Credit Card Scan','Customer Account Agreement'];$status=['Reviewing','Approved']; ?>
                                @foreach($documents as $document)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>
                                        @foreach($website_accounts as $account)
                                            @if($account->id == $document->website_accounts_id)
                                                {!! $account->email !!}
                                            @endif
                                        @endforeach
                                        </td>
                                        <td>{!! $types[$document->type] !!}</td>
                                        <td><a href=" {{Storage::disk('do')->url($document->document)}}" class="btn btn-success" target="__blank" >View Document</a></td>
                                        <td>{!! $document->description !!}</td>
                                        <td class="@if($document->status==0) text-danger @endif @if($document->status==1) text-success @endif">{!! $status[$document->status] !!}</td>
                                        <td>{!! $document->created_at !!}</td>
                                        <td>
                                        {!! Form::open(['url'=>'en/spanel/documents/'.$document->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}

                                        @if($document->status==0)
                                        {!! Form::open(['url'=>'en/spanel/documents/'.$document->id,'method'=>'patch','onsubmit' => 'return confirmApprove()']) !!}
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
                        {{ $documents->links() }}

                </div>

                <br />

@endif
</div>


    </div>
</div>
<script type="text/javascript">

function confirmDelete() {
var result = confirm("Are you sure you want to delete this document, You can't undo this?");

if (result) {
        return true;
    } else {
        return false;
    }
}
function confirmApprove() {
var result = confirm("Did you reviewed this document and want to approve it");

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
