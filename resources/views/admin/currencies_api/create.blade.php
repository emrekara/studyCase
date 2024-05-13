@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="return_link">
                        <a href="{{$page_topLink}}" class="btn btn-primary listButton" title="Return to List"><i class="fas fa-align-justify"></i></a>
                    </div>
                    {!! Form::open(['method'=>'post','class'=>'create_form']) !!}
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Name <span class="requireStar">(*)</span></label>
                            <div class="col-md-10">
                                {{ Form::text('name',old('name')?:null,array('class'=>'form-control col-md-4 col-sm-12'),['required'=>true]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Url <span class="requireStar">(*)</span></label>
                            <div class="col-md-10">
                                {{ Form::text('url',old('url')?:null,array('class'=>'form-control col-md-4 col-sm-12'),['required'=>true]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Type <span class="requireStar">(*)</span></label>
                            <div class="col-md-10">
                                {{ Form::select('type',array('','json'=>'Json Api','xml'=>'XML Api'),old('type')?:null,array('class'=>'form-control col-md-4 col-sm-12','required'))}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Variable Path<br><span class="thumbText">Separate sub-elements with /. For example result/data</span></label>
                            <div class="col-md-10">
                                {{ Form::text('var_path',old('var_path')?:null,array('class'=>'form-control col-md-4 col-sm-12')) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Status <span class="requireStar">(*)</span></label>
                            <div class="col-md-10 col-12">
                                <label class="" for="radio1">
                                    {{Form::radio('status',1,old('status')?(1==old('status')?true:false):1,['class'=>'','id'=>'radio1'])}}&nbsp;&nbsp;&nbsp;
                                    Active
                                </label><br>
                                <label class="" for="radio0">
                                    {{Form::radio('status',0,old('status')?(0==old('status')?true:false):null,['class'=>'','id'=>'radio0'])}}&nbsp;&nbsp;&nbsp;
                                    Passive
                                </label>
                            </div>
                        </div>
                        {{Form::submit('Save',['name'=>'save','class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
