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
                    <span>Data Order</span>
                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add order
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Input Data Order</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('transaction/order/add') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="text" name="date" class="form-control" placeholder="Date order .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Customer</label>
                                            <select name="customer_id" class="form-select" aria-label="Default select example">
                                                <option selected>Select Customer</option>
                                                @foreach($ord as $d)
                                                <option value="{{ $d->cust->id }}">{{ $d->cust->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Subtotal</label>
                                            <input type="text" name="subtotal" class="form-control" placeholder="Subtotal .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <input type="text" name="discount" class="form-control" placeholder="Discount .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" name="total" class="form-control" placeholder="Total .." required="">
                                        </div>
                                        <!-- <input type="hidden" id="total" name="total"> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input id="submit" type="submit" class="btn btn-primary" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>SubTotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ord as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->date }}</td>
                                <td>{{ $d->cust->code }}</td>
                                <td>{{ $d->subtotal }}</td>
                                <td>{{ $d->discount }}</td>
                                <td>{{ $d->total }}</td>
                                <td>
                                    <a href="{{ url('/transaction/order/update') }}/{{ $d->id }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/transaction/order/delete') }}/{{ $d->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
