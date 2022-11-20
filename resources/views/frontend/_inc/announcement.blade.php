@if ($setting->is_announcement == 1)
<div class="modal fade" id="announcementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content modal-content-announcement">
        <div class="modal-header modal-header-announcement">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <a href="{{$setting->announcement_link}}" target="_blank" rel="noopener noreferrer">
                <img class="img-fluid" src="{{asset($setting->announcement)}}">
            </a>
        </div>
      </div>
    </div>
  </div>
@endif