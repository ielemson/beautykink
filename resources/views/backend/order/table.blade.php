@foreach ($datas as $data)
    <tr id="product-bulk-delete">
        <td>
            <input type="checkbox" name="" class="bulk-item" value="{{ $data->id }}">
        </td>
        <td>{{ $data->id }}</td>
        <td>{{  $data->user->displayName() }}</td>
        <td>
            @if ($setting->currency_direction == 1)
                {{ $data->currency_sign }}{{ PriceHelper::orderTotal($data) }}
            @else
                {{ PriceHelper::orderTotal($data) }}{{ $data->currency_sign }}
            @endif
        </td>
        <td>
            <div class="input-group-prepend">
                <button {{$data->order_status === "Canceled" ? "disabled" : ""}} type="button" class="btn btn-{{ $data->payment_status == 'Paid' ? 'success' : 'danger' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->payment_status == 'Paid' ? __('Paid') : __('Unpaid') }}
                </button>
                <div class="dropdown-menu">
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('payment_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'payment_status', 'Paid']) }}">
                        {{ __('Paid') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('payment_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'payment_status', 'Unpaid']) }}">
                        {{ __('Unpaid') }}
                    </a>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->order_status == 'Pending' ? 'info': '' }}{{ $data->order_status == 'In Progress' ? 'secondary': '' }}{{ $data->order_status == 'Delivered' ? 'success': '' }}{{ $data->order_status == 'Canceled' ? 'danger': '' }}{{ $data->order_status == 'Shipped' ? 'primary': '' }}{{ $data->order_status == 'Verified' ? 'warning': '' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                    {{ $data->order_status }}
                </button>
                <div class="dropdown-menu">
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('Pending') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'Pending']) }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        >
                        {{ __('Pending') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('In Progress') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'In Progress']) }}">
                        {{ __('In Progress') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('Verified') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'Verified']) }}">
                        {{ __('Verified') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('Shipped') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'Shipped']) }}">
                        {{ __('Shipped') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('Delivered') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'Delivered']) }}">
                        {{ __('Delivered') }}
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item confirm-action" data-toggle="modal"
                        data-title="{{ __('Update Status?') }}"
                        data-id="{{$data->id}}"
                        data-field="{{__('order_status')}}"
                        data-text="{{ __('You are going to update the status') }} {{ __('Do you want proceed?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Update') }}"
                        data-update_type="{{ __('Canceled') }}"
                        data-action="{{ route('backend.order.status.update') }}"
                        data-href="{{ route('backend.order.status', [$data->id, 'order_status', 'Canceled']) }}">
                        {{ __('Canceled') }}
                    </a>
                </div>
            </div>
        </td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.order.invoice',$data->id) }}">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                    data-title="{{ __('Confirm Delete?') }}"
                    data-text="{{ __('You are going to delete this order. All contents related with this order will be lost.') }} {{ __('Do you want to delete it?') }}"
                    data-cancel_btn="{{ __('Cancel') }}"
                    data-ok_btn="{{ __('Delete') }}"
                    data-href="{{ route('backend.order.delete', $data->id) }}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>

    </tr>
@endforeach
