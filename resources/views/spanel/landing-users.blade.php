@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>All Landing Users</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1">Landing Users</h4>
        <div>

@if (session('status-success'))
    <div class="alert alert-success">
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
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="col-sm-12">


@if(count($landingusers)>0)





<?PHP
if(isset($_GET['bymobile']) && $_GET['bymobile'] !== ''){
$accounts1=array();
foreach($landingusers as $acc){
if(strpos($acc->phone ,$_GET['bymobile']) !== false){

array_push($accounts1,$acc);
}
}

}else{
$accounts1=$landingusers;
}

if(isset($_GET['bymail']) && $_GET['bymail'] !== ''){

$accounts2=array();
foreach($accounts1 as $acc){
if(strpos($acc->email ,$_GET['bymail']) !== false){
array_push($accounts2,$acc);
}}

}else{
$accounts2=$accounts1;
}

if(isset($_GET['byname']) && $_GET['byname'] !== ''){

$accounts3=array();
foreach($accounts2 as $acc){
if(strpos($acc->name,$_GET['byname']) !== false ){
array_push($accounts3,$acc);
}
if(strpos($acc->lname,$_GET['byname']) !== false ){
array_push($accounts3,$acc);
}
}

}else{
$accounts3=$accounts2;
}

$landingusers_filtered=$accounts3;

?>


        <hr />
            <div class="">




                <div class="col-sm-3" style="margin-top: 5px;">
                <select class="form-control" id="paginate" onchange="paginate();" name="paginate">
                <option class="form-control" value="5" >Show 5 Per Page</option>
                <option class="form-control" value="10" >Show 10 Per Page</option>
                <option class="form-control" value="25" >Show 25 Per Page</option>
                <option class="form-control" value="50" >Show 50 Per Page</option>
                <option class="form-control" value="100" >Show 100 Per Page</option>
                <option class="form-control" value="500" >Show 500 Per Page</option>
                </select><br />

                </div>






                <?PHP

                $result=array();
                foreach($landingusers_filtered as $website_acc){ array_push($result,$website_acc);}

                if(isset($_GET['per'])){$paginate=$_GET['per'];}else{$paginate= 10;}
                $page = Input::get('page', 1);

                $offSet = ($page * $paginate) - $paginate;
                $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);
                $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
                $landingusers_filtered=$result;
                ?>



                <div id="searchdiv">
                <div class="col-sm-3">
        <select class="form-control" id="search"  name="search">
        <option class="form-control" value="bymobile" >Search Mobile</option>
        <option class="form-control" value="byname" >Search Name</option>
        <option class="form-control" value="bymail" >Search Email</option>
        </select>
                </div>
                 <div class="col-sm-3">
        <input type="text" class="form-control" id="search"  name="search" />
                </div>
                 <div class="col-sm-3">
        <span class="btn btn-success icon-search" id="search">Search</span>
                </div>

                </div>

            <br />
                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <td colspan="5"><a class="btn btn-success" href="/en/spanel/landing-users/exportall">Export All</a></td>

                                <td colspan="7">
                                    {!! Form::open(['url'=>'en/spanel/mailer/','id'=>'DeleteSelected','method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" id="submitdeleteselected" type="submit" disabled="">Delete Selected</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            <tr>
                                <td id="allcheckboxtd"><input type="checkbox" name="allcheckbox" id="allcheckbox"></td>
                                <td>#</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Country</td>
                                <td>Mobile</td>
                                <td>Date</td>
                                <td>Landing</td>
                                <td>Cookie</td>
                                <td>Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP  $i=1; ?>
                                @foreach($landingusers_filtered as $landing)

                                    <tr>
                                        <td><input type='checkbox' class='checkbox' name='landinglist[]' landingid='{!! $landing->id !!}' value='{!! $landing->id !!}'></td>


                                        <td>{!! $i !!}</td>
                                        <td>{!! $landing->name !!} {!! $landing->lname !!}</td>
                                        <td>{!! $landing->email !!}</td>
                                        <td>{!! $landing->country !!}</td>
                                        <td>{!! $landing->code !!} {!!$landing->phone !!}</td>
                                        <td>{!! $landing->created_at !!}</td>
                                        <td>{!! $landing->landing_name !!}</td>
                                        <td>{!! $landing->cookie !!}</td>
                                        <td>
                                        {!! Form::open(['url'=>'en/spanel/landing-users/'.$landing->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    <?PHP $i++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

                <br />

@endif
</div>

                                <?PHP echo $result->render(); ?>


    </div>
</div>
<script type="text/javascript">

function confirmDelete() {
var result = confirm("Are you sure you want to delete this Landing User, You can't undo this?");

if (result) {
        return true;
    } else {
        return false;
    }
}




//select mails to delete
$('tbody tr td input.checkbox').click(function(){
    //alert(5);
    Arr=[];
    $('input.checkbox:checked:checked').each(function(){
    arr=$(this).val()
    Arr.push(arr);
    });

   $('#DeleteSelected').attr('action', '/en/spanel/landing-users/'+Arr);

   if(Arr.length>0){
    $('button#submitdeleteselected').removeAttr('disabled');
   }else{
    $('button#submitdeleteselected').attr('disabled','disabled');

   }

});


// checkbox select all or deselect
      $("td#allcheckboxtd input#allcheckbox").click(function() {
        $("tbody tr td .checkbox").prop('checked', $('td#allcheckboxtd input#allcheckbox').prop("checked"));


    Arr=[];
    $('input.checkbox:checked:checked').each(function(){
    arr=$(this).val()
    Arr.push(arr);
    });

   $('#DeleteSelected').attr('action', '/en/spanel/landing-users/'+Arr);

   if(Arr.length>0){
    $('button#submitdeleteselected').removeAttr('disabled');
   }else{
    $('button#submitdeleteselected').attr('disabled','disabled');

   }



    });




</script>




<script>
act='<?PHP if(isset($_GET['per'])){echo "&per=".$_GET['per'];}else{echo "0-0-0";} ?>';
page='<?PHP if(isset($_GET['page'])){echo "&page=".$_GET['page'].'&';}else{echo "0-0-0";} ?>';

select='<?PHP if(isset($_GET['per'])){echo $_GET['per'];}else{echo 25;} ?>';

$('select#paginate option[value="'+select+'"]').attr('selected','selected');

bymobile='<?PHP if(isset($_GET['bymobile'])){echo $_GET['bymobile'];}?>';
bymail='<?PHP if(isset($_GET['bymail'])){echo $_GET['bymail'];}?>';
byname='<?PHP if(isset($_GET['byname'])){echo $_GET['byname'];}?>';

selectby='<?PHP if(isset($_GET['bymobile'])){echo 'bymobile';}else if(isset($_GET['bymail'])){echo 'bymail';} else if(isset($_GET['byname'])){echo 'byname';}?>';

$('select#search option[value="'+selectby+'"]').attr('selected','selected');
$('input#search').val(bymobile+bymail+byname);

function paginate(){
val=$('select#paginate').val();
action = '&per='+val+'&page=1&';
var url=document.location.href;
url=url.replace(act, "");
url=url.replace(page, "");
document.location = url+action;
};

$('span#search').click(function(){
val=$('select#search').val();
search=$('input#search').val();

action = '&'+val+'='+search+'&';
var url='<?PHP echo Request::url(); ?>'+'?';
document.location = url+action;

});
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
