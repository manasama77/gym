<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Current Password</label>
                <input type="password" id="current_password" wire:model="current_password" class="input input-warning"
                    required />
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <!-- <flux:input
                wire:model="current_password"
                id="update_password_current_password"
                :label="__('Current password')"
                type="password"
                name="current_password"
                required
                autocomplete="current-password"
            /> -->
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                <input type="password" id="new_password" wire:model="password" class="input input-warning"
                    autocomplete="new-password" required />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <!-- <flux:input wire:model="password" id="update_password_password" :label="__('New password')" type="password"
                name="password" required autocomplete="new-password" /> -->
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                    Password</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation"
                    class="input input-warning" autocomplete="new-password" required />
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <!-- <flux:input wire:model="password_confirmation" id="update_password_password_confirmation"
                :label="__('Confirm Password')" type="password" name="password_confirmation" required
                autocomplete="new-password" /> -->

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>