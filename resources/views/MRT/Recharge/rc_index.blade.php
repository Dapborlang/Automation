<!-- created by RDMarwein -->
@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container">
    <div class="card bg-secondary text-white">
        <div class="card-header bg-info">Recharge Report</div>
        <form  method="POST" action="{{ url('/') }}/mrt/rc_print" target="_BLANK">
        {{ csrf_field() }}
            <div class="card-body">	
                <div class="row">
                    <div class="col-sm-6" id="">
                        <div class="form-group">
                            <label for="agent">Select Agent</label>
                            <select name="agent" id="agent" class="form-control">
                                <option value="">Show All</option>
                                @foreach ($agent as $item)
                                    <option value="{{$item->id}}">{{$item->kyrteng}}</option>
                                @endforeach
                            </select>                        
                        </div>
                    </div>

                    <div class="col-sm-6" id="">
                        <div class="form-group">
                            <label for="receipt">Select Month</label>
                            <input type="month" class="form-control" id="month" name="month" required>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="offset-md-5">
                    <button type="submit" class="btn btn-sm btn-info">Print</button>
                </div>
            </div>
        </div>
	</form>
</div>
@endsection