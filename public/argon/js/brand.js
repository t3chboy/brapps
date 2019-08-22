    $(function() {
    load_brand_datatables();
   }); 

     var extensions = {
        "sFilter": "dataTables_filter col",
        "sLength": "dataTables_length col",
        "datatable_info" : "col"
    }
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions); 

  function load_brand_datatables(){ 

    if ( $.fn.dataTable.isDataTable( '#brand_datatable' ) ) {
      $('#brand_datatable').DataTable();
    }else{
      $('#brand_datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: base_url+'/production/view',
          "jQueryUI": false,
          "pagingType" : "numbers",
          columns: [
              { data: 'type', name: 'type' },
              { data: 'title', name: 'title' },
              { data: 'release_date', name: 'release_date' },
              { data: 'star_cast', name: 'star_cast' },
              { "targets": -1,"data": null,"defaultContent": '<button type="button" class="btn btn-secondary">View</button>'},
              { "targets": -1,"data": null,"defaultContent": '<button type="button" class="btn btn-secondary">Schedule</button>'}
          ],
          "order": [[ 2, "asc" ]],
          drawCallback: function (settings) {
            $(".dataTables_info").addClass("col");
            $(".dataTables_paginate").addClass("col");
          }  
      });
    }  
  }