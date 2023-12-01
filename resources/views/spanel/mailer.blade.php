@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>Mailer Center</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1"> Mail List</h4>
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
    

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">New Mail</h3>
    </div>

    <div class="box-body">
        {!! Form::open() !!}
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">


        <label>Title </label>
        <select class="form-control" name="title">
            <option value="0">Mr</option>
            <option value="1">Mrs</option>
            <option value="2">Miss</option>
        </select>

        <label>Email</label>
        <input type="email" class="form-control" name="mail" placeholder="Enter Email">


    </div>

    <div class="box-footer">
        <input type="submit" value="Add" class="btn btn-primary" />
        <input type="reset" value="Clear" class="btn btn-default" />
    </div>
    {!! Form::close() !!}
</div>

@if(count($mails)>0)

        <hr />
            <div class="">

                <br />
                <div class="row">          
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5"><a class="btn btn-success" href="/en/spanel/mailer/exportall">Export All</a></td>
                                <td colspan="2">
                                    {!! Form::open(['url'=>'en/spanel/mailer/','id'=>'DeleteSelected','method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" id="submitdeleteselected" type="submit" disabled="">Delete Selected</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <tr>
                                <td id="allcheckboxtd"><input type="checkbox" name="allcheckbox" id="allcheckbox"></td>
                                <td>#</td>
                                <td>Mail</td>
                                <td>Title</td>
                                <td>Name</td>
                                <td>Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP  $i=1;$titlearr=['Mr','Mrs','Miss']; ?>
                                @foreach($mails as $mail)
                                
                                    <tr>
                                        <td><input type='checkbox' class='checkbox' name='maillist[]' mailid='{!! $mail->id !!}' value='{!! $mail->id !!}'></td>

                                        <td>{!! $i !!}</td>
                                        <td>{!! $mail->mail !!}</td>
                                        <td>{!! $titlearr[$mail->title] !!}</td>
                                        <td>{!! $mail->name !!}</td>
                                        <td>
                                        {!! Form::open(['url'=>'en/spanel/mailer/'.$mail->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
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


    </div>
</div>
<script type="text/javascript">
    
function confirmDelete() {
var result = confirm("Are you sure you want to delete this Mail from Mail list, You can't undo this?");

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
    
   $('#DeleteSelected').attr('action', '/en/spanel/mailer/'+Arr);

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
    
   $('#DeleteSelected').attr('action', '/en/spanel/mailer/'+Arr);

   if(Arr.length>0){
    $('button#submitdeleteselected').removeAttr('disabled');
   }else{
    $('button#submitdeleteselected').attr('disabled','disabled');

   }



    });
</script>


@stop