<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Role Menu CMS') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="relative">
                <!-- table -->
                @if (session('status') === 'role-updated')
                <div class="bg-teal-100 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition class="font-bold">
                        {{ __('Role Updated Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('success'))
                <div class="bg-teal-100 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition class="font-bold">
                        {{ session('success') }}
                    </span>
                </div>
                @elseif (session('error'))
                <div class="bg-red-100 border text-sm text-red-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition class="font-bold">
                        {{ session('error') }}
                    </span>
                </div>
                @endif
                <div class="mb-4">
                <table id="table-rolemenus" class="display">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" class="form-checkbox">
                            </th>
                            <th>No</th>
                            <th>Role Name</th>
                            <th>Role Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
        var table = $('#table-rolemenus').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("api.rolemenus") }}',
            columns: [
                {
                    data: null,
                    name:'id',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return '<input type="checkbox" class="role-checkbox" value="' + row.id + '">';
                    }
                },
                { 
                    data: null, 
                    name: 'no', 
                    orderable: false, 
                    searchable: false, 
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });

    </script>
    @endpush

</x-app-layout>
