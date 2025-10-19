@extends('layouts.app')
@section('content')
<ul>
  <li><a href="{{ route('counter') }}">カウンター</a></li>
  <li><a href="{{ route('photo-uploader') }}">画像アップローダー</a></li>
</ul>
@endsection
