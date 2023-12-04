<?php
    use Illuminate\Support\Facades\Storage;
?>

@extends('cpanel.layout')
@section('content')
    {!! Form::open(['url' => 'en/cpanel/documents', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
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

                <div class="card">
                    <div class="card-body">
                        <div class="theam-form mn-btn">
                            <div class="row">
                                <div class="col-md-6 pb-4 controls">
                                    <label for="document_type">Document Type:</label>

                                    <select class="form-control1" name="document_type" id="document_type" required>
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

                                <div class="col-md-6 pb-4">
                                    <label for="document">Select File:</label>

                                    <div class="input-group w-100">
                                        <span class="input-group-btn w-100">
                                            <span class="btn btn-file w-100" style=" padding: 0px; border: 0px; ">
                                                <input type="file" class="form-control1" id="document" name="document" accept="image/*,application/pdf" required>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-12 pb-4">
                                    <label for="percentage">Description:</label>

                                    <div class="controls">
                                        <textarea class="form-control1" name="document_description" placeholder="Description of Document" required style="height: 180px"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="openAccount-formBtn mn-btn">
                                        <input class="form-control1" type="submit" value="Upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    @if (count($documents) > 0)
    <div class="row mt-4">
        <div class="col-md-12">
            <div  class="transactionHistory-table">
                <div class="referral-system px-3 pt-3 mb-3 border-bottom">
                    <h6 class="pb-3"> Your Uploaded Documents</h6>
                </div>
                    <table class="table ">
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
                                    <td><a href="{{ Storage::disk('do')->url($document->document) }}" class="btn btn-success" target="__blank">View Document</a></td>
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
@stop
