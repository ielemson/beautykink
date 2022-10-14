@foreach ($datas as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->sign }}</td>
        <td>{{ $data->value }}</td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->is_default == 1 ? 'success' : 'dark' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->is_default == 1 ? __('Default') : __('Set Default') }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route("backend.currency.status", [$data->id, 1]) }}">{{ __('Enable') }}</a>
                  <a class="dropdown-item" href="{{ route("backend.currency.status", [$data->id, 0]) }}">{{ __('Disable') }}</a>
                </div>
            </div>
        </td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.currency.edit',$data->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                @if ($data->id != 1)
                    <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                        data-title="{{ __('Confirm Delete?') }}"
                        data-text="{{ __('You are going to delete this Currency. All contents related with this Currency will be lost.') }} {{ __('Do you want to delete it?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Delete') }}"
                        data-href="{{ route('backend.currency.destroy', $data->id) }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                @endif
            </div>
        </td>
    </tr>
@endforeach
