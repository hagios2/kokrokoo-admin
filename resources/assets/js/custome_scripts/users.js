$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('all.users')}}",
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone1', name: 'phone1'},
            {data: 'account_type', name: 'account_type'},
            {data: 'industry_type', name: 'industry_type'},
            {data: 'company_name', name: 'company_name'},
            {data: 'title', name: 'title'},
            {data: 'isActive', name: 'isActive'},
            {data: 'last_login', name: 'last_login'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},

            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']],

    });


//hide datatable search box and label
    $('input[type=search]').hide();
    $('#laravel_datatable_filter label').hide();

    // key up event for custom search
    oTable = $('#laravel_datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#search').keyup(function () {
        oTable.search($(this).val()).draw();
    });


});