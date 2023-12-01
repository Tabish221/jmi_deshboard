@extends('epanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>English Slider</strong></h3>
    </div>

    <div class="box-body">
        <h4 class="col-sm-push-1"> Slider</h4>
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



<style type="text/css">
    
      .faq li { padding: 20px; }
  .faq li.q {
                background: #0059b2;
                font-weight: bold;
                font-size: 120%;
                border-bottom: 1px #ddd solid;
                cursor: pointer;
                color:#fff;
            }
  .faq li.q:hover{
                background: #006391;
            }

    .faq li.q h3{color:#fff;display:inline;}
  .faq li.a {
              background: #efefef;
              display: none;
              color:#000;
            }
            .rotate {
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
            }


</style>

<script type="text/javascript">
    


// Accordian Action
  var action = 'click';
  var speed = "500";
  $(document).ready(function(){
  // Question handler
    $('li.q').on(action, function(){
      // gets next element
      // opens .a of selected question
      $(this).next().slideToggle(speed)
      // selects all other answers and slides up any open answer
      .siblings('li.a').slideUp();
      // Grab img from clicked question
      var img = $(this).children('span');
      // remove Rotate class from all images except the active
      $('span').not(img).removeClass('rotate');
      // toggle rotate class
      img.toggleClass('rotate');
    });

  });

</script>


<div class="col-sm-12">



        <hr />
                <br />

    {!! Form::open(['files'=>true]) !!}






      <div class="item">
          <ul class="faq">   
            <li class="q" >
              <span class="fa fa-arrow-circle-right"></span>
              <h3>{{ $slide1['t'] }}</h3>
              <div style="float:right;margin-right:20px;"> 
                            <input type="radio" name="slidedisplay1" value="1" <?PHP if($slide1['slide_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="slidedisplay1" style="margin-left:10px;"  value="0"  <?PHP if($slide1['slide_display']==0){echo 'checked';} ?>  /> Hide
                         </div>
            </li>

            <li class="a" >

                  <div class="row">
                        <div class="col-sm-3">
                            <label>Image URL</label>
                            <input type="file" placeholder="Slide Image" name="slideimg1" class="form-control" />
                        </div>

                        <div class="col-sm-9">
                            <label style="display:block;">Image View</label>
                            <img src="{{ $slide1['img'] }}"  alt="Slide 1" width="100%" height="300px"  />
                        </div>

                  </div>
        <br /><br />
                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide a1</label>
                            <input type="text" placeholder="Slide a1" value="{{ $slide1['a1'] }}" name="slide1a1" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Display</label>
                            <input type="radio" name="a1display1" value="1" <?PHP if($slide1['a1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="a1display1" style="margin-left:10px;" value="0" <?PHP if($slide1['a1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">a1 Link</label>
                            <input type="url" name="a1link1" placeholder="a1 Link"  value="{{ $slide1['a1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Font size</label>
                            <input type="number" name="a1fontsize1" placeholder="a1 Font size"  value="{{ $slide1['a1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">a1 color</label>
                            <input type="color" name="a1color1"  value="{{ $slide1['a1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Background</label>
                            <input type="color" name="a1background1"  value="{{ $slide1['a1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Width</label>
                            <input type="number" name="a1width1" placeholder="a1 width"  class="form-control"  value="{{ $slide1['a1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Height</label>
                            <input type="number" name="a1height1" placeholder="a1 height"  class="form-control"  value="{{ $slide1['a1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Top</label>
                            <input type="number" name="a1top1" placeholder="a1 Top"  class="form-control"  value="{{ $slide1['a1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Left</label>
                            <input type="number" name="a1left1" placeholder="a1 Left"  class="form-control"  value="{{ $slide1['a1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="bacskground:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide t</label>
                            <input type="text" placeholder="Slide t" name="slide1t" value="{{ $slide1['t'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Display</label>
                            <input type="radio" name="tdisplay1" value="1" <?PHP if($slide1['t_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="tdisplay1" style="margin-left:10px;" value="0" <?PHP if($slide1['t_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">t Link</label>
                            <input type="url" name="tlink1" placeholder="t Link"  value="{{ $slide1['t_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Font size</label>
                            <input type="number" name="tfontsize1" placeholder="t Font size"  value="{{ $slide1['t_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">t color</label>
                            <input type="color" name="tcolor1"  value="{{ $slide1['t_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Background</label>
                            <input type="color" name="tbackground1"  value="{{ $slide1['t_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Width</label>
                            <input type="number" name="twidth1" placeholder="t width"  class="form-control"  value="{{ $slide1['t_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Height</label>
                            <input type="number" name="theight1" placeholder="t height"  class="form-control"  value="{{ $slide1['t_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Top</label>
                            <input type="number" name="ttop1" placeholder="t Top"  class="form-control"  value="{{ $slide1['t_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Left</label>
                            <input type="number" name="tleft1" placeholder="t Left"  class="form-control"  value="{{ $slide1['t_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d1</label>
                            <input type="text" placeholder="Slide d1"  name="slide1d1" value="{{ $slide1['d1'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Display</label>
                            <input type="radio" name="d1display1" value="1" <?PHP if($slide1['d1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d1display1" style="margin-left:10px;" value="0" <?PHP if($slide1['d1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d1 Link</label>
                            <input type="url" name="d1link1" placeholder="d1 Link"  value="{{ $slide1['d1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Font size</label>
                            <input type="number" name="d1fontsize1" placeholder="d1 Font size"  value="{{ $slide1['d1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d1 color</label>
                            <input type="color" name="d1color1"  value="{{ $slide1['d1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Background</label>
                            <input type="color" name="d1background1"  value="{{ $slide1['d1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Width</label>
                            <input type="number" name="d1width1" placeholder="d1 width"  class="form-control"  value="{{ $slide1['d1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Height</label>
                            <input type="number" name="d1height1" placeholder="d1 height"  class="form-control"  value="{{ $slide1['d1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Top</label>
                            <input type="number" name="d1top1" placeholder="d1 Top"  class="form-control"  value="{{ $slide1['d1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Left</label>
                            <input type="number" name="d1left1" placeholder="d1 Left"  class="form-control"  value="{{ $slide1['d1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d2</label>
                            <input type="text" placeholder="Slide d2"  name="slide1d2" value="{{ $slide1['d2'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Display</label>
                            <input type="radio" name="d2display1" value="1" <?PHP if($slide1['d2_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d2display1" style="margin-left:10px;" value="0" <?PHP if($slide1['d2_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d2 Link</label>
                            <input type="url" name="d2link1" placeholder="d2 Link"  value="{{ $slide1['d2_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Font size</label>
                            <input type="number" name="d2fontsize1" placeholder="d2 Font size"  value="{{ $slide1['d2_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d2 color</label>
                            <input type="color" name="d2color1"  value="{{ $slide1['d2_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Background</label>
                            <input type="color" name="d2background1"  value="{{ $slide1['d2_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Width</label>
                            <input type="number" name="d2width1" placeholder="d2 width"  class="form-control"  value="{{ $slide1['d2_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Height</label>
                            <input type="number" name="d2height1" placeholder="d2 height"  class="form-control"  value="{{ $slide1['d2_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Top</label>
                            <input type="number" name="d2top1" placeholder="d2 Top"  class="form-control"  value="{{ $slide1['d2_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Left</label>
                            <input type="number" name="d2left1" placeholder="d2 Left"  class="form-control"  value="{{ $slide1['d2_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d3</label>
                            <input type="text" placeholder="Slide d3"  name="slide1d3" value="{{ $slide1['d3'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Display</label>
                            <input type="radio" name="d3display1" value="1" <?PHP if($slide1['d3_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d3display1" style="margin-left:10px;" value="0" <?PHP if($slide1['d3_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d3 Link</label>
                            <input type="url" name="d3link1" placeholder="d3 Link"  value="{{ $slide1['d3_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Font size</label>
                            <input type="number" name="d3fontsize1" placeholder="d3 Font size"  value="{{ $slide1['d3_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d3 color</label>
                            <input type="color" name="d3color1"  value="{{ $slide1['d3_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Background</label>
                            <input type="color" name="d3background1"  value="{{ $slide1['d3_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Width</label>
                            <input type="number" name="d3width1" placeholder="d3 width"  class="form-control"  value="{{ $slide1['d3_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Height</label>
                            <input type="number" name="d3height1" placeholder="d3 height"  class="form-control"  value="{{ $slide1['d3_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Top</label>
                            <input type="number" name="d3top1" placeholder="d3 Top"  class="form-control"  value="{{ $slide1['d3_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Left</label>
                            <input type="number" name="d3left1" placeholder="d3 Left"  class="form-control"  value="{{ $slide1['d3_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrousnd:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d4</label>
                            <input type="text" placeholder="Slide d4"  name="slide1d4" value="{{ $slide1['d4'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Display</label>
                            <input type="radio" name="d4display1" value="1" <?PHP if($slide1['d4_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d4display1" style="margin-left:10px;" value="0" <?PHP if($slide1['d4_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d4 Link</label>
                            <input type="url" name="d4link1" placeholder="d4 Link"  value="{{ $slide1['d4_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Font size</label>
                            <input type="number" name="d4fontsize1" placeholder="d4 Font size"  value="{{ $slide1['d4_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d4 color</label>
                            <input type="color" name="d4color1"  value="{{ $slide1['d4_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Background</label>
                            <input type="color" name="d4background1"  value="{{ $slide1['d4_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Width</label>
                            <input type="number" name="d4width1" placeholder="d4 width"  class="form-control"  value="{{ $slide1['d4_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Height</label>
                            <input type="number" name="d4height1" placeholder="d4 height"  class="form-control"  value="{{ $slide1['d4_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Top</label>
                            <input type="number" name="d4top1" placeholder="d4 Top"  class="form-control"  value="{{ $slide1['d4_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Left</label>
                            <input type="number" name="d4left1" placeholder="d4 Left"  class="form-control"  value="{{ $slide1['d4_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d5</label>
                            <input type="text" placeholder="Slide d5"  name="slide1d5" value="{{ $slide1['d5'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Display</label>
                            <input type="radio" name="d5display1" value="1" <?PHP if($slide1['d5_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d5display1" style="margin-left:10px;" value="0" <?PHP if($slide1['d5_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d5 Link</label>
                            <input type="url" name="d5link1" placeholder="d5 Link"  value="{{ $slide1['d5_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Font size</label>
                            <input type="number" name="d5fontsize1" placeholder="d5 Font size"  value="{{ $slide1['d5_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d5 color</label>
                            <input type="color" name="d5color1"  value="{{ $slide1['d5_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Background</label>
                            <input type="color" name="d5background1"  value="{{ $slide1['d5_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Width</label>
                            <input type="number" name="d5width1" placeholder="d5 width"  class="form-control"  value="{{ $slide1['d5_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Height</label>
                            <input type="number" name="d5height1" placeholder="d5 height"  class="form-control"  value="{{ $slide1['d5_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Top</label>
                            <input type="number" name="d5top1" placeholder="d5 Top"  class="form-control"  value="{{ $slide1['d5_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Left</label>
                            <input type="number" name="d5left1" placeholder="d5 Left"  class="form-control"  value="{{ $slide1['d5_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="basckground:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide btn</label>
                            <input type="text" placeholder="Slide btn"  name="slide1btn" value="{{ $slide1['btn'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Display</label>
                            <input type="radio" name="btndisplay1" value="1" <?PHP if($slide1['btn_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="btndisplay1" style="margin-left:10px;" value="0" <?PHP if($slide1['btn_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">btn Link</label>
                            <input type="url" name="btnlink1" placeholder="btn Link"  value="{{ $slide1['btn_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Font size</label>
                            <input type="number" name="btnfontsize1" placeholder="btn Font size"  value="{{ $slide1['btn_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">btn color</label>
                            <input type="color" name="btncolor1"  value="{{ $slide1['btn_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Background</label>
                            <input type="color" name="btnbackground1"  value="{{ $slide1['btn_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Width</label>
                            <input type="number" name="btnwidth1" placeholder="btn width"  class="form-control"  value="{{ $slide1['btn_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Height</label>
                            <input type="number" name="btnheight1" placeholder="btn height"  class="form-control"  value="{{ $slide1['btn_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Top</label>
                            <input type="number" name="btntop1" placeholder="btn Top"  class="form-control"  value="{{ $slide1['btn_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Left</label>
                            <input type="number" name="btnleft1" placeholder="btn Left"  class="form-control"  value="{{ $slide1['btn_left'] }}" />
                        </div>

                  </div>

            </li>
          </ul>
      </div>



      <div class="item">
          <ul class="faq">   
            <li class="q" >
              <span class="fa fa-arrow-circle-right"></span>
              <h3>{{ $slide2['t'] }} </h3>
              <div style="float:right;margin-right:20px;"> 
                            <input type="radio" name="slidedisplay2" value="1" <?PHP if($slide2['slide_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="slidedisplay2" style="margin-left:10px;"  value="0"  <?PHP if($slide2['slide_display']==0){echo 'checked';} ?>  /> Hide
                         </div>
            </li>

            <li class="a" >

                  <div class="row">
                        <div class="col-sm-3">
                            <label>Image URL</label>
                            <input type="file" placeholder="Slide Image"  name="slideimg2"  class="form-control" />
                        </div>

                        <div class="col-sm-9">
                            <label style="display:block;">Image View</label>
                            <img src="{{ $slide2['img'] }}" alt="Slide 1" width="100%" height="300px"  />
                        </div>

                  </div>
        <br /><br />
                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide a1</label>
                            <input type="text" placeholder="Slide a1"  value="{{ $slide2['a1'] }}"  name="slide2a1" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Display</label>
                            <input type="radio" name="a1display2" value="1" <?PHP if($slide2['a1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="a1display2" style="margin-left:10px;" value="0" <?PHP if($slide2['a1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">a1 Link</label>
                            <input type="url" name="a1link2" placeholder="a1 Link"  value="{{ $slide2['a1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Font size</label>
                            <input type="number" name="a1fontsize2" placeholder="a1 Font size"  value="{{ $slide2['a1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">a1 color</label>
                            <input type="color" name="a1color2"  value="{{ $slide2['a1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Background</label>
                            <input type="color" name="a1background2"  value="{{ $slide2['a1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Width</label>
                            <input type="number" name="a1width2" placeholder="a1 width"  class="form-control"  value="{{ $slide2['a1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Height</label>
                            <input type="number" name="a1height2" placeholder="a1 height"  class="form-control"  value="{{ $slide2['a1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Top</label>
                            <input type="number" name="a1top2" placeholder="a1 Top"  class="form-control"  value="{{ $slide2['a1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Left</label>
                            <input type="number" name="a1left2" placeholder="a1 Left"  class="form-control"  value="{{ $slide2['a1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="bacskground:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide t</label>
                            <input type="text" placeholder="Slide t"  name="slide2t" value="{{ $slide2['t'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Display</label>
                            <input type="radio" name="tdisplay2" value="1" <?PHP if($slide2['t_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="tdisplay2" style="margin-left:10px;" value="0" <?PHP if($slide2['t_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">t Link</label>
                            <input type="url" name="tlink2" placeholder="t Link"  value="{{ $slide2['t_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Font size</label>
                            <input type="number" name="tfontsize2" placeholder="t Font size"  value="{{ $slide2['t_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">t color</label>
                            <input type="color" name="tcolor2"  value="{{ $slide2['t_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Background</label>
                            <input type="color" name="tbackground2"  value="{{ $slide2['t_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Width</label>
                            <input type="number" name="twidth2" placeholder="t width"  class="form-control"  value="{{ $slide2['t_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Height</label>
                            <input type="number" name="theight2" placeholder="t height"  class="form-control"  value="{{ $slide2['t_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Top</label>
                            <input type="number" name="ttop2" placeholder="t Top"  class="form-control"  value="{{ $slide2['t_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Left</label>
                            <input type="number" name="tleft2" placeholder="t Left"  class="form-control"  value="{{ $slide2['t_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d1</label>
                            <input type="text" placeholder="Slide d1"  name="slide2d1" value="{{ $slide2['d1'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Display</label>
                            <input type="radio" name="d1display2" value="1" <?PHP if($slide2['d1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d1display2" style="margin-left:10px;" value="0" <?PHP if($slide2['d1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d1 Link</label>
                            <input type="url" name="d1link2" placeholder="d1 Link"  value="{{ $slide2['d1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Font size</label>
                            <input type="number" name="d1fontsize2" placeholder="d1 Font size"  value="{{ $slide2['d1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d1 color</label>
                            <input type="color" name="d1color2"  value="{{ $slide2['d1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Background</label>
                            <input type="color" name="d1background2"  value="{{ $slide2['d1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Width</label>
                            <input type="number" name="d1width2" placeholder="d1 width"  class="form-control"  value="{{ $slide2['d1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Height</label>
                            <input type="number" name="d1height2" placeholder="d1 height"  class="form-control"  value="{{ $slide2['d1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Top</label>
                            <input type="number" name="d1top2" placeholder="d1 Top"  class="form-control"  value="{{ $slide2['d1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Left</label>
                            <input type="number" name="d1left2" placeholder="d1 Left"  class="form-control"  value="{{ $slide2['d1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d2</label>
                            <input type="text" placeholder="Slide d2"  name="slide2d2" value="{{ $slide2['d2'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Display</label>
                            <input type="radio" name="d2display2" value="1" <?PHP if($slide2['d2_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d2display2" style="margin-left:10px;" value="0" <?PHP if($slide2['d2_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d2 Link</label>
                            <input type="url" name="d2link2" placeholder="d2 Link"  value="{{ $slide2['d2_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Font size</label>
                            <input type="number" name="d2fontsize2" placeholder="d2 Font size"  value="{{ $slide2['d2_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d2 color</label>
                            <input type="color" name="d2color2"  value="{{ $slide2['d2_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Background</label>
                            <input type="color" name="d2background2"  value="{{ $slide2['d2_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Width</label>
                            <input type="number" name="d2width2" placeholder="d2 width"  class="form-control"  value="{{ $slide2['d2_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Height</label>
                            <input type="number" name="d2height2" placeholder="d2 height"  class="form-control"  value="{{ $slide2['d2_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Top</label>
                            <input type="number" name="d2top2" placeholder="d2 Top"  class="form-control"  value="{{ $slide2['d2_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Left</label>
                            <input type="number" name="d2left2" placeholder="d2 Left"  class="form-control"  value="{{ $slide2['d2_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d3</label>
                            <input type="text" placeholder="Slide d3"  name="slide2d3" value="{{ $slide2['d3'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Display</label>
                            <input type="radio" name="d3display2" value="1" <?PHP if($slide2['d3_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d3display2" style="margin-left:10px;" value="0" <?PHP if($slide2['d3_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d3 Link</label>
                            <input type="url" name="d3link2" placeholder="d3 Link"  value="{{ $slide2['d3_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Font size</label>
                            <input type="number" name="d3fontsize2" placeholder="d3 Font size"  value="{{ $slide2['d3_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d3 color</label>
                            <input type="color" name="d3color2"  value="{{ $slide2['d3_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Background</label>
                            <input type="color" name="d3background2"  value="{{ $slide2['d3_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Width</label>
                            <input type="number" name="d3width2" placeholder="d3 width"  class="form-control"  value="{{ $slide2['d3_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Height</label>
                            <input type="number" name="d3height2" placeholder="d3 height"  class="form-control"  value="{{ $slide2['d3_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Top</label>
                            <input type="number" name="d3top2" placeholder="d3 Top"  class="form-control"  value="{{ $slide2['d3_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Left</label>
                            <input type="number" name="d3left2" placeholder="d3 Left"  class="form-control"  value="{{ $slide2['d3_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrousnd:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d4</label>
                            <input type="text" placeholder="Slide d4"  name="slide2d4" value="{{ $slide2['d4'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Display</label>
                            <input type="radio" name="d4display2" value="1" <?PHP if($slide2['d4_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d4display2" style="margin-left:10px;" value="0" <?PHP if($slide2['d4_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d4 Link</label>
                            <input type="url" name="d4link2" placeholder="d4 Link"  value="{{ $slide2['d4_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Font size</label>
                            <input type="number" name="d4fontsize2" placeholder="d4 Font size"  value="{{ $slide2['d4_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d4 color</label>
                            <input type="color" name="d4color2"  value="{{ $slide2['d4_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Background</label>
                            <input type="color" name="d4background2"  value="{{ $slide2['d4_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Width</label>
                            <input type="number" name="d4width2" placeholder="d4 width"  class="form-control"  value="{{ $slide2['d4_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Height</label>
                            <input type="number" name="d4height2" placeholder="d4 height"  class="form-control"  value="{{ $slide2['d4_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Top</label>
                            <input type="number" name="d4top2" placeholder="d4 Top"  class="form-control"  value="{{ $slide2['d4_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Left</label>
                            <input type="number" name="d4left2" placeholder="d4 Left"  class="form-control"  value="{{ $slide2['d4_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d5</label>
                            <input type="text" placeholder="Slide d5"  name="slide2d5" value="{{ $slide2['d5'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Display</label>
                            <input type="radio" name="d5display2" value="1" <?PHP if($slide2['d5_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d5display2" style="margin-left:10px;" value="0" <?PHP if($slide2['d5_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d5 Link</label>
                            <input type="url" name="d5link2" placeholder="d5 Link"  value="{{ $slide2['d5_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Font size</label>
                            <input type="number" name="d5fontsize2" placeholder="d5 Font size"  value="{{ $slide2['d5_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d5 color</label>
                            <input type="color" name="d5color2"  value="{{ $slide2['d5_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Background</label>
                            <input type="color" name="d5background2"  value="{{ $slide2['d5_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Width</label>
                            <input type="number" name="d5width2" placeholder="d5 width"  class="form-control"  value="{{ $slide2['d5_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Height</label>
                            <input type="number" name="d5height2" placeholder="d5 height"  class="form-control"  value="{{ $slide2['d5_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Top</label>
                            <input type="number" name="d5top2" placeholder="d5 Top"  class="form-control"  value="{{ $slide2['d5_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Left</label>
                            <input type="number" name="d5left2" placeholder="d5 Left"  class="form-control"  value="{{ $slide2['d5_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="backsground:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide btn</label>
                            <input type="text" placeholder="Slide btn"  name="slide2btn" value="{{ $slide2['btn'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Display</label>
                            <input type="radio" name="btndisplay2" value="1" <?PHP if($slide2['btn_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="btndisplay2" style="margin-left:10px;" value="0" <?PHP if($slide2['btn_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">btn Link</label>
                            <input type="url" name="btnlink2" placeholder="btn Link"  value="{{ $slide2['btn_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Font size</label>
                            <input type="number" name="btnfontsize2" placeholder="btn Font size"  value="{{ $slide2['btn_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrsound:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">btn color</label>
                            <input type="color" name="btncolor2"  value="{{ $slide2['btn_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Background</label>
                            <input type="color" name="btnbackground2"  value="{{ $slide2['btn_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Width</label>
                            <input type="number" name="btnwidth2" placeholder="btn width"  class="form-control"  value="{{ $slide2['btn_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Height</label>
                            <input type="number" name="btnheight2" placeholder="btn height"  class="form-control"  value="{{ $slide2['btn_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Top</label>
                            <input type="number" name="btntop2" placeholder="btn Top"  class="form-control"  value="{{ $slide2['btn_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Left</label>
                            <input type="number" name="btnleft2" placeholder="btn Left"  class="form-control"  value="{{ $slide2['btn_left'] }}" />
                        </div>

                  </div>



            </li>
          </ul>
      </div>


      <div class="item">
          <ul class="faq">   
            <li class="q" >
              <span class="fa fa-arrow-circle-right"></span>
              <h3>{{ $slide3['t'] }} </h3>
              <div style="float:right;margin-right:20px;"> 
                            <input type="radio" name="slidedisplay3" value="1" <?PHP if($slide3['slide_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="slidedisplay3" style="margin-left:10px;"  value="0"  <?PHP if($slide3['slide_display']==0){echo 'checked';} ?>  /> Hide
                         </div>
            </li>

            <li class="a" >

                  <div class="row">
                        <div class="col-sm-3">
                            <label>Image URL</label>
                            <input type="file" placeholder="Slide Image"  name="slideimg3" class="form-control" />
                        </div>

                        <div class="col-sm-9">
                            <label style="display:block;">Image View</label>
                            <img src="{{ $slide3['img'] }}" alt="Slide 1" width="100%" height="300px"  />
                        </div>

                  </div>
        <br /><br />
                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide a1</label>
                            <input type="text" placeholder="Slide a1" value="{{ $slide3['a1'] }}"  name="slide3a1" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Display</label>
                            <input type="radio" name="a1display3" value="1" <?PHP if($slide3['a1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="a1display3" style="margin-left:10px;" value="0" <?PHP if($slide3['a1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">a1 Link</label>
                            <input type="url" name="a1link3" placeholder="a1 Link"  value="{{ $slide3['a1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Font size</label>
                            <input type="number" name="a1fontsize3" placeholder="a1 Font size"  value="{{ $slide3['a1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">a1 color</label>
                            <input type="color" name="a1color3"  value="{{ $slide3['a1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Background</label>
                            <input type="color" name="a1background3"  value="{{ $slide3['a1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Width</label>
                            <input type="number" name="a1width3" placeholder="a1 width"  class="form-control"  value="{{ $slide3['a1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Height</label>
                            <input type="number" name="a1height3" placeholder="a1 height"  class="form-control"  value="{{ $slide3['a1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Top</label>
                            <input type="number" name="a1top3" placeholder="a1 Top"  class="form-control"  value="{{ $slide3['a1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Left</label>
                            <input type="number" name="a1left3" placeholder="a1 Left"  class="form-control"  value="{{ $slide3['a1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="bacskground:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide t</label>
                            <input type="text" placeholder="Slide t"  name="slide3t" value="{{ $slide3['t'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Display</label>
                            <input type="radio" name="tdisplay3" value="1" <?PHP if($slide3['t_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="tdisplay3" style="margin-left:10px;" value="0" <?PHP if($slide3['t_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">t Link</label>
                            <input type="url" name="tlink3" placeholder="t Link"  value="{{ $slide3['t_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Font size</label>
                            <input type="number" name="tfontsize3" placeholder="t Font size"  value="{{ $slide3['t_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">t color</label>
                            <input type="color" name="tcolor3"  value="{{ $slide3['t_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Background</label>
                            <input type="color" name="tbackground3"  value="{{ $slide3['t_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Width</label>
                            <input type="number" name="twidth3" placeholder="t width"  class="form-control"  value="{{ $slide3['t_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Height</label>
                            <input type="number" name="theight3" placeholder="t height"  class="form-control"  value="{{ $slide3['t_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Top</label>
                            <input type="number" name="ttop3" placeholder="t Top"  class="form-control"  value="{{ $slide3['t_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Left</label>
                            <input type="number" name="tleft3" placeholder="t Left"  class="form-control"  value="{{ $slide3['t_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d1</label>
                            <input type="text" placeholder="Slide d1"  name="slide3d1" value="{{ $slide3['d1'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Display</label>
                            <input type="radio" name="d1display3" value="1" <?PHP if($slide3['d1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d1display3" style="margin-left:10px;" value="0" <?PHP if($slide3['d1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d1 Link</label>
                            <input type="url" name="d1link3" placeholder="d1 Link"  value="{{ $slide3['d1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Font size</label>
                            <input type="number" name="d1fontsize3" placeholder="d1 Font size"  value="{{ $slide3['d1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d1 color</label>
                            <input type="color" name="d1color3"  value="{{ $slide3['d1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Background</label>
                            <input type="color" name="d1background3"  value="{{ $slide3['d1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Width</label>
                            <input type="number" name="d1width3" placeholder="d1 width"  class="form-control"  value="{{ $slide3['d1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Height</label>
                            <input type="number" name="d1height3" placeholder="d1 height"  class="form-control"  value="{{ $slide3['d1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Top</label>
                            <input type="number" name="d1top3" placeholder="d1 Top"  class="form-control"  value="{{ $slide3['d1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Left</label>
                            <input type="number" name="d1left3" placeholder="d1 Left"  class="form-control"  value="{{ $slide3['d1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d2</label>
                            <input type="text" placeholder="Slide d2"  name="slide3d2" value="{{ $slide3['d2'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Display</label>
                            <input type="radio" name="d2display3" value="1" <?PHP if($slide3['d2_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d2display3" style="margin-left:10px;" value="0" <?PHP if($slide3['d2_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d2 Link</label>
                            <input type="url" name="d2link3" placeholder="d2 Link"  value="{{ $slide3['d2_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Font size</label>
                            <input type="number" name="d2fontsize3" placeholder="d2 Font size"  value="{{ $slide3['d2_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d2 color</label>
                            <input type="color" name="d2color3"  value="{{ $slide3['d2_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Background</label>
                            <input type="color" name="d2background3"  value="{{ $slide3['d2_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Width</label>
                            <input type="number" name="d2width3" placeholder="d2 width"  class="form-control"  value="{{ $slide3['d2_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Height</label>
                            <input type="number" name="d2height3" placeholder="d2 height"  class="form-control"  value="{{ $slide3['d2_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Top</label>
                            <input type="number" name="d2top3" placeholder="d2 Top"  class="form-control"  value="{{ $slide3['d2_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Left</label>
                            <input type="number" name="d2left3" placeholder="d2 Left"  class="form-control"  value="{{ $slide3['d2_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d3</label>
                            <input type="text" placeholder="Slide d3"  name="slide3d3" value="{{ $slide3['d3'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Display</label>
                            <input type="radio" name="d3display3" value="1" <?PHP if($slide3['d3_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d3display3" style="margin-left:10px;" value="0" <?PHP if($slide3['d3_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d3 Link</label>
                            <input type="url" name="d3link3" placeholder="d3 Link"  value="{{ $slide3['d3_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Font size</label>
                            <input type="number" name="d3fontsize3" placeholder="d3 Font size"  value="{{ $slide3['d3_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d3 color</label>
                            <input type="color" name="d3color3"  value="{{ $slide3['d3_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Background</label>
                            <input type="color" name="d3background3"  value="{{ $slide3['d3_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Width</label>
                            <input type="number" name="d3width3" placeholder="d3 width"  class="form-control"  value="{{ $slide3['d3_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Height</label>
                            <input type="number" name="d3height3" placeholder="d3 height"  class="form-control"  value="{{ $slide3['d3_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Top</label>
                            <input type="number" name="d3top3" placeholder="d3 Top"  class="form-control"  value="{{ $slide3['d3_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Left</label>
                            <input type="number" name="d3left3" placeholder="d3 Left"  class="form-control"  value="{{ $slide3['d3_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrousnd:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d4</label>
                            <input type="text" placeholder="Slide d4"  name="slide3d4" value="{{ $slide3['d4'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Display</label>
                            <input type="radio" name="d4display3" value="1" <?PHP if($slide3['d4_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d4display3" style="margin-left:10px;" value="0" <?PHP if($slide3['d4_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d4 Link</label>
                            <input type="url" name="d4link3" placeholder="d4 Link"  value="{{ $slide3['d4_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Font size</label>
                            <input type="number" name="d4fontsize3" placeholder="d4 Font size"  value="{{ $slide3['d4_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d4 color</label>
                            <input type="color" name="d4color3"  value="{{ $slide3['d4_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Background</label>
                            <input type="color" name="d4background3"  value="{{ $slide3['d4_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Width</label>
                            <input type="number" name="d4width3" placeholder="d4 width"  class="form-control"  value="{{ $slide3['d4_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Height</label>
                            <input type="number" name="d4height3" placeholder="d4 height"  class="form-control"  value="{{ $slide3['d4_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Top</label>
                            <input type="number" name="d4top3" placeholder="d4 Top"  class="form-control"  value="{{ $slide3['d4_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Left</label>
                            <input type="number" name="d4left3" placeholder="d4 Left"  class="form-control"  value="{{ $slide3['d4_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d5</label>
                            <input type="text" placeholder="Slide d5"  name="slide3d5" value="{{ $slide3['d5'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Display</label>
                            <input type="radio" name="d5display3" value="1" <?PHP if($slide3['d5_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d5display3" style="margin-left:10px;" value="0" <?PHP if($slide3['d5_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d5 Link</label>
                            <input type="url" name="d5link3" placeholder="d5 Link"  value="{{ $slide3['d5_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Font size</label>
                            <input type="number" name="d5fontsize3" placeholder="d5 Font size"  value="{{ $slide3['d5_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d5 color</label>
                            <input type="color" name="d5color3"  value="{{ $slide3['d5_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Background</label>
                            <input type="color" name="d5background3"  value="{{ $slide3['d5_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Width</label>
                            <input type="number" name="d5width3" placeholder="d5 width"  class="form-control"  value="{{ $slide3['d5_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Height</label>
                            <input type="number" name="d5height3" placeholder="d5 height"  class="form-control"  value="{{ $slide3['d5_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Top</label>
                            <input type="number" name="d5top3" placeholder="d5 Top"  class="form-control"  value="{{ $slide3['d5_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Left</label>
                            <input type="number" name="d5left3" placeholder="d5 Left"  class="form-control"  value="{{ $slide3['d5_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrosund:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide btn</label>
                            <input type="text" placeholder="Slide btn"  name="slide3btn" value="{{ $slide3['btn'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Display</label>
                            <input type="radio" name="btndisplay3" value="1" <?PHP if($slide3['btn_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="btndisplay3" style="margin-left:10px;" value="0" <?PHP if($slide3['btn_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">btn Link</label>
                            <input type="url" name="btnlink3" placeholder="btn Link"  value="{{ $slide3['btn_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Font size</label>
                            <input type="number" name="btnfontsize3" placeholder="btn Font size"  value="{{ $slide3['btn_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backsground:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">btn color</label>
                            <input type="color" name="btncolor3"  value="{{ $slide3['btn_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Background</label>
                            <input type="color" name="btnbackground3"  value="{{ $slide3['btn_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Width</label>
                            <input type="number" name="btnwidth3" placeholder="btn width"  class="form-control"  value="{{ $slide3['btn_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Height</label>
                            <input type="number" name="btnheight3" placeholder="btn height"  class="form-control"  value="{{ $slide3['btn_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Top</label>
                            <input type="number" name="btntop3" placeholder="btn Top"  class="form-control"  value="{{ $slide3['btn_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Left</label>
                            <input type="number" name="btnleft3" placeholder="btn Left"  class="form-control"  value="{{ $slide3['btn_left'] }}" />
                        </div>

                  </div>


            </li>
          </ul>
      </div>



      <div class="item">
          <ul class="faq">   
            <li class="q" >
              <span class="fa fa-arrow-circle-right"></span>
              <h3>{{ $slide4['t'] }} </h3>
              <div style="float:right;margin-right:20px;"> 
                            <input type="radio" name="slidedisplay4" value="1" <?PHP if($slide4['slide_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="slidedisplay4" style="margin-left:10px;"  value="0"  <?PHP if($slide4['slide_display']==0){echo 'checked';} ?>  /> Hide
                         </div>
            </li>

            <li class="a" >

                  <div class="row">
                        <div class="col-sm-3">
                            <label>Image URL</label>
                            <input type="file" placeholder="Slide Image"  name="slideimg4"  class="form-control" />
                        </div>

                        <div class="col-sm-9">
                            <label style="display:block;">Image View</label>
                            <img src="{{ $slide4['img'] }}" alt="Slide 1" width="100%" height="300px"  />
                        </div>

                  </div>
        <br /><br />
                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide a1</label>
                            <input type="text" placeholder="Slide a1" value="{{ $slide4['a1'] }}"  name="slide4a1" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Display</label>
                            <input type="radio" name="a1display4" value="1" <?PHP if($slide4['a1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="a1display4" style="margin-left:10px;" value="0" <?PHP if($slide4['a1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">a1 Link</label>
                            <input type="url" name="a1link4" placeholder="a1 Link"  value="{{ $slide4['a1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Font size</label>
                            <input type="number" name="a1fontsize4" placeholder="a1 Font size"  value="{{ $slide4['a1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">a1 color</label>
                            <input type="color" name="a1color4"  value="{{ $slide4['a1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Background</label>
                            <input type="color" name="a1background4"  value="{{ $slide4['a1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Width</label>
                            <input type="number" name="a1width4" placeholder="a1 width"  class="form-control"  value="{{ $slide4['a1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Height</label>
                            <input type="number" name="a1height4" placeholder="a1 height"  class="form-control"  value="{{ $slide4['a1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Top</label>
                            <input type="number" name="a1top4" placeholder="a1 Top"  class="form-control"  value="{{ $slide4['a1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Left</label>
                            <input type="number" name="a1left4" placeholder="a1 Left"  class="form-control"  value="{{ $slide4['a1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="bacskground:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide t</label>
                            <input type="text" placeholder="Slide t"  name="slide4t" value="{{ $slide4['t'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Display</label>
                            <input type="radio" name="tdisplay4" value="1" <?PHP if($slide4['t_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="tdisplay4" style="margin-left:10px;" value="0" <?PHP if($slide4['t_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">t Link</label>
                            <input type="url" name="tlink4" placeholder="t Link"  value="{{ $slide4['t_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Font size</label>
                            <input type="number" name="tfontsize4" placeholder="t Font size"  value="{{ $slide4['t_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">t color</label>
                            <input type="color" name="tcolor4"  value="{{ $slide4['t_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Background</label>
                            <input type="color" name="tbackground4"  value="{{ $slide4['t_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Width</label>
                            <input type="number" name="twidth4" placeholder="t width"  class="form-control"  value="{{ $slide4['t_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Height</label>
                            <input type="number" name="theight4" placeholder="t height"  class="form-control"  value="{{ $slide4['t_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Top</label>
                            <input type="number" name="ttop4" placeholder="t Top"  class="form-control"  value="{{ $slide4['t_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Left</label>
                            <input type="number" name="tleft4" placeholder="t Left"  class="form-control"  value="{{ $slide4['t_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d1</label>
                            <input type="text" placeholder="Slide d1"  name="slide4d1" value="{{ $slide4['d1'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Display</label>
                            <input type="radio" name="d1display4" value="1" <?PHP if($slide4['d1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d1display4" style="margin-left:10px;" value="0" <?PHP if($slide4['d1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d1 Link</label>
                            <input type="url" name="d1link4" placeholder="d1 Link"  value="{{ $slide4['d1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Font size</label>
                            <input type="number" name="d1fontsize4" placeholder="d1 Font size"  value="{{ $slide4['d1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d1 color</label>
                            <input type="color" name="d1color4"  value="{{ $slide4['d1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Background</label>
                            <input type="color" name="d1background4"  value="{{ $slide4['d1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Width</label>
                            <input type="number" name="d1width4" placeholder="d1 width"  class="form-control"  value="{{ $slide4['d1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Height</label>
                            <input type="number" name="d1height4" placeholder="d1 height"  class="form-control"  value="{{ $slide4['d1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Top</label>
                            <input type="number" name="d1top4" placeholder="d1 Top"  class="form-control"  value="{{ $slide4['d1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Left</label>
                            <input type="number" name="d1left4" placeholder="d1 Left"  class="form-control"  value="{{ $slide4['d1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d2</label>
                            <input type="text" placeholder="Slide d2" name="slide4d2" value="{{ $slide4['d2'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Display</label>
                            <input type="radio" name="d2display4" value="1" <?PHP if($slide4['d2_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d2display4" style="margin-left:10px;" value="0" <?PHP if($slide4['d2_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d2 Link</label>
                            <input type="url" name="d2link4" placeholder="d2 Link"  value="{{ $slide4['d2_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Font size</label>
                            <input type="number" name="d2fontsize4" placeholder="d2 Font size"  value="{{ $slide4['d2_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d2 color</label>
                            <input type="color" name="d2color4"  value="{{ $slide4['d2_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Background</label>
                            <input type="color" name="d2background4"  value="{{ $slide4['d2_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Width</label>
                            <input type="number" name="d2width4" placeholder="d2 width"  class="form-control"  value="{{ $slide4['d2_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Height</label>
                            <input type="number" name="d2height4" placeholder="d2 height"  class="form-control"  value="{{ $slide4['d2_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Top</label>
                            <input type="number" name="d2top4" placeholder="d2 Top"  class="form-control"  value="{{ $slide4['d2_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Left</label>
                            <input type="number" name="d2left4" placeholder="d2 Left"  class="form-control"  value="{{ $slide4['d2_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d3</label>
                            <input type="text" placeholder="Slide d3" name="slide4d3" value="{{ $slide4['d3'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Display</label>
                            <input type="radio" name="d3display4" value="1" <?PHP if($slide4['d3_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d3display4" style="margin-left:10px;" value="0" <?PHP if($slide4['d3_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d3 Link</label>
                            <input type="url" name="d3link4" placeholder="d3 Link"  value="{{ $slide4['d3_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Font size</label>
                            <input type="number" name="d3fontsize4" placeholder="d3 Font size"  value="{{ $slide4['d3_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d3 color</label>
                            <input type="color" name="d3color4"  value="{{ $slide4['d3_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Background</label>
                            <input type="color" name="d3background4"  value="{{ $slide4['d3_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Width</label>
                            <input type="number" name="d3width4" placeholder="d3 width"  class="form-control"  value="{{ $slide4['d3_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Height</label>
                            <input type="number" name="d3height4" placeholder="d3 height"  class="form-control"  value="{{ $slide4['d3_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Top</label>
                            <input type="number" name="d3top4" placeholder="d3 Top"  class="form-control"  value="{{ $slide4['d3_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Left</label>
                            <input type="number" name="d3left4" placeholder="d3 Left"  class="form-control"  value="{{ $slide4['d3_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrousnd:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d4</label>
                            <input type="text" placeholder="Slide d4" name="slide4d4" value="{{ $slide4['d4'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Display</label>
                            <input type="radio" name="d4display4" value="1" <?PHP if($slide4['d4_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d4display4" style="margin-left:10px;" value="0" <?PHP if($slide4['d4_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d4 Link</label>
                            <input type="url" name="d4link4" placeholder="d4 Link"  value="{{ $slide4['d4_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Font size</label>
                            <input type="number" name="d4fontsize4" placeholder="d4 Font size"  value="{{ $slide4['d4_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d4 color</label>
                            <input type="color" name="d4color4"  value="{{ $slide4['d4_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Background</label>
                            <input type="color" name="d4background4"  value="{{ $slide4['d4_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Width</label>
                            <input type="number" name="d4width4" placeholder="d4 width"  class="form-control"  value="{{ $slide4['d4_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Height</label>
                            <input type="number" name="d4height4" placeholder="d4 height"  class="form-control"  value="{{ $slide4['d4_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Top</label>
                            <input type="number" name="d4top4" placeholder="d4 Top"  class="form-control"  value="{{ $slide4['d4_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Left</label>
                            <input type="number" name="d4left4" placeholder="d4 Left"  class="form-control"  value="{{ $slide4['d4_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d5</label>
                            <input type="text" placeholder="Slide d5" name="slide4d5" value="{{ $slide4['d5'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Display</label>
                            <input type="radio" name="d5display4" value="1" <?PHP if($slide4['d5_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d5display4" style="margin-left:10px;" value="0" <?PHP if($slide4['d5_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d5 Link</label>
                            <input type="url" name="d5link4" placeholder="d5 Link"  value="{{ $slide4['d5_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Font size</label>
                            <input type="number" name="d5fontsize4" placeholder="d5 Font size"  value="{{ $slide4['d5_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d5 color</label>
                            <input type="color" name="d5color4"  value="{{ $slide4['d5_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Background</label>
                            <input type="color" name="d5background4"  value="{{ $slide4['d5_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Width</label>
                            <input type="number" name="d5width4" placeholder="d5 width"  class="form-control"  value="{{ $slide4['d5_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Height</label>
                            <input type="number" name="d5height4" placeholder="d5 height"  class="form-control"  value="{{ $slide4['d5_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Top</label>
                            <input type="number" name="d5top4" placeholder="d5 Top"  class="form-control"  value="{{ $slide4['d5_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Left</label>
                            <input type="number" name="d5left4" placeholder="d5 Left"  class="form-control"  value="{{ $slide4['d5_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide btn</label>
                            <input type="text" placeholder="Slide btn" name="slide4btn" value="{{ $slide4['btn'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Display</label>
                            <input type="radio" name="btndisplay4" value="1" <?PHP if($slide4['btn_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="btndisplay4" style="margin-left:10px;" value="0" <?PHP if($slide4['btn_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">btn Link</label>
                            <input type="url" name="btnlink4" placeholder="btn Link"  value="{{ $slide4['btn_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Font size</label>
                            <input type="number" name="btnfontsize4" placeholder="btn Font size"  value="{{ $slide4['btn_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">btn color</label>
                            <input type="color" name="btncolor4"  value="{{ $slide4['btn_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Background</label>
                            <input type="color" name="btnbackground4"  value="{{ $slide4['btn_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Width</label>
                            <input type="number" name="btnwidth4" placeholder="btn width"  class="form-control"  value="{{ $slide4['btn_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Height</label>
                            <input type="number" name="btnheight4" placeholder="btn height"  class="form-control"  value="{{ $slide4['btn_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Top</label>
                            <input type="number" name="btntop4" placeholder="btn Top"  class="form-control"  value="{{ $slide4['btn_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Left</label>
                            <input type="number" name="btnleft4" placeholder="btn Left"  class="form-control"  value="{{ $slide4['btn_left'] }}" />
                        </div>

                  </div>




            </li>
          </ul>
      </div>


      <div class="item">
          <ul class="faq">   
            <li class="q" >
              <span class="fa fa-arrow-circle-right"></span>
              <h3>{{ $slide5['t'] }} </h3>
              <div style="float:right;margin-right:20px;"> 
                            <input type="radio" name="slidedisplay5" value="1" <?PHP if($slide5['slide_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="slidedisplay5" style="margin-left:10px;"  value="0"  <?PHP if($slide5['slide_display']==0){echo 'checked';} ?>  /> Hide
                         </div>
            </li>

            <li class="a" >

                  <div class="row">
                        <div class="col-sm-3">
                            <label>Image URL</label>
                            <input type="file" placeholder="Slide Image"  name="slideimg5" class="form-control" />
                        </div>

                        <div class="col-sm-9">
                            <label style="display:block;">Image View</label>
                            <img src="{{ $slide5['img'] }}" alt="Slide 1" width="100%" height="300px"  />
                        </div>

                  </div>
        <br /><br />
                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide a1</label>
                            <input type="text" placeholder="Slide a1" value="{{ $slide5['a1'] }}"  name="slide5a1" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Display</label>
                            <input type="radio" name="a1display5" value="1" <?PHP if($slide5['a1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="a1display5" style="margin-left:10px;" value="0" <?PHP if($slide5['a1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">a1 Link</label>
                            <input type="url" name="a1link5" placeholder="a1 Link"  value="{{ $slide5['a1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Font size</label>
                            <input type="number" name="a1fontsize5" placeholder="a1 Font size"  value="{{ $slide5['a1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">a1 color</label>
                            <input type="color" name="a1color5"  value="{{ $slide5['a1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Background</label>
                            <input type="color" name="a1background5"  value="{{ $slide5['a1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Width</label>
                            <input type="number" name="a1width5" placeholder="a1 width"  class="form-control"  value="{{ $slide5['a1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Height</label>
                            <input type="number" name="a1height5" placeholder="a1 height"  class="form-control"  value="{{ $slide5['a1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Top</label>
                            <input type="number" name="a1top5" placeholder="a1 Top"  class="form-control"  value="{{ $slide5['a1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">a1 Left</label>
                            <input type="number" name="a1left5" placeholder="a1 Left"  class="form-control"  value="{{ $slide5['a1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="bacskground:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide t</label>
                            <input type="text" placeholder="Slide t" name="slide5t" value="{{ $slide5['t'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Display</label>
                            <input type="radio" name="tdisplay5" value="1" <?PHP if($slide5['t_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="tdisplay5" style="margin-left:10px;" value="0" <?PHP if($slide5['t_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">t Link</label>
                            <input type="url" name="tlink5" placeholder="t Link"  value="{{ $slide5['t_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Font size</label>
                            <input type="number" name="tfontsize5" placeholder="t Font size"  value="{{ $slide5['t_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgsround:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">t color</label>
                            <input type="color" name="tcolor5"  value="{{ $slide5['t_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Background</label>
                            <input type="color" name="tbackground5"  value="{{ $slide5['t_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Width</label>
                            <input type="number" name="twidth5" placeholder="t width"  class="form-control"  value="{{ $slide5['t_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Height</label>
                            <input type="number" name="theight5" placeholder="t height"  class="form-control"  value="{{ $slide5['t_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Top</label>
                            <input type="number" name="ttop5" placeholder="t Top"  class="form-control"  value="{{ $slide5['t_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">t Left</label>
                            <input type="number" name="tleft5" placeholder="t Left"  class="form-control"  value="{{ $slide5['t_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d1</label>
                            <input type="text" placeholder="Slide d1" name="slide5d1" value="{{ $slide5['d1'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Display</label>
                            <input type="radio" name="d1display5" value="1" <?PHP if($slide5['d1_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d1display5" style="margin-left:10px;" value="0" <?PHP if($slide5['d1_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d1 Link</label>
                            <input type="url" name="d1link5" placeholder="d1 Link"  value="{{ $slide5['d1_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Font size</label>
                            <input type="number" name="d1fontsize5" placeholder="d1 Font size"  value="{{ $slide5['d1_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d1 color</label>
                            <input type="color" name="d1color5"  value="{{ $slide5['d1_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Background</label>
                            <input type="color" name="d1background5"  value="{{ $slide5['d1_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Width</label>
                            <input type="number" name="d1width5" placeholder="d1 width"  class="form-control"  value="{{ $slide5['d1_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Height</label>
                            <input type="number" name="d1height5" placeholder="d1 height"  class="form-control"  value="{{ $slide5['d1_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Top</label>
                            <input type="number" name="d1top5" placeholder="d1 Top"  class="form-control"  value="{{ $slide5['d1_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d1 Left</label>
                            <input type="number" name="d1left5" placeholder="d1 Left"  class="form-control"  value="{{ $slide5['d1_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d2</label>
                            <input type="text" placeholder="Slide d2" name="slide5d2" value="{{ $slide5['d2'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Display</label>
                            <input type="radio" name="d2display5" value="1" <?PHP if($slide5['d2_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d2display5" style="margin-left:10px;" value="0" <?PHP if($slide5['d2_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d2 Link</label>
                            <input type="url" name="d2link5" placeholder="d2 Link"  value="{{ $slide5['d2_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Font size</label>
                            <input type="number" name="d2fontsize5" placeholder="d2 Font size"  value="{{ $slide5['d2_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d2 color</label>
                            <input type="color" name="d2color5"  value="{{ $slide5['d2_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Background</label>
                            <input type="color" name="d2background5"  value="{{ $slide5['d2_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Width</label>
                            <input type="number" name="d2width5" placeholder="d2 width"  class="form-control"  value="{{ $slide5['d2_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Height</label>
                            <input type="number" name="d2height5" placeholder="d2 height"  class="form-control"  value="{{ $slide5['d2_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Top</label>
                            <input type="number" name="d2top5" placeholder="d2 Top"  class="form-control"  value="{{ $slide5['d2_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d2 Left</label>
                            <input type="number" name="d2left5" placeholder="d2 Left"  class="form-control"  value="{{ $slide5['d2_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d3</label>
                            <input type="text" placeholder="Slide d3" name="slide5d3" value="{{ $slide5['d3'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Display</label>
                            <input type="radio" name="d3display5" value="1" <?PHP if($slide5['d3_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d3display5" style="margin-left:10px;" value="0" <?PHP if($slide5['d3_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d3 Link</label>
                            <input type="url" name="d3link5" placeholder="d3 Link"  value="{{ $slide5['d3_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Font size</label>
                            <input type="number" name="d3fontsize5" placeholder="d3 Font size"  value="{{ $slide5['d3_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d3 color</label>
                            <input type="color" name="d3color5"  value="{{ $slide5['d3_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Background</label>
                            <input type="color" name="d3background5"  value="{{ $slide5['d3_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Width</label>
                            <input type="number" name="d3width5" placeholder="d3 width"  class="form-control"  value="{{ $slide5['d3_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Height</label>
                            <input type="number" name="d3height5" placeholder="d3 height"  class="form-control"  value="{{ $slide5['d3_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Top</label>
                            <input type="number" name="d3top5" placeholder="d3 Top"  class="form-control"  value="{{ $slide5['d3_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d3 Left</label>
                            <input type="number" name="d3left5" placeholder="d3 Left"  class="form-control"  value="{{ $slide5['d3_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrousnd:red;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d4</label>
                            <input type="text" placeholder="Slide d4" name="slide5d4" value="{{ $slide5['d4'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Display</label>
                            <input type="radio" name="d4display5" value="1" <?PHP if($slide5['d4_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d4display5" style="margin-left:10px;" value="0" <?PHP if($slide5['d4_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d4 Link</label>
                            <input type="url" name="d4link5" placeholder="d4 Link"  value="{{ $slide5['d4_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Font size</label>
                            <input type="number" name="d4fontsize5" placeholder="d4 Font size"  value="{{ $slide5['d4_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:red;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d4 color</label>
                            <input type="color" name="d4color5"  value="{{ $slide5['d4_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Background</label>
                            <input type="color" name="d4background5"  value="{{ $slide5['d4_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Width</label>
                            <input type="number" name="d4width5" placeholder="d4 width"  class="form-control"  value="{{ $slide5['d4_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Height</label>
                            <input type="number" name="d4height5" placeholder="d4 height"  class="form-control"  value="{{ $slide5['d4_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Top</label>
                            <input type="number" name="d4top5" placeholder="d4 Top"  class="form-control"  value="{{ $slide5['d4_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d4 Left</label>
                            <input type="number" name="d4left5" placeholder="d4 Left"  class="form-control"  value="{{ $slide5['d4_left'] }}" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide d5</label>
                            <input type="text" placeholder="Slide d5" name="slide5d5" value="{{ $slide5['d5'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Display</label>
                            <input type="radio" name="d5display5" value="1" <?PHP if($slide5['d5_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="d5display5" style="margin-left:10px;" value="0" <?PHP if($slide5['d5_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">d5 Link</label>
                            <input type="url" name="d5link5" placeholder="d5 Link"  value="{{ $slide5['d5_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Font size</label>
                            <input type="number" name="d5fontsize5" placeholder="d5 Font size"  value="{{ $slide5['d5_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="background:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">d5 color</label>
                            <input type="color" name="d5color5"  value="{{ $slide5['d5_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Background</label>
                            <input type="color" name="d5background5"  value="{{ $slide5['d5_background'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Width</label>
                            <input type="number" name="d5width5" placeholder="d5 width"  class="form-control"  value="{{ $slide5['d5_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Height</label>
                            <input type="number" name="d5height5" placeholder="d5 height"  class="form-control"  value="{{ $slide5['d5_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Top</label>
                            <input type="number" name="d5top5" placeholder="d5 Top"  class="form-control"  value="{{ $slide5['d5_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">d5 Left</label>
                            <input type="number" name="d5left5" placeholder="d5 Left"  class="form-control"  value="{{ $slide5['d5_left'] }}" />
                        </div>

                  </div>


                  <div class="row" style="backgrsound:gray;padding-bottom:25px;">
                        <div class="col-sm-4">
                            <label>Slide btn</label>
                            <input type="text" placeholder="Slide btn" name="slide5btn" value="{{ $slide5['btn'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Display</label>
                            <input type="radio" name="btndisplay5" value="1" <?PHP if($slide5['btn_display']==1){echo 'checked';} ?> /> Show <input type="radio" name="btndisplay5" style="margin-left:10px;" value="0" <?PHP if($slide5['btn_display']==0){echo 'checked';} ?> /> Hide
                        </div>
                        <div class="col-sm-4">
                            <label style="display:block;">btn Link</label>
                            <input type="url" name="btnlink5" placeholder="btn Link"  value="{{ $slide5['btn_link'] }}" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Font size</label>
                            <input type="number" name="btnfontsize5" placeholder="btn Font size"  value="{{ $slide5['btn_fontsize'] }}" class="form-control" />
                        </div>

                  </div>

                  <div class="row" style="backgrosund:gray;padding-bottom:25px;">
                        <div class="col-sm-2">
                            <label style="display:block;">btn color</label>
                            <input type="color" name="btncolor5"  value="{{ $slide5['btn_color'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Background</label>
                            <input type="color" name="btnbackground5"  value="{{ $slide5['btn_background5'] }}" /> 
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Width</label>
                            <input type="number" name="btnwidth5" placeholder="btn width"  class="form-control"  value="{{ $slide5['btn_width'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Height</label>
                            <input type="number" name="btnheight5" placeholder="btn height"  class="form-control"  value="{{ $slide5['btn_height'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Top</label>
                            <input type="number" name="btntop5" placeholder="btn Top"  class="form-control"  value="{{ $slide5['btn_top'] }}" />
                        </div>
                        <div class="col-sm-2">
                            <label style="display:block;">btn Left</label>
                            <input type="number" name="btnleft5" placeholder="btn Left"  class="form-control"  value="{{ $slide5['btn_left'] }}" />
                        </div>

                  </div>


            </li>
          </ul>
      </div>


                                <div class="col-sm-3" style="display:block;text-align:center;">
                                    <button type="submit" class="btn btn-success" >Update Slideshow</button>
                                </div>






    {!! Form::close() !!}



                <br />



    </div>








</div>



@stop