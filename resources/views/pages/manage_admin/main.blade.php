<x-layouts.app :title="$title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Manage Admin</h1>
            <div class="flex gap-2">
                <a href="{{ route('manage-admin.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Admin
                </a>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="toast toast-end z-50"
                x-data="{ showToast: true, type: 'success', message: '{{ session('success') }}' }"
                x-init="setTimeout(() => { $el.classList.add('animate-jump-out') }, 3000)">
                <div class="alert alert-success">
                    <span>
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif

        <form action="{{ route('manage-admin') }}" method="get" class="flex gap-2 mb-5">
            <label class="input">
                <i class="fas fa-search h-[1em] opacity-50"></i>
                <input type="search" id="keyword" name="keyword" placeholder="Cari Member" value="{{ $keyword }}" />
            </label>
        </form>

        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-200 mb-5">
            <table class="table table-compact table-pin-rows">
                <thead>
                    <tr>
                        <th class="text-center"><i class="fas fa-cogs"></i></th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td class="text-nowrap flex justify-center gap-1">
                                <a href="{{ route('manage-admin.edit', $admin) }}" class="btn btn-sm btn-success"
                                    title="Edit Admin">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-error"
                                    onclick="deleteAdmin({{ $admin->id }}, '{{ $admin->name }}')" title="Hapus Admin">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('manage-admin.destroy', $admin) }}"
                                    method="post" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            <td class="text-nowrap">{{ $admin->email }}</td>
                            <td class="text-nowrap">{{ $admin->name }}</td>
                            <td class="text-nowrap">{{ strtoupper($admin->role_name) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            {{ $admins->links('vendor.pagination.daisy') }}
        </div>
    </div>

    @push('scripts')
        <script>
            function deleteAdmin(id, name) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    html: `Kamu akan menghapus Admin<br/><b>${name}</b>?`,
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