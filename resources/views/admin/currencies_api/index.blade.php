@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body listContent">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('admin.currencies_api.create')}}" class="btn btn-primary button">Create</a>
                        </div>
                    </div>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0">
                            {!! Form::open(['url'=>route('admin.currencies_api.index'),'method'=>'post','class'=>'index_form']) !!}
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th width="40">
                                            <label class="custom-control custom-checkbox toogleCheckbox" id="id">
                                                {{Form::checkbox(null,null,null,['class'=>'custom-control-input','onclick'=>"$('.toggle').prop('checked',this.checked)"])}} <span class="custom-control-label"></span>
                                            </label>
                                        </th>
                                        <th>Api</th>
                                        <th>Url</th>
                                        <th>Variable Path</th>
                                        <th>Name Field</th>
                                        <th>Price Field</th>
                                        <th>Symbol Field</th>
                                        <th>Short Code Field</th>
                                        <th>Status</th>
                                        <th>Transactions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($list)>0)
                                        @foreach($list as $item)
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox toogleCheckboxItem">
                                                        <input type="checkbox" name="id[]" value="{{$item->id}}" class="custom-control-input toggle"> <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->url}}</td>
                                                <td>{{$item->var_path}}</td>
                                                <td>{{$item->type}}</td>
                                                <td>{{$item->data_name}}</td>
                                                <td>{{$item->data_price}}</td>
                                                <td>{{$item->data_symbol}}</td>
                                                <td>{{$item->data_shortCode}}</td>
                                                <td>
                                                    @if($item->status==1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Passive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.currencies_api.edit',[$item->id])}}" class="btn btn-warning btn-xs editButton"><i class="fa fa-pencil-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Data not found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    @if(count($list)>=0)
                                        <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" name="selectedDelete" class="btn btn-danger btn-xs deleteBtn" value="Selected Delete" onclick="return confirm('Are you sure you want to delete the selected ones?')">
                                            </td>
                                        </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if(count($list)>=0)
                                {{ $list->links() }}
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection
@section('js')
@endsection
