@foreach ($datas as $data)
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->attribute }}: <img src="{{asset("uploads/items/attributes/$data->image")}}" alt=""> </td>
        <td>{{ $data->price == 0 ? __('Free') : PriceHelper::adminCurrencyPrice($data->price) }}</td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.option.edit',[$item->id, $data->id]) }}">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>
                <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                    data-title="{{ __('Confirm Delete?') }}"
                    data-text="{{ __('You are going to delete this option. All contents related with this option will be lost.') }} {{ __('Do you want to delete it?') }}"
                    data-cancel_btn="{{ __('Cancel') }}"
                    data-ok_btn="{{ __('Delete') }}"
                    data-href="{{ route('backend.option.destroy', [$item->id, $data->id]) }}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
