<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Roles') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="relative">
                <!-- table -->
                <a href="/setup/roles/create"
                    class="py-3 mb-5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-orange-500 text-white hover:bg-orange-700">
                    <i class="ti ti-plus"></i>
                    Tambah
                </a>
                @if (session('status') === 'role-created')
                <div class="bg-teal-100 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition class="font-bold">
                        {{ __('Role Created Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('status') === 'role-updated')
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
                <table id="table-roles" class="display">
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
            <form id="bulkDeleteForm" method="POST" action="{{ route('roles.bulk-delete') }}" style="display: none;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="ids" id="bulkDeleteIds">
                <button type="submit" class="py-2 px-4 mt-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">
                    Delete Selected
                </button>
            </form>                
        </div>
    </div>

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
        var table = $('#table-roles').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("api.roles") }}',
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

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function () {
            var checked = $(this).prop('checked');
            $('.role-checkbox').prop('checked', checked);
            toggleBulkDeleteButton();
        });

        // Handle individual checkbox selection
        $('#table-roles tbody').on('change', '.role-checkbox', function () {
            toggleBulkDeleteButton();
        });
        

        // Toggle the visibility of the bulk delete button based on selection
        function toggleBulkDeleteButton() {
            var selectedCount = $('.role-checkbox:checked').length;
            $('#bulkDeleteIds').val($('.role-checkbox:checked').map(function () {
                return this.value;
            }).get().join(','));

            if (selectedCount > 0) {
                $('#bulkDeleteForm').show(); // Show the bulk delete button when at least one is selected
            } else {
                $('#bulkDeleteForm').hide(); // Hide if none are selected
            }
        }

        // Handle bulk delete form submission
        $('#bulkDeleteForm').on('submit', function (e) {
            e.preventDefault();
            var selectedIds = $('#bulkDeleteIds').val();
            if (!selectedIds) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Selection',
                    text: 'Please select at least one role to delete.'
                });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to delete the selected roles?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete them!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });

    </script>
    @endpush

</x-app-layout>
