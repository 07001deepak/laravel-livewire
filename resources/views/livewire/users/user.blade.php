<x-layouts.main>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    <p class="text-subtitle text-muted">User List</p>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            Users List
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="#" class="btn btn-primary rounded-pill">Add User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user?->name }}</td>
                                <td>{{ $user?->email }}</td>
                                <td>{{ $user?->created_at }}</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
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
</x-layouts.main>