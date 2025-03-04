@props(['title', 'value'])

<div {{ $attributes }} class="bg-white shadow-md rounded-lg p-8 w-full h-full dark:bg-zinc-900 dark:text-white text-accent">
    <div class="flex justify-center flex-col gap-4 items-center w-full h-full">
        <div>
            <h1 class="text-6xl font-black text-center text-accent dark:text-white">{{ $value }}</h1>
        </div>
        <div>
            <p class="text-sm text-center text-accent dark:text-white">{{ $title }}</p>
        </div>
    </div>
</div>
