@if (session()->has('message'))

<div >
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-primary mt-3 px-" style="width: 70%;">
    <h6>
      {{session('message')}}
    </h6>
  </div>
</div>

@endif
