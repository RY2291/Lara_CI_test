<x-layout title="編集 | Tweet">
    <x-layout.single>
        <h2>Tweet</h2>
        @php
            $breadcrumbs = [['href' => route('tweet.index'), 'label' => 'TOP'], ['href' => '#', 'label' => '編集']];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <x-tweet.form.put :tweet="$tweet"></x-tweet.form.put>
    </x-layout.single>
</x-layout>
