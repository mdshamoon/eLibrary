// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTablecards').DataTable({
    'ordering':false,
    "info":   false,
    "lengthMenu": [12, 24, 48],
    "columnDefs": [
      {
          "targets": [ 1 ],
          "visible": false,
          
      }]

      ,
      "language": {
        
        "zeroRecords": "No Book Found",
        
        "infoEmpty": "No records available",
        
    }
  });

  $('#dataTable').DataTable({
   
    
  });
});
