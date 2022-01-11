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
                    <span>Data Order Item</span>
                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add order item
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Input Data Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="#">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Code</label>
                                            <input type="text" name="code" class="form-control" placeholder="Input Item Code .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Input Item Name .." required="">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save">
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
                                <th>Order</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ord as $d)
                            <tr>
                                <td>{{ $d->order_id }}</td>
                                <td>{{ $d->item_id }}</td>
                                <td>{{ $d->qty }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->total }}</td>
                                <td>
                                    <a href="{{ url('/data/item/update') }}/{{ $d->no }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/data/item/delete') }}/{{ $d->no }}" class="btn btn-danger">Delete</a>
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