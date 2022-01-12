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
                                    <h5 class="modal-title" id="exampleModalLabel">Input Data Order Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('transaction/orderitem/add') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Order ID</label>
                                            <select name="order_id" class="form-select" aria-label="Default select example">
                                                <option selected>Select Item</option>
                                                @foreach($order as $s)
                                                <option value="{{ $s->id }}">{{ $s->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-select" aria-label="Default select example">
                                                <option selected>Select Item</option>
                                                @foreach($item as $d)
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" id="qty" name="qty" class="form-control" placeholder="Subtotal .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Discount .." required="">
                                        </div>
                                            <input type="hidden" id="total" name="total" readonly>
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
                                <td>{{ $d->itemm->code }}</td>
                                <td>{{ $d->qty }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->total }}</td>
                                <td>
                                    <button class="btn btn-warning btn-edit" data-id={{ $d->id }}>Edit</button>
                                    <button class="btn btn-danger btn-delete" data-id={{ $d->id }}>Delete</button>
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
{{-- modal edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLable">Edit Data Order Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('transaction/orderitem/edit') }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Order ID</label>
                        <select id="order_id" name="order_id" class="form-select" aria-label="Default select example">
                            @foreach($order as $s)
                            <option value="{{ $s->id }}">{{ $s->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Item</label>
                        <select id="item_id" name="item_id" class="form-select" aria-label="Default select example">
                            @foreach($item as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" id="qty1" name="qty" class="form-control" placeholder="Subtotal .." required="">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="price1" name="price" class="form-control" placeholder="Discount .." required="">
                    </div>
                    <input type="hidden" id="total1" name="total">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.btn-edit', function (e) {
        let id = $(this).data('id')
        $.ajax({
            method: 'POST',
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            url: "{{ route('orderitem.find') }}",
            dataType: 'JSON',
            cache: false,
            data: {
                id : id
            },
            success: function(result) {
                $("#id").val(result.data.id)
                $("#order_id").val(result.data.order_id)
                $("#item_id").val(result.data.item_id)
                $("#qty1").val(result.data.qty)
                $("#price1").val(result.data.price)
                $("#total1").val(result.data.total)
                $("#modalEdit").modal('show')
            },
            error: function(err){
                console.log(err)
            }
        });
    })
    $(document).on('click','.btn-delete', function (e) {
        let id = $(this).data('id')
        Swal.fire({
            title: 'Are you sure to delete this?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    },
                    url: "{{ route('orderitem.delete') }}",
                    dataType: 'JSON',
                    cache: false,
                    data: {
                        id : id
                    },
                    success: function(result) {
                        window.location.reload()
                    },
                    error: function(err){
                        console.log(err)
                    }
                });

            } else {
            }
        })
        
        
    })
</script>

<script>
$("#qty").keyup(function() {
var total = $("#qty").val() * $("#price").val();
$("#total").val(total);  
});
$("#price").keyup(function() {
var total = $("#qty").val() * $("#price").val();
$("#total").val(total);  
});

$("#qty1").keyup(function() {
var total = $("#qty1").val() * $("#price1").val();
$("#total1").val(total);  
});
$("#price1").keyup(function() {
var total = $("#qty1").val() * $("#price1").val();
$("#total1").val(total);  
});
</script>
@endsection
