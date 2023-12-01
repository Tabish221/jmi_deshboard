@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>Mail Center</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1">Sending Mails</h4>
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


    <div class="box-body">
        {!! Form::open() !!}
        <div class="row">
            <div class="col-sm-3">
                <label>Select Mails</label>
                <select class="form-control" name="sendto" >
                    <option value="1">All Mails (<?PHP echo count($mails); ?> Mail)</option>
                    <option value="2">Select Mails</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Every(Seconds)</label>
                <input type="number" class="form-control" name="sendevery" value="3" placeholder="Send Every (seconds)" required/>
            </div>
            <div class="col-sm-3">
                <label>Send To</label>
                <input type="number" class="form-control" name="sendtoevery" value="10" placeholder="Send To xx Every" required/>
            </div>
            <div class="col-sm-3">
                <label>Mail Type</label>
                <select class="form-control" name="mailtype" >
                    <option value="0">Offer</option>
                    <option value="1">Technical Analysis</option>
                    <option value="2">Fundamental Analysis</option>
                    <option value="3">event</option>
                    <option value="4">news</option>
                </select>
            </div>
        </div>
        <br />
        <textarea name="maildetails" class="tinymce"></textarea><br />
        <input type="submit" style="max-width:250px;margin:0 auto;" class="form-control btn-success" name="send" value="Send" />
</div>

@if(count($mails)>0)

        <hr />
            <div class="">

                <br />
                <div class="row">          
                    <table class="table table-bordered maillist">
                        <thead>
                            <tr>
                                <td id="allcheckboxtd"><input type="checkbox" name="allcheckbox" id="allcheckbox"></td>
                                <td>#</td>
                                <td>Mail</td>
                                <td>Title</td>
                                <td>Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP  $i=1;$titlearr=['Mr','Mrs','Miss']; ?>
                                @foreach($mails as $mail)
                                
                                    <tr>
                                        <td><input type='checkbox' class='checkbox' name='maillist[]' mailid='{!! $mail->id !!}' value='{!! $mail->mail !!}'></td>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $mail->mail !!}</td>
                                        <td>{!! $titlearr[$mail->title] !!}</td>
                                        <td>{!! $mail->name !!}</td>

                                    </tr>
                                    <?PHP $i++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

                <br />

@endif
</div>
    {!! Form::close() !!}


    </div>
</div>
<script type="text/javascript">
    
    $('table.maillist').hide();
     $('select[name="sendto"]').change(function() {
        var sendto = $('select[name="sendto"]').val();
        if(sendto == 2){$('table.maillist').show();}else{$('table.maillist').hide();}
      });



// checkbox select all or deselect
      $("td#allcheckboxtd input#allcheckbox").click(function() {
        $("tbody tr td .checkbox").prop('checked', $('td#allcheckboxtd input#allcheckbox').prop("checked"));
        
    });
</script>


@stop