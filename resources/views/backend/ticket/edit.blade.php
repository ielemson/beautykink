@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Ticket Trail') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
                <div class="card-header ui-sortable-handle" >
                    <h3 class="card-title"> {{__('Subject :')}} {{ $ticket->subject }}</h3>
                    <span class="badge badge-primary ml-2">{{ $ticket->status }}</span>

                    <div class="card-tools">
                        @if ($ticket->file)
                            <a href="{{ asset($ticket->file) }}" title="Download" download="" type="button" class="btn btn-info btn-sm float-right ml-2"><i class="fa fa-download"></i> {{ __('Attachment') }}</a>
                        @endif
                        @if ($ticket->status != 'Closed')
                            <a href="{{ route('backend.ticket.status', $ticket->id) }}" type="button" class="btn btn-danger btn-sm float-right"><i class="fa fa-times"></i> {{ __('Ticket Close') }}</a>
                        @else
                            <span class="badge badge-danger">{{ __('Closed') }}</span>
                        @endif
                    </div>
                  </div>
                <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.ticket.update', $ticket->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                    <div class="col-md-12">
                      <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">  {{ $ticket->created_at->diffForHumans() }}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  {{-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> --}}
                  <h3 class="timeline-header"><a href="#">{{ $ticket->user->first_name }}</a> sent you a ticket</h3>

                  <div class="timeline-body">
                   {!! $ticket->message !!}
                  </div>
                  
                </div>
              </div>

              @if ($ticket->messages->count() > 0)
              @foreach ($ticket->messages as $message)
              <!-- timeline item -->
              @if ($message->user_id == 0)
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{ $message->created_at->diffForHumans() }}</span>
                  <h3 class="timeline-header no-border"><a href="#">{{ __('Admin') }}</a> Replied</h3>
                  <div class="timeline-body">
                 {!! $message->message!!}
                  </div>
                </div>
              </div>
           
              <!-- timeline item -->
              @else
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{ $message->created_at->diffForHumans() }}</span>
                  <h3 class="timeline-header no-border"><a href="#">{{ $ticket->user->first_name }}</a> Replied</h3>
                  <div class="timeline-body">
                 {!! $message->message!!}
                  </div>
                </div>
              </div>
              @endif
              @endforeach
              @endif
          
            
              @if ($ticket->status != 'Closed')
                  <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
              @else
              <div class="time-label">
                <span class="bg-green">Ticket Closed</span>
              </div>
              @endif
            </div>
                        {{-- @if ($ticket->messages->count() > 0)
                            @foreach ($ticket->messages as $message)
                                @if ($message->user_id == 0)
                                    <div class="callout">
                                        <h5>{{ __('Admin') }}</h5> <span class="direct-chat-timestamp">{{__('Posted on')}} {{ $message->created_at->diffForHumans() }}</span>
                                        <p class="p-3">{{ $message->message }}</p>
                                    </div>
                                @else
                                <div class="callout">
                                    <h5>{{ $ticket->user->first_name }}</h5> <span class="direct-chat-timestamp">{{__('Posted on')}} {{ $message->created_at->diffForHumans() }}</span>
                                    <p class="p-3">{{ $message->message }}</p>
                                </div>
                                @endif
                            @endforeach
                        @endif --}}
                    </div>
                    @if ($ticket->status != 'Closed')
                        <div class="form-group  col-md-12">
                        <label for="message">{{ __('Respond') }} *</label>
                        <textarea type="text" name='message' id="message" class='form-control' placeholder="{{ __('Type your response here...') }}" required>{{ old('message') }}</textarea>
                        </div>
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ route("backend.ticket.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  @if ($ticket->status != 'Closed')
                    <button type="submit" class="btn btn-primary">{{ __('Reply') }}</button>
                  @endif
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
