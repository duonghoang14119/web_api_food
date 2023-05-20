@extends('admin.layouts.master')
@section('content')
    <style>
        .success {
            color: #155724;
            font-weight: bold;
        }
        .danger {
            color: #721c24;
            font-weight: bold;
        }
        .default {color: #383d41; font-weight: bold}
        .warning {color: #856404; font-weight: bold}
    </style>
    <div class="col-lg-11">
        <section class="py-4 py-lg-5">
            <h3 class="display-5 mb-3">Đơn hàng</h3>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="profile">
                            <!--end of avatar-->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Người nhận</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Số SP</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">Thanh toán</th>
                                        <th scope="col">Vận chuyển</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    @foreach($orders ?? [] as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>
                                                <ul>
                                                    <li>{{ $item->receiver_name }}</li>
                                                    <li>{{ $item->receiver_phone }}</li>
                                                    <li>{{ $item->receiver_address }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                {{ number_format($item->total_money,0,',','.') }} đ
                                                @if($item->discount)
                                                    <br>
                                                    <span>- {{ number_format($item->discount,0,',','.') }} đ</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->transactions_count }} SP</td>
                                            <td>{{ $item->note }}</td>
                                            <td>
                                                <span class="{{ $item->getStatus($item->status)['class'] ?? "" }}">{{ $item->getStatus($item->status)['name'] ?? "" }}</span>
                                            </td>
                                            <td>
                                                <span class="{{ $item->getStatusShippingConfig($item->shipping_status)['class'] ?? "" }}">{{ $item->getStatusShippingConfig($item->shipping_status)['name'] ?? "" }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('get_admin.order.update', $item->id) }}">Cập nhật</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
