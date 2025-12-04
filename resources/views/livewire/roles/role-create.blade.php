<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Roles</h3>
                <p class="text-subtitle text-muted">Create Role</p>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles / Create</li>
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
                        <a href="{{ route('roles') }}" wire:navigate class="btn btn-primary rounded-pill">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="createRole">
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

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Permissions</label> </br>
                            @foreach ($allPermissions as $permission )
                           
                                <input type="checkbox" wire:model="permissions" value="{{ $permission->name }}"> &nbsp;
                                {{$permission?->name}}
                         
                            </br>
                            @endforeach
                            @error('permission')
                            <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button class="btn btn-success rounded-pill">Create Role
                                <x-spinner :target="$target" />
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>