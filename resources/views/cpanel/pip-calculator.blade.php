@extends('cpanel.layout')
@section('content')
    <div class="table-responsive transactionHistory-table">
        <table class="pipCalcResults table table-responsive" id="results">
            <?php echo $calculator; ?>
        </table>
    </div>

    @section('script')
        <script type="text/javascript">
            $('table.pipCalcResults tr td:last-child').remove();
            $('table.pipCalcResults thead th:last-child').remove();
            $("table.pipCalcResults tr td a").removeAttr("href");
        </script>
    @stop
@stop
