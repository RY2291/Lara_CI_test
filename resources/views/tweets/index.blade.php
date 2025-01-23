<x-layout title="TOP | Tweet">
    <x-layout.single>
        <h2>Tweets</h2>
        <x-tweet.form.post></x-tweet.form.post>
        <x-tweet.list :tweets="$tweets"></x-tweet.list>
    </x-layout.single>
</x-layout>

{{-- <h2>Tweet</h2>

@if (session('feedback.success'))
    <p style="color: green"> {{ session('feedback.success') }}</p>
@endif
@foreach ($tweets as $tweet)
    <details>
        <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
        @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </div>
        @else
            編集できません
        @endif
    </details>
    <p></p>
@endforeach --}}
