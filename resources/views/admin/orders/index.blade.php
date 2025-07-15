@extends('layout.app')
@section('title')
<title>Admin | Orders</title>
@stop
@section('content')
    <div class="container p-t-100">
        <h2 class="mb-4 mt-5">Order List</h2>
        @if ($errors->has('success'))
            <div class="alert alert-success mt-3">{{ $errors->first('success') }}</div>
        @endif
        @if ($errors->has('error'))
            <div class="alert alert-danger mt-3">{{ $errors->first('error') }}</div>
        @endif
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#ID</th>
                    <th>Customer</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                @if($orders->isNotEmpty())
                    @foreach ($orders as $order)

                        <tr>
                            <td>{{ $order->order_no ?? '' }}</td>
                            <td>{{ $order->user->name ?? '' }}</td>
                            <td>
                                <ul class="mb-0 pl-3">
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($order->items as $item)
                                        @php
                                            $total += $item->product->price  * $item->quantity;
                                        @endphp
                                        <li>{{ $item->product->title }} (x{{ $item->quantity }})</li>
                                    @endforeach
                                </ul>
                            </td>
                             <td>{{ $total ?? '0' }}</td>
                            <td>
                                @php
                                    $statusClasses = [
                                        'Pending' => 'badge-warning',
                                        'Processing' => 'badge-primary',
                                        'Completed' => 'badge-success',
                                        'Cancelled' => 'badge-danger',
                                    ];
                                @endphp
                                <span class="badge {{ $statusClasses[$order->status] ?? 'badge-secondary' }}">
                                    {{ $order->status ?? '' }}
                                </span>
                            </td>

                            <td>
                           <form method="POST" action="{{ route('admin.orders',$order->id) }}">
                                @csrf
                                <select class="form-control form-control-sm" name="status" onchange="this.form.submit()">

                                    <option value="Pending"
                                        {{ $order->status == 'Pending' ? 'selected' : '' }}
                                        {{ in_array($order->status, ['Processing', 'Completed', 'Cancelled']) ? 'disabled' : '' }}>
                                        Pending
                                    </option>

                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}
                                        {{ in_array($order->status, ['Completed', 'Cancelled']) ? 'disabled' : '' }}>
                                        Processing
                                    </option>

                                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }} 
                                        {{ in_array($order->status, ['Cancelled']) ? 'disabled' : '' }}>
                                        Completed
                                    </option>

                                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>

                                </select>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6" class="text-center"> No Order Found</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@stop