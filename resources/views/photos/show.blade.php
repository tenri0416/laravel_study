@extends('layouts.default')

@section('title', '画像結果')
@section('content')
    @if (session()->has('success'))
        {
        <p>{{ session('success') }}</p>
        }
    @endif
    <img src="{{ asset('storage/photos/' . $fileName) }}" />
    <form action="{{ route('photos.destroy', ['photo' => $fileName]) }}"method="post">
        @csrf
        @method('delete')
        <button type="submit">削除</button>
    </form>
    <a href="{{ route('photos.download', ['photo' => $fileName]) }}">ダウンロード</a>
@endsection
