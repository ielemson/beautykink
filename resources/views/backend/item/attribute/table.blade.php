@foreach ($datas as $data)
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->type }}</td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.attribute.edit',[$item->id, $data->id]) }}">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.option.index', $item->id) }}">
                    <i class="fas fa-tasks"></i> {{ __('Manage Options') }}
                </a>
                <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                    data-title="{{ __('Confirm Delete?') }}"
                    data-text="{{ __('You are going to delete this attribute. All contents related with this attribute will be lost.') }} {{ __('Do you want to delete it?') }}"
                    data-cancel_btn="{{ __('Cancel') }}"
                    data-ok_btn="{{ __('Delete') }}"
                    data-href="{{ route('backend.attribute.destroy', [$item->id, $data->id]) }}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
