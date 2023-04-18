<x-layout.admin>
    <h1 class="text-3xl mt-10">Users</h1>
    <a href="{{ route('user.create') }}"
        class="mt-6 bg-primary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">+ Add
        new user</a>
    <table id="table" class="mt-10 p-10 bg-white w-full align-top text-left">
        <tr class="text-left">
            <th class="text-left">ID</th>
            <th class="text-left">Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Phone</th>
            <th class="text-left">Admin</th>
            <th class="text-left">Created</th>
            <th>Options</th>
        </tr>
        @foreach ($users as $user)
            <tr class="py-3 border-b-black border-b-2 row">

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}"
                        class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                        Update user</a>
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-primary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                            Delete user</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    <div id="pagination" class="mt-6 p-4 block max-h-12 mb-24 container mx-auto">
        {{ $users->links() }}
    </div>
</x-layout.admin>
