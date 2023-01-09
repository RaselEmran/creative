 $('#login').on('submit', function(e) {
     e.preventDefault();
     $("#loader").show();
     $(".ajax_error").remove();
     var form = $(this).serialize();
     var url = $(this).attr('action');

     $.ajax({
         method: 'POST',
         url: url,
         data: form,
         dateType: 'json',
         success: function(data) {
             $("#loader").hide();

             $.notify({
                 icon: "nc-icon nc-app",
                 message: data.message

             }, {
                 type: type[2],
                 timer: 8000,
                 placement: {
                     from: 'top',
                     align: 'right'
                 }
             });

             setTimeout(function() {

                 window.location.href = data.goto;
             }, 2500);
             success_audio();
         },
         error: function(data) {
             $("#loader").hide();
             var jsonValue = $.parseJSON(data.responseText);
             const errors = jsonValue.errors;
             var i = 0;
             $.each(errors, function(key, value) {
                 const first_item = Object.keys(errors)[i]
                 const message = errors[first_item][0]
                 $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');

                 $.notify({
                     icon: "nc-icon nc-app",
                     message: value

                 }, {
                     type: type[4],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });

                 i++;
             });
            error_audio();
         }

     });
 });