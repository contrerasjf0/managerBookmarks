import config from "../../configs/configs";

export default function (){

    var table = $('#folder-table').DataTable({
        processing: true,
        scrollY: '800px',
        scrollX: false,
        scrollCollapse: true,
        lengthMenu: [10, 25, 50, "All"],
        processing: true,
        serverSide: true,
        ajax: `${config.baseUrl}folder/list`,
        columnDefs:[
            {
                targets: [ 0 ],
                visible: false,
                searchable: false
            },
            {
                targets: [ 1 ],
                searchable: false
            }
        ],
        columns: [
            { data: 'id', name: 'id' },
            {
                className:      'details-control',
                orderable:      false,
                data:           null,
                defaultContent: ''
            },
            { data: 'name', name: 'data' },
            { data: 'description', name: 'description' }
        ],
        order: [[0, 'asc']]
    });

    $('#folder-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'posts-' + row.data().id;

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(formatTable(row.data())).show();
            initTable(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });
    
    function formatTable(data){
        return `<table class="table row-border hover" id="posts-${data.id}">
					<thead>
					 <tr>
						<th>Id</th>
						<th>Favicon</th>
						<th>Nombre</th>
						<th>Url</th>
						<th>Note</th>
						<th>Compartir</th>
					</tr>
					</thead>
				</table>`
    }

    function initTable(tableId, data) {
        
        $('#' + tableId).DataTable({
            processing: true,
            scrollY: '800px',
            scrollX: false,
            scrollCollapse: true,
            lengthMenu: [10, 25, 50, "All"],
            serverSide: true,
            ajax: `${config.baseUrl}bookmark/${data.id}/listbookmark`,
            columnDefs:[
                {
                    targets: [ 0 ],
                    visible: false,
                    searchable: false
                },{
                    targets: [ 1 ],
                    searchable: false
                },{
                    targets: [ 5 ],
                    searchable: false
                }
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'favicon'},
                { data: 'name', name: 'name'},
                { data: 'url', name: 'url' },
                { data: 'note', name: 'note' },
                { data: 'share'}
            ],
            order: [[0, 'asc']]
        });
    }


}