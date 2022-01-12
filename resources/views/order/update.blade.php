@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Order</div>
                    <div class="card-body">
                        <form method="post" action="/transaction/order/ubah/{{ $ord->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="{{ $ord->id }}">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="date" class="form-control" value="{{ $ord->date }}" placeholder="Date order .." required="">
                            </div>
                            <div class="form-group">
                                <label>Customer</label>
                                <select name="customer_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select Customer</option>
                                    @foreach($cust as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Subtotal</label>
                                <input type="text" id="subtotal" value="{{ $ord->subtotal }}" name="subtotal" class="form-control" placeholder="Subtotal .." required="">
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" id="discount" value="{{ $ord->discount }}" name="discount" class="form-control" placeholder="Discount .." required="">
                            </div>
                            <input type="hidden" id="total" name="total">
                            <input id="submit" type="submit" class="btn btn-primary push-top" value="Save">
                            <a href="{{ url('/transaction/order') }}" class="btn btn-secondary push-top">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#subtotal").keyup(function() {
    var total = $("#subtotal").val() - $("#discount").val();
    $("#total").val(total);  
    });
    $("#discount").keyup(function() {
    var total = $("#subtotal").val() - $("#discount").val();
    $("#total").val(total);  
    });
</script>
@endsection
