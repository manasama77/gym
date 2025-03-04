<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                {{-- <x-card-dashboard type="total_member_aktif" title="TOTAL MEMBER AKTIF" value="0" /> --}}
                <livewire:card-dashboard type="total_member_aktif" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:card-dashboard type="total_member_non_aktif" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                {{-- <x-card-dashboard title="TOTAL REQUEST EXTEND MEMBERSHIP" :value="$total_request_extend_membership" icon="fas fa-users" /> --}}
                <livewire:card-dashboard type="total_request_extend_membership" />
            </div>
        </div>
    </div>
</x-layouts.app>
