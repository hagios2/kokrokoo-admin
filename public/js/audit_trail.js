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
            {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'action_by', name: 'action_by'},
          //  {data: 'role', name: 'role'},
            {data: 'activities', name: 'activities'},
            {data: 'created_at',adjust:true, name: 'created_at'},
        ],
        order: [[0, 'desc']],
        "pageLength": 25,

    });


//hide datatable search box and label
    $('input[type=search]').hide();
    $('#laravel_datatable_filter label').hide();

    // key up event for custom search
    oTable = table.DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#search').keyup(function () {
        oTable.search($(this).val()).draw();
    });

    //  $('#media_id').hide();

});