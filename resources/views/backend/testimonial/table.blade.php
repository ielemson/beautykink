
@foreach ($datas as $data)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $data->user->first_name }}</td>
    <td>
        @if ($data->status == 1)
        <span class="badge badge-primary">
            Published
        </span>
    @else
    <span class="badge badge-danger">
       Not Published
    </span>
    @endif

    </td>
    <td>
        <div class="input-group-prepend">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Set Status
            </button>
            <div class="dropdown-menu" style="">
              <a class="dropdown-item" href="{{route('backend.testimonial.publish',$data->id)}}">Publish</a>
              <a class="dropdown-item" href="{{route('backend.testimonial.unpublish',$data->id)}}">Unpublish</a>
            </div>
        </div>
    </td>
    <td>
        <div class="btn-group">
            <a class="btn btn-info btn-sm mr-1"
                href="{{ route('backend.testimonial.edit',$data->id) }}">
                <i class="fas fa-eye"></i>
            </a>
            <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                data-title="{{ __('Confirm Delete?') }}"
                data-text="{{ __('You are going to delete this Testimonial. All contents related with this Testimonial will be lost.') }} {{ __('Do you want to delete it?') }}"
                data-cancel_btn="{{ __('Cancel') }}"
                data-ok_btn="{{ __('Delete') }}"
                data-href="{{ route('backend.testimonial.destroy', $data->id) }}">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </td>
</tr>
@endforeach
