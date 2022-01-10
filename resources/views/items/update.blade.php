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
                    <span>Edit Data Item</span>
                </div>
                <div class="card-body">
                <form method="post" action="{{ url('/data/item/edit') }}/{{ $items->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Code Item .." value="{{ $items->code }}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name Item .." value="{{ $items->name }}">
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
