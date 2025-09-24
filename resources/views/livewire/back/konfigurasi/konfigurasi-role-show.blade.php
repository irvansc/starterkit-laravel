<div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $role->name }}</h4>
                    <div class="d-flex flex-column text-gray-600">
                        <div class="row">
                            @foreach ($role->permissions->take($this->perPage) as $index => $item)
                            @if ($index % 4 == 0 && $index != 0)
                            <div class="col-12">
                                <hr>
                            </div>
                            @endif
                            <div class="col-6">
                                <div class="d-flex align-items-center py-2">
                                    <p><i class="mdi mdi-check-bold text-primary me-2"></i>{{ $item->name }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if ($role->permissions->count() > $this->perPage)
                        <button type="submit" class="btn btn-primary btn-sm" wire:click="loadMore"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="loadMore" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            <span wire:loading.remove wire:target="loadMore">Load More</span>
                            <span wire:loading wire:target="loadMore">Loading...</span>
                        </button>
                        @endif
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_update_role">Edit Role</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">User Assigned : <span class="badge rounded-pill bg-info">{{
                                $users->count() }}</span></h4>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-sm" placeholder="Search">
                                <button class="btn btn-secondary">
                                    <i class='bx bx-search-alt'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y,
                                        H:i:s') }}</td>
                                    <td>
                                        <div class="btn-group mt-2 me-1 dropstart">
                                            <button type="button"
                                                class="btn btn-secondary waves-effect waves-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item"
                                                    href="{{ route('users.show', $user->username) }}">View</a>
                                                <a class="dropdown-item text-danger" href="#"
                                                    wire:click.prevent='deleteUserRole({{$user->id}})'>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade bs-example-modal-lg" id="kt_modal_update_role" tabindex="-1"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Update Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="kt_modal_update_role_form" action="#" wire:submit.prevent="updateRole" method="POST">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Role name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="role_name" wire:model="roleName">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2">Role permissions</label>
                            <div class="col-md-10">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:click="selectAllPermissions">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Select All
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    @foreach ($permissions as $permission)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                            wire:model="selectedPermissions" id="permission-{{ $permission->id }}">
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading wire:target="updateRole" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                <span wire:loading.remove wire:target="updateRole">Save</span>
                                <span wire:loading wire:target="updateRole">Saving...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('close-modal', () => {
            $('#kt_modal_update_role').modal('hide');
        });
    });
</script>


@endpush