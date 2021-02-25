@if (session()->has('success'))
<div class="container" style="padding:10px;">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Success! {{ session('success') }}</h5>
      
    </div>
</div>
@endif