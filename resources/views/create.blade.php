@extends('layouts.master')

@section('content')
<form action="/artikel" method="POST">
  @csrf
  <div class="form-group">
    <label for="judul">Judul artikel</label>
    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul..." required>
  </div>
  <div class="form-group">
    <label for="isi">Isi artikel</label>
    <textarea class="form-control" id="isi" name="isi" rows="3" placeholder="Isi..." required></textarea>
  </div>
  <div class="form-group">
    <label for="tag">TAG</label>
    <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag (pisahkan dengan spasi)" required>
  </div>
  <input type="hidden" name="user_id" value="1">
  <button type="submit" class="btn btn-primary">Kirim</Button>
</form>
@endsection