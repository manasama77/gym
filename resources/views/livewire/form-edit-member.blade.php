<div class="card bg-base-200 p-5 w-full max-w-sm mx-auto">
    <form wire:submit.prevent="save">
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Nama Member</legend>
            <input type="text" class="input w-full" placeholder="Masukan Nama Member" wire:model="name" />
            @error('name')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Jenis Kelamin</legend>
            <select class="select w-full" wire:model="gender">
                <option value="{{ \App\GenderType::MALE->value }}">
                    {{ \App\GenderType::MALE->label() }}
                </option>
                <option value="{{ \App\GenderType::FEMALE->value }}">
                    {{ \App\GenderType::FEMALE->label() }}
                </option>
            </select>
            @error('gender')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Tipe Member</legend>
            <select class="select w-full" wire:model="member_type">
                <option value="{{ \App\MemberType::PENGHUNI->value }}">
                    {{ \App\MemberType::PENGHUNI->label() }}
                </option>
                <option value="{{ \App\MemberType::NON_PENGHUNI->value }}">
                    {{ \App\MemberType::NON_PENGHUNI->label() }}
                </option>
            </select>
            @error('member_type')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Tanggal Join</legend>
            <div class="relative">
                <input type="date" class="input w-full pr-10" wire:model="join_date" />
                <span class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
                    <i class="fas fa-calendar-alt"></i>
                </span>
            </div>
            @error('join_date')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>


        <fieldset class="fieldset">
            <legend class="fieldset-legend">No WhatsApp</legend>
            <input type="tel" class="input w-full" wire:model="no_whatsapp" placeholder="08xxxxxxxxxx" />
            @error('no_whatsapp')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <hr class="my-4 border-t border-secondary" />

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Email</legend>
            <input type="email" class="input w-full" wire:model="email" placeholder="Masukan Email Member" />
            @error('email')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Status Member</legend>
            <select class="select w-full" wire:model="status">
                <option value="1">
                    Aktif
                </option>
                <option value="0">
                    Tidak Aktif
                </option>
            </select>
            @error('status')
                <div class="text-error ml-2">{{ $message }}</div>
            @enderror
        </fieldset>

        <button type="submit" class="btn btn-primary w-full mt-4">Simpan</button>
    </form>
</div>