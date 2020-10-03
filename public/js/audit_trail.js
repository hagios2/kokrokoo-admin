$(document).ready(function () {

    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "audits",
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id', 'visible': false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'action_by', name: 'action_by' },
            //  {data: 'role', name: 'role'},
            { data: 'activities', name: 'activities' },
            { data: 'created_at', adjust: true, name: 'created_at' },
        ],
        order: [[0, 'desc']],
        "pageLength": 25,

    });

});