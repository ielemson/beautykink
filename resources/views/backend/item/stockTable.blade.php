@foreach ($datas as $data)
    <tr id="product-bulk-delete">
        {{-- <td>
            <input type="checkbox" name="" class="bulk-item" value="{{ $data->id }}">
        </td> --}}
        <td>
            <img src="{{ $data->thumbnail ? asset($data->thumbnail) : asset('backend/images/placeholder.png') }}" alt="Image Not Found">
        </td>
        <td>{{ $data->name }}</td>
        {{-- <td>{{ PriceHelper::adminCurrencyPrice($data->discount_price) }}</td> --}}
        {{-- <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->status == 1 ? 'success' : 'danger' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->status == 1 ? __('Publish') : __('Unpublish') }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route("backend.item.status", [$data->id, 1]) }}">{{ __('Publish') }}</a>
                  <a class="dropdown-item" href="{{ route("backend.item.status", [$data->id, 0]) }}">{{ __('Unpublish') }}</a>
                </div>
            </div>
        </td> --}}
        {{-- <td> --}}
            {{-- <span class="badge badge-info">
                @if ($data->is_type == 'new')
                    {{ __('New') }}
                @else
                    {{ $data->is_type ? ucfirst(str_replace('_', '', $data->is_type)) : __('New') }}
                @endif
            </span> --}}
            {{-- @foreach ($data->highlights as $highlight)
            <span class="badge badge-info">
                {{$highlight->name}}
            </span>
            @endforeach --}}
        {{-- </td> --}}
        <td>{{ ucfirst($data->reminders->count()) }}</td>
        <td>
            <a class="btn btn-primary btn-sm remind_me_when_restock" data-id={{$data->id}} href="javascript:;">
                {{ __('Re-Stock') }}
            </a>
        </td>
    </tr>
@endforeach
