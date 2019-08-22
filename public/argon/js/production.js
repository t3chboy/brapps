  $(function() {
    load_production_datatables();
   }); 

    $("#save_movie_form").submit(function(e){

        e.preventDefault();
        var form = $('#save_movie_form')[0];
        console.log(form)
        var data = new FormData(form);
        console.log(data);  

        $.ajax({
           type:'POST',
           url:base_url+'/production/save',
           processData: false,
           contentType: false,
           data:data,
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           success:function(data){
            $("#movie_form_success_msg").empty();
            typeof(data);
            $.each( data, function( key, value ) {
              $("#movie_form_success_msg").append('<strong>'+value+'</strong></br>')
            });
            $("#success_alert").show();
            $("#modal-form").animate({ scrollTop: 10 }, "slow");
            $('#save_movie_form')[0].reset();
            load_production_datatables();
            setTimeout(function() {$('#modal-form').modal('hide');}, 3000);
           },
           error:function(data){
            response = JSON.parse(data.responseText);
            $("#movie_form_error_msg").empty();
            $.each( response, function( key, value ) {
              $.each(value,function(key, value){
                $.each(value,function(key,value){
                  $("#movie_form_error_msg").append('<strong>'+value+'</strong></br>')
                })
              })
            });
            $("#error_alert").show();
            $("#modal-form").animate({ scrollTop: 10 }, "fast");
            
           }

        });
	});



 $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});   


  $(function(){
      $("[data-hide]").on("click", function(){
          $(this).closest("." + $(this).attr("data-hide")).hide();
      });
  });

  $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate : new Date(),
    autoclose: true
  });

  var extensions = {
        "sFilter": "dataTables_filter col",
        "sLength": "dataTables_length col",
        "datatable_info" : "col"
    }
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions);
      
  function load_production_datatables(){ 

    if ( $.fn.dataTable.isDataTable( '#production_datatable' ) ) {
      $('#production_datatable').DataTable();
    }else{
      $('#production_datatable').DataTable({
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
          ],
          "order": [[ 2, "asc" ]],
          drawCallback: function (settings) {
            $(".dataTables_info").addClass("col");
            $(".dataTables_paginate").addClass("col");
          }  
      });
    }  
  }
  