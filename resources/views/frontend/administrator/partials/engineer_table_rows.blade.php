@php
    $counter = ($user->currentPage() - 1) * $user->perPage() + 1;
@endphp

@forelse($user as $users)
    <tr>
        <td>{{ $counter++ }}</td>
        <td>{{ $users->name }}</td>
        <td>{{ $users->email }}</td>
        <td>{{ $users->phone }}</td>
        <td>{{ $users->address }}</td>
        <td>{{ $users->created_at }}</td>
        <td>
            <!-- Edit Icon that triggers the Modal -->
            <a href="#" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $users->id }}">
                <i class="fas fa-edit text-primary me-2"></i>
            </a>

            <!-- Delete Icon -->
            <form action="{{ route('tech_delete', $users->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Engineer?')) { this.closest('form').submit(); }">
                    <i class="fas fa-trash-alt text-danger me-2"></i>
                </a>
            </form>


        </td>
    </tr>

    <!-- Modal kwa ajili ya kuboresha mtumiaji -->
    <div class="modal fade" id="editUserModal-{{ $users->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Engineer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Fomu ya Boresha Mtumiaji -->
                    <form action="{{ route('tech_update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <!-- Jina la Mtumiaji -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Fullname:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" required>
                        </div>

                        <!-- Barua Pepe -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                        </div>

                        <!-- Namba ya Simu -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $users->phone }}" required>
                        </div>

                        <!-- Anuani -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $users->address }}" required>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <tr>
        <td colspan="9" class="text-center">No user was found</td>
    </tr>
@endforelse


  </script>
