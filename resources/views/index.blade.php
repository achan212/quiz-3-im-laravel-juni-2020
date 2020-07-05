@extends('layouts.master')

@section('content')
<a href="/artikel/create" class="btn btn-sm btn-primary">Buat artikel baru</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Isi</th>
      <th scope="col">Slug</th>
      <th scope="col">Tag</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($artikels as $key=>$art)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$art->judul}}</td>
      <td>{{$art->isi}}</td>
      <td>{{$art->slug}}</td>
      <td>{{$art->tag}}</td>
      <td>
      <a href="/artikel/{{$art->id}}" class="btn btn-sm btn-info">Show</a>
      <a href="/artikel/{{$art->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
        <form action="/artikel/{{$art->id}}" method="POST" style="display:inline">
          @csrf
          @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@push('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush 