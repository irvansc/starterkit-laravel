<div>
    <form wire:submit.prevent="updatePersonalDetail()">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="Nama Lengkap">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username"
                        wire:model="username">
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" wire:model="email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="phone">WhatsAap</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter No hp or Whatsapp"
                        wire:model="phone">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="address">Alamat</label>
                    <textarea class="form-control" id="address" rows="4" placeholder="address"
                        wire:model="address"></textarea>
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" wire:model="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary" wire:target="updatePersonalDetail"
                wire:loading.attr="disabled">
                <span wire:loading wire:target="updatePersonalDetail" class="spinner-border spinner-border-sm me-2"
                    role="status" aria-hidden="true"></span>
                <span wire:loading.remove wire:target="updatePersonalDetail">Save</span>
                <span wire:loading wire:target="updatePersonalDetail">Saving...</span>
            </button>
        </div>

    </form>
</div>