// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable( {
        "language": {
            "lengthMenu": "عرض _MENU_  من النتائج",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
});
