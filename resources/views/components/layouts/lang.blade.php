
<!-- Language Selector -->
<div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">

        <x-slot name="trigger">

            <button class="bg-gray-200 rounded-sm p-2 flex flex-row justify-between">
                <div>
                    {{ config('languages')[App::getLocale()]['name'] }}</div>
                <div class="ml-1">
                    {!! config('languages')[App::getLocale()]['flag'] !!}</div>
            </button>
        </x-slot>

        <x-slot name="content">
            @foreach(config('languages') as $locale => $language)
                <x-dropdown-link :href="route('language', $locale)">
                    {{  $language['name'] }} {!!  $language['flag'] !!}
                </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>
</div>

