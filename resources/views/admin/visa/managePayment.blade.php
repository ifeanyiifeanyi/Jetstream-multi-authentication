@extends('admin.layouts.app')

@section('title', 'Payment Methods')
@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> @yield('title') </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Payment Method
                        </div>
                        <div class="card-body">

                            <form
                                action="{{ isset($edit_payment) ? route('manage.payments.update', $edit_payment->id) : route('manage.payments.store') }}"
                                method="post">
                                @csrf
                                @if(isset($edit_payment))
                                    @method('PUT')
                                @endif

                                <div class="form-group">
                                    <label for="payment_type">Payment Type</label>
                                    <input type="text" name="payment_type" class="form-control"
                                        placeholder="Bank or Crypto Wallet"
                                        value="{{ isset($edit_payment) ? $edit_payment->payment_type : old('payment_type') }}">
                                    @error('payment_type')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="payment_name">Payment Name</label>
                                    <input type="text" name="payment_name" class="form-control"
                                        placeholder="Eg. Bitcoin, Perfect Money, Etheremum"
                                        value="{{ isset($edit_payment) ? $edit_payment->payment_name : old('payment_name') }}">
                                    @error('payment_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="payment_account">Payment Account</label>
                                    <input type="text" name="payment_account" class="form-control"
                                        placeholder="Account Number, Wallet Address"
                                        value="{{ isset($edit_payment) ? $edit_payment->payment_account : old('payment_account') }}">
                                    @error('payment_account')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">
                                        <input {{ isset($edit_payment) ? $edit_payment->status ? 'checked' : '' : '' }}
                                        type="checkbox" name="status" id="status"> Status
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">{{ isset($edit_payment) ? 'Update' : 'Create'
                                    }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                           
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Payment Type </th>
                                        <th>Payment Name</th>
                                        <th>Payment Wallet Or Account Number</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($payments->count())
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucwords($payment->payment_type) }}</td>
                                        <td>{{ ucwords($payment->payment_name) }}</td>
                                        <td>{{ ucwords($payment->payment_account) }}</td>
                                        <td><a href="{{ route('manage.payments.edit', $payment->id) }}"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form id="delete" action="{{ route('manage.payments.destroy', $payment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-transparent border-transparent"><i class="fas fa-trash fa-1x text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                    <p>No Data</p>
                                    @endif
                                </tbody>



                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection


@section('scripts')

<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).data("id");
            console.log({
                link
            });

            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($("#delete").submit()) {
                        Swal.fire(
                            'Deleted!'
                            , 'Value deleted.'
                            , 'success'
                        )
                    }
                }
            })
        })

    })

</script>
@endsection