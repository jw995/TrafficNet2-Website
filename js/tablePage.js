$(document).ready(function() {
    $('#mainTable thead tr').clone(true).appendTo('#mainTable thead');
    $('#mainTable thead tr:eq(1) th').each( function (i) {
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

    var table = $('#mainTable').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'csv', 'colvis' ],
        orderCellsTop: true,
        fixedHeader: true
    } );
 
    table.buttons().container()
        .appendTo( '#mainTable_wrapper .col-sm-6:eq(0)' );
} );
