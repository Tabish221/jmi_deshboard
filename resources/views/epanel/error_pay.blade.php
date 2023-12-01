

@extends('cpanel.layoutt')
@section('content')


<style>
  h1{
      padding-top: 100px;
      font-size: 50px;
      text-align: center;
      color:  #aa1c2a;
      font-family: Helvetica, sans-serif;
  }
</style>
<h1> Error Transaction</h1>
<h1>
    <?php echo $error_message; ?>
    <?php echo $error_code; ?>
  </h1>

  @endsection