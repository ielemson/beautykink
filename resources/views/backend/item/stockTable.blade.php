@foreach ($datas as $data)
    <tr id="product-bulk-delete">
        <td>
            <input type="checkbox" name="" class="bulk-item" value="{{ $data->id }}">
        </td>
        <td>
            <img src="{{ $data->thumbnail ? asset($data->thumbnail) : asset('backend/images/placeholder.png') }}" alt="Image Not Found">
        </td>
        <td>{{ $data->id }}</td>
        <td>{{ PriceHelper::adminCurrencyPrice($data->discount_price) }}</td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-{{ $data->status == 1 ? 'success' : 'danger' }} btn-sm dropdown-toggle" data-toggle="dropdown">
                  {{ $data->status == 1 ? __('Publish') : __('Unpublish') }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route("backend.item.status", [$data->id, 1]) }}">{{ __('Publish') }}</a>
                  <a class="dropdown-item" href="{{ route("backend.item.status", [$data->id, 0]) }}">{{ __('Unpublish') }}</a>
                </div>
            </div>
        </td>
        <td>
            <span class="badge badge-info">
                @if ($data->is_type == 'new')
                    {{ __('New') }}
                @else
                    {{ $data->is_type ? ucfirst(str_replace('_', '', $data->is_type)) : __('New') }}
                @endif
            </span>
        </td>
        <td>{{ ucfirst($data->reminders->count()) }}</td>
        <td>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    {{  __('Options') }}
                </button>
                <div class="dropdown-menu">

                    @if ($data->item_type == 'normal')
                     <a class="dropdown-item remind_me_when_restock" data-id={{$data->id}} href="javascript:;">
                        <i class="fas fa-angle-double-right"></i> {{ __('Re-Stock') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('backend.item.edit',$data->id) }}">
                        <i class="fas fa-angle-double-right"></i> {{ __('Edit') }}
                    </a>
                   
                    <a class="dropdown-item" href="{{ route('backend.item.copy',$data->id) }}">
                        <i class="fas fa-angle-double-right"></i> {{ __('Copy') }}
                    </a>
                    @endif
                    @if ($data->status == 1)
                        <a class="dropdown-item" href="{{ route('frontend.product', $data->slug) }}" target="_blank">
                            <i class="fas fa-angle-double-right"></i> {{ __('View') }}
                        </a>
                    @endif
                    {{-- @if ($data->item_type == 'normal')
                        <a class="dropdown-item" href="{{ route('backend.attribute.index', $data->id) }}">
                            <i class="fas fa-angle-double-right"></i> {{ __('Attributes') }}
                        </a>
                    @endif --}}
                    {{-- <a class="dropdown-item" href="{{ route('backend.item.gallery', $data->id) }}">
                        <i class="fas fa-angle-double-right"></i> {{ __('Gallery Images') }}
                    </a> --}}
                    {{-- <a class="dropdown-item" href="{{ route('backend.item.highlight', $data->id) }}">
                        <i class="fas fa-angle-double-right"></i> {{ __('Highlight') }}
                    </a> --}}
                    <a href="javascript:void(0)" class="dropdown-item delete-record" data-toggle="modal"
                        data-title="{{ __('Confirm Delete?') }}"
                        data-text="{{ __('You are going to delete this item. All contents related with this item will be lost.') }} {{ __('Do you want to delete it?') }}"
                        data-cancel_btn="{{ __('Cancel') }}"
                        data-ok_btn="{{ __('Delete') }}"
                        data-href="{{ route('backend.item.destroy', $data->id) }}">
                        <i class="fas fa-angle-double-right"></i> {{ __('Delete') }}
                    </a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
