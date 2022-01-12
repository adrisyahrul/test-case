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
                <div class="card-header"><h3>Query 1</h3></div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Customer Name</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($querysatu as $qs)
                            <tr>
                                <td>{{ $qs->id }}</td>
                                <td>{{ $qs->date }}</td>
                                <td>{{ $qs->cust->code }}</td>
                                <td>{{ $qs->cust->name }}</td>
                                <td>{{ $qs->orderitem->sum('qty') }}</td>
                                <td>{{ $qs->subtotal }}</td>
                                <td>{{ $qs->discount }}</td>
                                <td>{{ $qs->total }}</td>
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
