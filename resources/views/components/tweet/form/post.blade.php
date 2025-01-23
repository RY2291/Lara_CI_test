@auth
    <form action="{{ route('tweet.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-4">
            <label for="tweet-content">Tweet</label>
            <textarea type=text name="tweet" id="tweet-content" cols="30" rows="3"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300"></textarea>
        </div>
        <x-tweet.form.images />
        @error('tweet')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <div class="flex flex-wrap justify-end">
            <x-element.button>
                Tweetする
            </x-element.button>
        </div>
    </form>
@endauth
@guest
    <div class="flex flex-wrap justify-center">
        <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
            <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
            <x-element.button-a :href="route('register')">会員登録</x-element.button-a>
        </div>
    </div>
@endguest
