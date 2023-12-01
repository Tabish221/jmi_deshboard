@extends('epanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>All Search Values</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1"> Search List</h4>
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
        <h3 class="box-title">New Search</h3>
    </div>

    <div class="box-body">
        {!! Form::open() !!}
        <label>URL</label>
        <input type="text" class="form-control" name="url" placeholder="Enter Search URL">
        <label>AR Title</label>
        <input type="text" class="form-control" name="ar_title" placeholder="Enter Arabic Search Value">
        <label>EN Title</label>
        <input type="text" class="form-control" name="en_title" placeholder="Enter English Search Value">


    </div>

    <div class="box-footer">
        <input type="submit" value="Add" class="btn btn-primary" />
        <input type="reset" value="Clear" class="btn btn-default" />
    </div>
    {!! Form::close() !!}
</div>

@if(count($all_search)>0)

        <hr />
            <div class="">

                <br />
                <div class="row">          
                    <table class="table table-bordered">
                        <thead>
                            <tr><td colspan="7">
                                    {!! Form::open(['url'=>'en/epanel/all-search/','id'=>'DeleteSelected','method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" id="submitdeleteselected" type="submit" disabled="">Delete Selected</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <tr>
                                <td id="allcheckboxtd"><input type="checkbox" name="allcheckbox" id="allcheckbox"></td>
                                <td>#</td>
                                <td>URL</td>
                                <td>AR Title</td>
                                <td>EN Title</td>
                                <td>Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP  $i=1; ?>
                                @foreach($all_search as $search)
                                
                                    <tr>
                                        <td><input type='checkbox' class='checkbox' name='searchlist[]' mailid='{!! $search->id !!}' value='{!! $search->id !!}'></td>

                                        <td>{!! $i !!}</td>
                                        <td>{!! $search->url !!}</td>
                                        <td>{!! $search->ar_title !!}</td>
                                        <td>{!! $search->en_title !!}</td>
                                        <td>
                                        {!! Form::open(['url'=>'en/epanel/all-search/'.$search->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
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
var result = confirm("Are you sure you want to delete this Search from Search list, You can't undo this?");

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
    
   $('#DeleteSelected').attr('action', '/en/epanel/all-search/'+Arr);

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
    
   $('#DeleteSelected').attr('action', '/en/epanel/all-search/'+Arr);

   if(Arr.length>0){
    $('button#submitdeleteselected').removeAttr('disabled');
   }else{
    $('button#submitdeleteselected').attr('disabled','disabled');

   }



    });
</script>


@stop