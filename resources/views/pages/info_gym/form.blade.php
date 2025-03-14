<x-layouts.app :title="$title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Info Gym</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <livewire:form-info-gym />

    </div>
</x-layouts.app>