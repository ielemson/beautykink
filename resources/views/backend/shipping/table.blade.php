@foreach ($datas as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->title }}</td>
        <td>{{ $data->state->name}}</td>
        <td>{{ $data->city->name}}</td>
        <td>{{ $data->price == 0 ? __('Free') : PriceHelper::adminCurrencyPrice($data->price) }}</td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->status == 1 ? 'success' : 'danger' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->status == 1 ? __('Enabled') : __('Disabled') }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route("backend.shipping.status", [$data->id, 1]) }}">{{ __('Enable') }}</a>
                  <a class="dropdown-item" href="{{ route("backend.shipping.status", [$data->id, 0]) }}">{{ __('Disable') }}</a>
                </div>
            </div>
        </td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.shipping.edit',$data->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                    data-title="{{ __('Confirm Delete?') }}"
                    data-text="{{ __('You are going to delete this shipping. All contents related with this shipping will be lost.') }} {{ __('Do you want to delete it?') }}"
                    data-cancel_btn="{{ __('Cancel') }}"
                    data-ok_btn="{{ __('Delete') }}"
                    data-href="{{ route('backend.shipping.destroy', $data->id) }}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
