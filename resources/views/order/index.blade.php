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
                                                @foreach($cust as $d)
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Subtotal</label>
                                            <input type="text" id="subtotal" name="subtotal" class="form-control" placeholder="Subtotal .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <input type="text" id="discount" name="discount" class="form-control" placeholder="Discount .." required="">
                                        </div>
                                            <input type="hidden" id="total" name="total">
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
                <h5 class="modal-title" id="modalEditLable">Edit Data Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/transaction/order/edit') }}" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" id="date1" name="date" class="form-control" placeholder="Date order .." required="">
                    </div>
                    <div class="form-group">
                        <label>Customer</label>
                        <select  id="customer_id1" name="customer_id" class="form-select" aria-label="Default select example">
                            @foreach($cust as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subtotal</label>
                        <input type="text" id="subtotal1" name="subtotal" class="form-control" placeholder="Subtotal .." required="">
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" id="discount1" name="discount" class="form-control" placeholder="Discount .." required="">
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
            url: "{{ route('order.find') }}",
            dataType: 'JSON',
            cache: false,
            data: {
                id : id
            },
            success: function(result) {
                $("#id").val(result.data.id)
                $("#date1").val(result.data.date)
                $("#costumer_id1").val(result.data.costumer_id)
                $("#subtotal1").val(result.data.subtotal)
                $("#discount1").val(result.data.discount)
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
                    url: "{{ route('order.delete') }}",
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
    $("#subtotal").keyup(function() {
    var total = $("#subtotal").val() - $("#discount").val();
    $("#total").val(total);  
    });
    $("#discount").keyup(function() {
    var total = $("#subtotal").val() - $("#discount").val();
    $("#total").val(total);  
    });

    $("#subtotal1").keyup(function() {
    var total = $("#subtotal1").val() - $("#discount1").val();
    $("#total1").val(total);  
    });
    $("#discount1").keyup(function() {
    var total = $("#subtotal1").val() - $("#discount1").val();
    $("#total1").val(total);  
    });
</script>
@endsection

