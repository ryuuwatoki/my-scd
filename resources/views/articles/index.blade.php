@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl">スケジュール</h1>
    <a href="{{route('articles.create')}}">New＋＋</a>

    @foreach($articles as $article)
    <div class="border-t border-gray-300 my-1 p-2">
        <h2 class="font-bold text-lg">{{ $article->title }}</h2>
        <h4 class="font-bold text-lg">{{ $article->content }}</h2>
        <p>by {{ $article->user->name }}</p>
        <div class="flex">
            <a class="mr-2" href="{{ route('articles.edit', ['article' => $article->id]) }}">編集</a>
            <form action="{{route('articles.destroy', $article) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="px-2 rounded bg-red-500 text-red-100">削除</button>
            </form>
        </div>
    

    
    </div>
    @endforeach

    

@endsection