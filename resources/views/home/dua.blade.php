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
                <div class="card-header"><h3>Query 2</h3></div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($querydua as $qd)
                            <tr>
                                <td>{{ $qd->cust->code }}</td>
                                <td>{{ $qd->cust->name }}</td>
                                <td>{{ $qd->date }}</td>
                                <td>{{ $qd->orderitem->sum('qty') }}</td>
                                <td>{{ $qd->total }}</td>
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
