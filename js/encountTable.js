$(document).ready(function() {
    $('#encTable thead tr').clone(true).appendTo('#encTable thead');
    $('#encTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#encTable').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'csv', 'colvis' ],
        orderCellsTop: true,
        fixedHeader: true
    } );
 
    table.buttons().container()
        .appendTo( '#encTable_wrapper .col-sm-6:eq(0)' );
} );