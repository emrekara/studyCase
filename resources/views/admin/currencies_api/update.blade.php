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
                            {{ Form::text('name',$row['name'],array('class'=>'form-control col-md-4 col-sm-12'),['required'=>true]) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Url <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::text('url',$row['url'],array('class'=>'form-control col-md-4 col-sm-12'),['required'=>true]) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Type <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::select('type',array('','json'=>'Json Api','xml'=>'XML Api'),$row['type'],array('class'=>'form-control col-md-4 col-sm-12','required'))}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Variable Path<br><span class="thumbText">Separate sub-elements with /. For example result/data</span></label>
                        <div class="col-md-10">
                            {{ Form::text('var_path',$row['var_path'],array('class'=>'form-control col-md-4 col-sm-12')) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Name Field <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::text('data_name',$row['data_name'],array('class'=>'form-control col-md-4 col-sm-12','required')) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Price Field <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::text('data_price',$row['data_price'],array('class'=>'form-control col-md-4 col-sm-12','required')) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Symbol Field <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::text('data_symbol',$row['data_symbol'],array('class'=>'form-control col-md-4 col-sm-12','required')) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Short Code Field <span class="requireStar">(*)</span></label>
                        <div class="col-md-10">
                            {{ Form::text('data_shortCode',$row['data_shortCode'],array('class'=>'form-control col-md-4 col-sm-12','required')) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Status <span class="requireStar">(*)</span></label>
                        <div class="col-md-10 col-12">
                            <label class="" for="radio1">
                                {{Form::radio('status',1,1==$row['status']?true:false,['class'=>'','id'=>'radio1'])}}&nbsp;&nbsp;&nbsp;
                                Active
                            </label><br>
                            <label class="" for="radio0">
                                {{Form::radio('status',0,0==$row['status']?true:false,['class'=>'','id'=>'radio0'])}}&nbsp;&nbsp;&nbsp;
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
