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
                <div class="card-header"><h3>Query</h3></div>

                <div class="card-body">
                    <h5>Query 1</h5>                    
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
                                <td>{{ $qs->code }}</td>
                                <td>{{ $qs->name }}</td>
                                <td>{{ $qs->qtys }}</td>
                                <td>{{ $qs->subtotal }}</td>
                                <td>{{ $qs->discount }}</td>
                                <td>{{ $qs->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5>Query 2</h5>                    
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
                            
                        </tbody>
                    </table>
                    <h5>Query 3</h5>                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Avg</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
