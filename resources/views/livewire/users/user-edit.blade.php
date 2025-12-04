<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Users</h3>
                <p class="text-subtitle text-muted">Edit User</p>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users / Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('users') }}" wire:navigate class="btn btn-primary rounded-pill">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="updateUser">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control round"
                                    placeholder="Name" wire:model="name" name="name">
                                @error('name')
                                <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control round"
                                    placeholder="Email Address" wire:model="email" name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="role">Assign Role</label>
                                <select wire:model="role" id="role" class="form-control round">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">
                                            {{ $role->name }}
                                        </option>                                      
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button class="btn btn-success rounded-pill">Update User
                                <x-spinner :target="$target"/>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>