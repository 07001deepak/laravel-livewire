<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Roles</h3>
                <p class="text-subtitle text-muted">Roles List</p>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                        Roles List
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{route('role.create')}}" wire:navigate class="btn btn-primary rounded-pill">Add Roles</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>            
                            <th>Roles</th>                  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allRoles as $role )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if($role->permissions)
                                 @foreach ($role->permissions as $permission)
                                     <span class="badge bg-secondary">
                                        {{ $permission->name }}
                                     </span>
                                 @endforeach
                                 
                                @endif
                            </td>
                     
                            <td>
                                <a href="{{ route('role.edit',['id' => $role->id]) }}" class="btn btn-primary btn-sm" wire:navigate>
                                    Edit 
                                </a>
                                <button class="btn btn-danger btn-sm" wire:click="getConfirmDeleteRole({{ $role->id }})">
                                    Delete 
                                </button>
                            </td>
                        </tr>
                        @empty
                        <td class="colspan-4">No Record Found</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </section>


    <!-- Add User -->
</div>