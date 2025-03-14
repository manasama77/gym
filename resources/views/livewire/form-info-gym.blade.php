<div class="card bg-base-200 p-5 w-full max-w-sm mx-auto">
    <form wire:submit.prevent="save">
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Deskripsi</legend>
            <textarea class="textarea h-24" placeholder="Deskripsi" wire:model="description"></textarea>
            @error('name')
                <div class="fieldset-label text-error">{{ $message }}</div>
            @enderror
        </fieldset>

        <button type="submit" class="btn btn-primary w-full mt-4">Simpan</button>
    </form>
</div>