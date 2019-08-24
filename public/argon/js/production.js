  $(function() {
    var table = null

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
            table.ajax.reload();
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
      
      table = $('#production_datatable').DataTable({
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
              {"render": function (data, type, full, ) {
                            return '<button type="button" id='+full.id+' class="btn btn-secondary view_more">View</button>';
                        }
              }            
          ],
          "order": [[ 2, "asc" ]],
          drawCallback: function (settings) {
            $(".dataTables_info").addClass("col");
            $(".dataTables_paginate").addClass("col");
          },

      });

  
  

  });


  $(document).on('click', '.view_more', function () {
    var m_id = $(this).attr("id")
    get_movie_data(m_id)
  });

  function get_movie_data(m_id=null){
    if(m_id > 0){
      console.log(m_id)

      $.ajax({
          type:'GET',
          url:base_url+'/production/view/'+m_id,
          contentType: 'json',
          success:function(data){
            response = JSON.parse(data);
            console.log(response);
            console.log(response.id)
            $("#box_movie_name,#modal_title").text("").text(response.title);
            $("#box_type").text("").text(response.type);
            $("#box_actual_release_date").text("").text(response.actual_release_date);
            $("#box_approx_release_date").text("").text(response.approx_release_date);
            $("#box_cost").text("").text(response.cost);
            $("#box_star_cast").text("").text(response.star_cast);
            $("#box_synopsis").text("").text(response.synopsis);
            $("#box_box_trailer_link").attr('src',"").attr('src',response.tariler_link);
          },
          error:function(data){
            console.log(data);
          }
      });
      $('#movie-modal').modal('show');
    }
  }
