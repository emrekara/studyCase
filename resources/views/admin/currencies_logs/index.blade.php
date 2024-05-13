@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body listContent">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($list)>0)
                                    @foreach($list as $item)
                                        <tr>
                                            <td>{{$item->name.' ('.$item->code.')'}}</td>
                                            <td>{{$item->symbol.' '.$item->amount.''}}</td>
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
