@if ($message = Session::get('berhasil'))
<div class="alert d alert-warning alert-block">
       <center><strong>{{ $message }}</strong></center> 
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert s alert-success alert-block">
       <center><strong>{{ $message }}</strong></center> 
</div>
@endif

@if ($message = Session::get('gagal'))
<div class="alert s alert-danger alert-block">
       <center><strong>{{ $message }}</strong></center> 
</div>
@endif