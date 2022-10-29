<script>
     $(document).ready(function () {
            $('#uuu').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Data",
                }
            });

        });
</script>

<script>
$(document).ready(function(){

// Datapicker 
   $( ".datepicker" ).datepicker({
      "dateFormat": "yy-mm-dd",
      changeYear: true
   });

   // DataTable
   var dataTable = $('#empTable').DataTable({
     'processing': true,
     'serverSide': true,
     'serverMethod': 'post',
     'searching': true, // Set false to Remove default Search Control
     'ajax': {
       'url':'ajaxfile.php',
       'data': function(data){
          // Read values
          var from_date = $('#search_fromdate').val();
          var to_date = $('#search_todate').val();

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate = to_date;
       }
     },
     'columns': [
        { data: 'emp_name' },
        { data: 'email' },
        { data: 'date_of_joining' },
        { data: 'salary' },
        { data: 'city' },
     ]
  });

  // Search button
  $('#btn_search').click(function(){
     dataTable.draw();
  });

});

</script>