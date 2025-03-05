<x-layouts.app :title="$title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Membership</h1>
            <div class="flex gap-2">
                <a href="{{ route('membership.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Member
                </a>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="toast toast-end z-50" x-data="{
                showToast: true,
                type: 'success',
                message: '{{ session('success') }}',
            }" x-init="setTimeout(() => { $el.classList.add('animate-jump-out') }, 3000)">
                <div class="alert alert-success">
                    <span>
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif

        <x-membership-table :keyword="$keyword" :memberships="$memberships" />
    </div>

    @push('scripts')
        <script>
            function deleteMembership(id, name) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    html: `Kamu akan menghapus member<br/><b>${name}</b>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            }
        </script>
    @endpush
</x-layouts.app>
