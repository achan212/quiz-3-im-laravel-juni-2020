@extends('layouts.master')

@section('content')
<h5>Judul: {{$artikel->judul}}</h5>
<h6>slug: {{$artikel->slug}}</h6>
<h6>{{$artikel->isi}}</h6>

@foreach(explode(' ', $artikel->tag) as $tag1) 
  <button class="btn btn-sm btn-success">{{$tag1}}</button>
@endforeach
<br /><br />
<a href="/artikel" class="btn btn-primary">Back</a>

@endsection