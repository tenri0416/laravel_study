@extends('layouts.default')

@section('title', '画像アップロード')
@section('content')
    @if (session()->has('success'))
        {
        <p>{{ session('success') }}</p>
        }
    @endif

    <form action="{{ route('photos.store') }}"method="post"enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" />
        <button type="submit">アップロード</button>
    </form>
@endsection
