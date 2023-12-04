<?php
    use Illuminate\Support\Facades\Storage;
?>

@extends('cpanel.layout')
@section('content')
    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $title }}</h4>
            </div>

            <div class="panel-body">
                <!--start content -->
                {!! Form::open(['url' => 'en/cpanel/documents', 'files' => true]) !!}
                <h4 class="col-sm-push-1">Profile Documents</h4>
                <div>
                    <div class="col-sm-6 col-sm-push-1">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('status-error'))
                            <div class="alert alert-warning">
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <label class="col-sm-4">Document Type</label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <select class="form-control" name="document_type" id="document_type" required>
                                        <option value="">- Select -</option>
                                        <optgroup label="Proof of ID">
                                            <option value="0">National Identity Card</option>
                                            <option value="1">Passport</option>
                                            <option value="2">Driver's License</option>
                                        </optgroup>
                                        <optgroup label="Proof of address">
                                            <option value="3">Bank account statement</option>
                                            <option value="4">Credit Card Statement</option>
                                            <option value="5">Phone Bill</option>
                                            <option value="6">Electricity bill</option>
                                        </optgroup>
                                        <optgroup label="Card Scans">
                                            <option value="7">Credit Card Scan</option>
                                        </optgroup>


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4">Select File</label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file" style=" padding: 0px; border: 0px; ">
                                                <input type="file" class="form-control" id="document" name="document" accept="image/*,application/pdf" required>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4">Description</label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <textarea class="form-control" name="document_description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8 ">
                                <div class="controls">
                                    <input class="btn btn-success form-control" type="submit" value="Upload" />
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-sm-12">
                    @if (count($documents) > 0)
                        <h4 class="col-sm-push-1"> Your Uploaded Documents</h4>
                        <div>
                            <div class="col-sm-10 col-sm-push-1">
                                <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>File Type</td>
                                                <td>File</td>
                                                <td>Description</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                $types = ['National Identity Card', 'Passport', 'Driver License', 'Bank account statement', 'Credit Card Statement', 'Phone Bill', 'Electricity bill', 'Credit Card Scan', 'Customer Account Agreement'];
                                                $status = ['Reviewing', 'Approved'];
                                            ?>
                                            @foreach ($documents as $document)
                                                <tr>
                                                    <td>{!! $i !!}</td>
                                                    <td>{!! $types[$document->type] !!}</td>
                                                    <td><a href="{{ Storage::disk('do')->url($document->document) }}"
                                                            class="btn btn-success" target="__blank">View Document</a></td>
                                                    <td>{!! $document->description !!}</td>
                                                    <td
                                                        class="@if ($document->status == 0) text-danger @endif @if ($document->status == 1) text-success @endif">
                                                        {!! $status[$document->status] !!}</td>
                                                    @if ($document->type !== 8)
                                                        {!! Form::open([
                                                            'url' => 'en/cpanel/documents/' . $document->id,
                                                            'method' => 'delete',
                                                            'onsubmit' => 'return confirmDelete()',
                                                        ]) !!}
                                                        <td><button class="btn btn-success" type="submit">Delete</button>
                                                        </td>
                                                        {!! Form::close() !!}
                                                    @else
                                                        <td></td>
                                                    @endif

                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
        </script>
    </div>
@stop
