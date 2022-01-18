
<div class="resume_student">
  <div class="shown">
     @foreach ($data as $item )
          <embed src="{{ asset('upload/' .$item->cv) }}" width="700" height="850" alt="pdf" />
        @endforeach
  </div>
</div>
