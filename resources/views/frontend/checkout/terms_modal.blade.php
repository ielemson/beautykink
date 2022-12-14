
  
  <!-- Modal -->
  <div class="modal fade" id="termsAndConditionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="termsAndConditionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsAndConditionModal">Terms & Conditions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @php
            $page = DB::table('pages')->where('slug','terms-and-conditions')->first();
          @endphp

          @if ($page)
            {!!$page->details!!}
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>