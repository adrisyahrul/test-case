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
                <div class="card-header"><h3>Query 3</h3></div>

                <div class="card-body">
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
                            @foreach($querytiga as $qt)
                            <tr>
                                <td>{{ $qt->code }}</td>
                                <td>{{ $qt->name }}</td>
                                <td>{{ $qt->orderitemm->sum('qty') }}</td>
                                <td>{{ $qt->orderitemm->avg('price') }}</td>
                                <td>{{ $qt->orderitemm->sum('total') }}</td>
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
