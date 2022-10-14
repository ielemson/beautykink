@foreach ($datas as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->language }}</td>
        <td>
            @if ($data->rtl == 0)
                {{ __('LTR') }}
            @else
                {{ __('RTL') }}
            @endif
        </td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->is_default == 1 ? 'success' : 'danger' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->is_default == 1 ? __('Active') : __('Deactive') }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route("backend.language.status", [$data->id, 1]) }}">{{ __('Active') }}</a>
                  <a class="dropdown-item" href="{{ route("backend.language.status", [$data->id, 0]) }}">{{ __('Deactive') }}</a>
                </div>
            </div>
        </td>
        <td>
            <div class="btn-group">
                <a class="btn btn-info btn-sm mr-1"
                    href="{{ route('backend.language.edit',$data->id) }}">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>
            </div>
        </td>
    </tr>
@endforeach
