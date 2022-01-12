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
                <div class="card-header">                    
                    <span>Edit Data Order</span>
                </div>
                <div class="card-body">
                <form method="post" action="{{ url('/transaction/order/edit') }}/{{ $ord->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="date" class="form-control" placeholder="Date order .." required="" value="{{ $ord->date }}">
                    </div>
                    <div class="form-group">
                        <label>Customer</label>
                        <select name="customer_id" class="form-select" aria-label="Default select example">
                            <option selected>Select Customer</option>
                            <option value="{{ $ord->cust->id }}">{{ $ord->cust->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subtotal</label>
                        <input type="text" name="subtotal" class="form-control" placeholder="Subtotal .." required="" value="{{ $ord->subtotal }}">
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" name="discount" class="form-control" placeholder="Discount .." required="" value="{{ $ord->discount }}">
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="total" class="form-control" placeholder="Total .." required="" value="{{ $ord->total }}">
                    </div>
                    <div class="form-group push-top">
                        <input type="submit" class="btn btn-warning btn-form-test" value="Update">
                        <a class="btn btn-secondary btn-form-test" href="{{ url('/data/item') }}">Cancel</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
