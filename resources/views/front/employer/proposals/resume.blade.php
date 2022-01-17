
<div class="resume_student">
  <div class="shown">
     @foreach ($cv as $item )
          <iframe src="{{asset('upload/' .$item->cv) }}"></iframe>
        @endforeach
  </div>
</div>
