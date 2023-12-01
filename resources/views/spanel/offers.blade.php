@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>offers Analysis</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1"> All offers</h4>
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
        <h3 class="box-title">New offers</h3>
    </div>

    <div class="box-body">
        {!! Form::open(['files'=>true]) !!}


        <label>Offers Type</label>
        <select class="form-control" name="offertype">
            <option value="0">Offer</option>
            <option value="1">Event</option>
        </select>

        <label>offers Image</label>
        <input type="file" class="form-control" name="offers_image" required />


        <label>English Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Name">

        <label>English Details</label>
        <textarea name="details" class="tinymce"></textarea><br />


        <select class="form-control" name="offerstatus">
            <option value="1">Publish Now</option>
            <option value="0">Publish Later</option>
        </select>


        <label>Arabic Title</label>
        <input type="text" class="form-control" name="arabic_title" placeholder="Enter Name">

        <label>Arabic Details</label>
        <textarea name="arabic_details" class="tinymce"></textarea><br />


    </div>

    <div class="box-footer">
        <input type="submit" value="Add" class="btn btn-primary" />
        <input type="reset" value="Clear" class="btn btn-default" />
    </div>
    {!! Form::close() !!}
</div>


<div class="col-sm-3" style="margin-top: 5px;">
<select class="form-control" id="paginate" onchange="paginate();" name="paginate">
<option class="form-control" value="10" >Show 10 Per Page</option>
<option class="form-control" value="25" >Show 25 Per Page</option>
<option class="form-control" value="50" >Show 50 Per Page</option>
<option class="form-control" value="100" >Show 100 Per Page</option>
</select>

</div>
<script>
act='<?PHP if(isset($_GET['per'])){echo "per=".$_GET['per'];}else{echo "000";} ?>';
page='<?PHP if(isset($_GET['page'])){echo "page=".$_GET['page'];}else{echo "0-0-0";} ?>';
select='<?PHP if(isset($_GET['per'])){echo $_GET['per'];}else{echo 10;} ?>';

$('select#paginate option[value="'+select+'"]').attr('selected','selected');
function paginate(){
val=$('select#paginate').val();

url = document.location.href;
if(act.length>4){
url = url.replace(act, "per="+val);

}else{
url = url+"&per="+val;

}
url = url.replace(page, "page=1"); 
document.location = url;
};

</script>

        <?PHP 
        $result=array();
        foreach($posts as $new_posts){ array_push($result,$new_posts);}

    if(isset($_GET['per'])){$paginate=$_GET['per'];}else{$paginate= 10;}
    $page = Input::get('page', 1);
    
    $offSet = ($page * $paginate) - $paginate;  
    $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);  
    $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);

    
    $posts=$result;?>


@if(count($posts)>0)

        <hr />
            <div class="">

                <br />
                <div class="row">          
                    <table class="table table-bordered">
                        <thead>
                            <tr><td colspan="7">
                                    {!! Form::open(['url'=>'en/spanel/offers/','id'=>'DeleteSelected','method'=>'delete','onsubmit' => 'return confirmDelete()','files'=>true]) !!}
                                        <button class="btn btn-success" id="submitdeleteselected" type="submit" disabled="">Delete Selected</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <tr>
                                <td id="allcheckboxtd"><input type="checkbox" name="allcheckbox" id="allcheckbox"></td>
                                <td>#</td>
                                <td>Title</td>
                                <td>Status</td>
                                <td>Type</td>
                                <td>Created At</td>
                                <td>Manage</td>
                            </tr>
                        </thead>
                        <tbody>
                                <?PHP  $i=1; ?>
                                @foreach($posts as $post)
                                
                                    <tr>
                                        <td><input type='checkbox' class='checkbox' name='postlist[]' postid='{!! $post->id !!}' value='{!! $post->id !!}'></td>

                                        <td>{!! $i !!}</td>
                                        <td>{!! $post->title !!}</td>
                                        <td>@if ($post->offerstatus==1)  <span class="text-success">Published</span>  @endif @if ($post->offerstatus==0) <span class="text-danger">UNPublished</span> @endif</td>
                                        <td> <span class="text-success"> @if ($post->offerstatus==0) Offer  @endif @if ($post->offerstatus==1) Event @endif </span></td>


                                        <td>{!! $post->created_at !!}</td>
                                        <td>
                                            <a class="btn btn-success" href="/en/offers/{!! $post->id !!}" target="_blank">View</a>
                                            <a class="btn btn-success" href="/en/spanel/offers/status/{!! $post->id !!}" >@if ($post->offerstatus==1) Unpublish @endif  @if ($post->offerstatus==0) Publish  @endif</a>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{!! $post->id !!}" >Edit</button>


                                        {!! Form::open(['url'=>'en/spanel/offers/'.$post->id,'method'=>'delete','onsubmit' => 'return confirmDelete()','style'=>'display:inline;',]) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>

                                        <!-- Modal -->
                                        <div id="edit{!! $post->id !!}" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"> {!! $post->title !!}</h4>
                                              </div>
                                              <div class="modal-body">

        {!! Form::open(['url'=>'en/spanel/update-offers/'.$post->id]) !!}

         <label>Offers Type</label>
        <select class="form-control" name="offertype">
            <option value="0"  @if ($post->offertype==0) selected @endif>Offer</option>
            <option value="1"  @if ($post->offertype==1) selected @endif>Event</option>
        </select>

        <label>English Title</label>
        <input type="text" class="form-control" name="title" value="{!! $post->title !!}">

        <label>English Details</label>
        <textarea name="details" class="tinymce">{!! $post->details !!}</textarea><br />


        <select class="form-control" name="offerstatus">
            <option value="1" @if ($post->offerstatus==1) selected @endif>Publish Now</option>
            <option value="0" @if ($post->offerstatus==0) selected @endif>Publish Later</option>
        </select>

        <label>Arabic Title</label>
        <input type="text" class="form-control" name="arabic_title" value="{!! $post->arabic_title !!}">

        <label>Arabic Details</label>
        <textarea name="arabic_details" class="tinymce">{!! $post->arabic_details !!}</textarea><br />




                                              </div>
                                              <div class="modal-footer">

                                                <input type="submit" value="Update" class="btn btn-success" />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
            {!! Form::close() !!}

                                          </div>
                                        </div>

                                    <?PHP $i++; ?>
                                @endforeach
                        </tbody>
                    </table>
            <?PHP echo $result->render(); ?>
        
                </div>

                <br />

@endif
</div>


    </div>
</div>
<script type="text/javascript">
    
function confirmDelete() {
var result = confirm("Are you sure you want to delete this offers from offers list, You can't undo this?");

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
    
   $('#DeleteSelected').attr('action', '/en/spanel/offers/'+Arr);

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
    
   $('#DeleteSelected').attr('action', '/en/spanel/offers/'+Arr);

   if(Arr.length>0){
    $('button#submitdeleteselected').removeAttr('disabled');
   }else{
    $('button#submitdeleteselected').attr('disabled','disabled');

   }



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