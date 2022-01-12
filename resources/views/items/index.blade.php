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
                    <span>Data Item</span>
                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add new data
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
                                    <form method="post" action="/data/item/add">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Code</label>
                                            <input type="text" name="code" class="form-control" placeholder="Input Customer Code .." required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Input Customer Name .." required="">
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
                                <th>Code</th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $p)
                            <tr>
                                <td>{{ $p->code }}</td>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <button class="btn btn-warning btn-edit" data-id={{ $p->id }}>Edit</button>
                                    <button class="btn btn-danger btn-delete" data-id={{ $p->id }}>Delete</button>
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
                <h5 class="modal-title" id="modalEditLable">Edit Data Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/data/item/edit') }}" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Input Customer Code .." required="" id="code">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Input Customer Name .." required="" id="name">
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

<script>
    $(document).on('click','.btn-edit', function (e) {
        let id = $(this).data('id')
        $.ajax({
            method: 'POST',
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            url: "{{ route('item.find') }}",
            dataType: 'JSON',
            cache: false,
            data: {
                id : id
            },
            success: function(result) {
                $("#id").val(result.data.id)
                $("#code").val(result.data.code)
                $("#name").val(result.data.name)
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
                    url: "{{ route('item.delete') }}",
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
@endsection
