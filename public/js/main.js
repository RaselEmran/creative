 $('.datetimepicker').datetimepicker({
     icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove'
     }
 });

 $('.datepicker').datetimepicker({
     format: 'YYYY-MM-DD',
     icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove',
         ignoreReadonly: true
     }
 });

 var _usedate = function() {
     $('.date').datetimepicker({
         format: 'YYYY-MM-DD',
         icons: {
             time: "fa fa-clock-o",
             date: "fa fa-calendar",
             up: "fa fa-chevron-up",
             down: "fa fa-chevron-down",
             previous: 'fa fa-chevron-left',
             next: 'fa fa-chevron-right',
             today: 'fa fa-screenshot',
             clear: 'fa fa-trash',
             close: 'fa fa-remove'
         }
     });
 }

 $('.year').datetimepicker({
     format: 'YYYY',
     icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove'
     }
 });

 $('.month').datetimepicker({
     format: 'MM',
     icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove'
     }
 });



 $('.timepicker').datetimepicker({
     //          format: 'H:mm',    // use this format if you want the 24hours timepicker
     format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
     icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove'
     }
 });

 var _componentModalDatePicker = function() {
     $('.datepicker').datetimepicker({
         format: 'YYYY-MM-DD',
         icons: {
             time: "fa fa-clock-o",
             date: "fa fa-calendar",
             up: "fa fa-chevron-up",
             down: "fa fa-chevron-down",
             previous: 'fa fa-chevron-left',
             next: 'fa fa-chevron-right',
             today: 'fa fa-screenshot',
             clear: 'fa fa-trash',
             close: 'fa fa-remove'
         }
     });

 };

 $(document).on('keypress', 'input.input_number', function(event) {
     var is_decimal = $(this).data('decimal');

     if (is_decimal == 0) {
         if (__currency_decimal_separator == '.') {
             var regex = new RegExp(/^[0-9,-]+$/);
         } else {
             var regex = new RegExp(/^[0-9.-]+$/);
         }
     } else {
         var regex = new RegExp(/^[0-9.,-]+$/);
     }

     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
     if (!regex.test(key)) {
         event.preventDefault();
         return false;
     }
 });


 var _useselect2 = function() {
     $('.select2').select2();

 }

 $('.select').select2();

 if ($('.dropify').length > 0) {

     $('.dropify').dropify();
 }
 if ($("#editor1").length > 0) {

     CKEDITOR.replace('editor1');
 }




 $('.ajax_form').on('submit', function(e) {
     e.preventDefault();
     $('#submit').hide();
     $('#submiting').show();
     $(".ajax_error").remove();
     var submit_url = $(this).attr('action');
     console.log(submit_url);
     //Start Ajax
     var formData = new FormData($(this)[0]);
     $.ajax({
         url: submit_url,
         type: 'POST',
         data: formData,
         contentType: false, // The content type used when sending data to the server.
         cache: false, // To unable request pages to be cached
         processData: false,
         dataType: 'JSON',
         success: function(data) {
             if (data.status == 'danger') {
                 $.notify({
                     icon: "nc-icon nc-app",
                     message: data.message

                 }, {
                     type: type[3],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });

                 error_audio();

             } else {

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

                 $('#submit').show();
                 $('#submiting').hide();
                 if (data.goto) {
                     setTimeout(function() {

                         window.location.href = data.goto;
                     }, 2500);
                 }
                 if (data.load) {
                     setTimeout(function() {

                         window.location.href = "";
                     }, 2500);
                 }
                 if (data.window) {
                     window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                     setTimeout(function() {
                         window.location.href = '';
                     }, 1000);
                 }

                 if (data.windowup) {
                     window.open(data.windowup, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                     setTimeout(function() {
                         window.location.href = data.back;
                     }, 1000);
                 }

                 success_audio();
             }
         },
         error: function(data) {
             var jsonValue = $.parseJSON(data.responseText);
             const errors = jsonValue.errors;
             if (errors) {
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
             } else {

                 $.notify({
                     icon: "nc-icon nc-app",
                     message: jsonValue.message

                 }, {
                     type: type[4],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 error_audio();
             }
             $('#submit').show();
             $('#submiting').hide();
         }
     });
 });


 $(document).ready(function() {
     /*
      * For Logout
      */
     $(document).on('click', '#logout', function(e) {
         e.preventDefault();
         $("#loader").show('fade');
         var url = $(this).data('url');
         $.ajax({
             url: url,
             method: 'Post',
             contentType: false, // The content type used when sending data to the server.
             cache: false, // To unable request pages to be cached
             processData: false,
             dataType: 'JSON',
             success: function(data) {
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
                 }, 2000);

                 success_audio();
             },
             error: function(data) {
                 var jsonValue = $.parseJSON(data.responseText);
                 const errors = jsonValue.errors
                 var i = 0;
                 $.each(errors, function(key, value) {
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
             }
         });
     });
 });

 // Modal :::::::::::::::::::
 $(document).on('click', '#content_managment', function(e) {
     e.preventDefault();
     //open modal
     $('#modal_remote').modal('toggle');
     // it will get action url
     var url = $(this).data('url');
     var title = $(this).data("title");
     // leave it blank before ajax call
     $('.modal-body').html('');
     // load ajax loader
     $('#modal-loader').show();
     $.ajax({
             url: url,
             type: 'Get',
             dataType: 'html'
         })
         .done(function(data) {
             $('#modal_remote .modal-title').html(title);
             $('.modal-body').html(data).fadeIn(); // load response
             $('#modal-loader').hide();
             if ($('.modal-body').find('select').select2().length > 0) {
                 $('.select').select2();
             }
             if ($('.dropify').length > 0) {

                 $('.dropify').dropify();
             }
             if ($("#editor1").length > 0) {

                 CKEDITOR.replace('editor1');
             }
             _componentModalDatePicker();
             _modalFormValidation();
         })
         .fail(function(data) {
             $('.modal-body').html('<span style="color:red; font-weight: bold;"> Something Went Wrong. Please Try again later.......</span>');
             $('#modal-loader').hide();
         });
 });

 var _modalFormValidation = function() {
     if ($('#content_form').length > 0) {
         $('#content_form').parsley().on('field:validated', function() {
             var ok = $('.parsley-error').length === 0;
             $('.bs-callout-info').toggleClass('hidden', !ok);
             $('.bs-callout-warning').toggleClass('hidden', ok);
         });
     }
     $('#content_form').on('submit', function(e) {
         e.preventDefault();
         $('#submit').hide();
         $('#submiting').show();
         $(".ajax_error").remove();
         var submit_url = $('#content_form').attr('action');
         //Start Ajax
         var formData = new FormData($("#content_form")[0]);
         // var des =CKEDITOR.instances.editor1.getData();
         // formData.append('address',des);
         $.ajax({
             url: submit_url,
             type: 'POST',
             data: formData,
             contentType: false, // The content type used when sending data to the server.
             cache: false, // To unable request pages to be cached
             processData: false,
             dataType: 'JSON',
             success: function(data) {
                 if (data.status == 'danger') {
                     $.notify({
                         icon: "nc-icon nc-app",
                         message: data.message

                     }, {
                         type: type[3],
                         timer: 8000,
                         placement: {
                             from: 'top',
                             align: 'right'
                         }
                     });
                     warning_audio();

                 } else {
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
                     $('#submit').show();
                     $('#submiting').hide();
                     $('#modal_remote').modal('toggle');
                     $('#clientModal').modal('hide');
                     if (data.goto) {
                         setTimeout(function() {

                             window.location.href = data.goto;
                         }, 500);
                     }

                     if (data.load) {
                         setTimeout(function() {

                             window.location.href = "";
                         }, 500);
                     }

                     success_audio();

                 }
             },
             error: function(data) {
                 var jsonValue = data.responseJSON;
                 const errors = jsonValue.errors;
                 if (errors) {
                     var i = 0;
                     $.each(errors, function(key, value) {
                         const first_item = Object.keys(errors)[i];
                         const message = errors[first_item][0];
                         if ($('#' + first_item).length > 0) {
                             $('#' + first_item).parsley().removeError('required', {
                                 updateClass: true
                             });
                             $('#' + first_item).parsley().addError('required', {
                                 message: value,
                                 updateClass: true
                             });
                         }

                         // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');

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
                 } else {
                     $.notify({
                         icon: "nc-icon nc-app",
                         message: jsonValue.message

                     }, {
                         type: type[4],
                         timer: 8000,
                         placement: {
                             from: 'top',
                             align: 'right'
                         }
                     });

                     error_audio();
                 }
                 $('#submit').show();
                 $('#submiting').hide();
             }
         });
     });
 };

 /*
  * Form Validation
  */

 if ($('#content_form').length > 0) {
     $('#content_form').parsley().on('field:validated', function() {
         var ok = $('.parsley-error').length === 0;
         $('.bs-callout-info').toggleClass('hidden', !ok);
         $('.bs-callout-warning').toggleClass('hidden', ok);
     });
 }

 $('#content_form').on('submit', function(e) {

     e.preventDefault();
     $('#submit').hide();
     $('#submiting').show();
     $('.pageloader').show();
     $(".ajax_error").remove();
     var submit_url = $('#content_form').attr('action');
     //Start Ajax
     var formData = new FormData($("#content_form")[0]);
     $.ajax({
         url: submit_url,
         type: 'POST',
         data: formData,
         contentType: false, // The content type used when sending data to the server.
         cache: false, // To unable request pages to be cached
         processData: false,
         dataType: 'JSON',
         success: function(data) {
             if (data.status == 'danger') {
                 $.notify({
                     icon: "nc-icon nc-app",
                     message: data.message

                 }, {
                     type: type[3],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 warning_audio();
             } else {
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
                 $('#submit').show();
                 $('#submiting').hide();
                 $('.pageloader').hide();
                 $('#content_form')[0].reset();
                 if (data.goto) {
                     setTimeout(function() {

                         window.location.href = data.goto;
                     }, 2500);
                 }

                 if (data.window) {
                     $('#content_form')[0].reset();
                     window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                     setTimeout(function() {
                         window.location.href = '';
                     }, 1000);
                 }

                 if (data.load) {
                     setTimeout(function() {

                         window.location.href = "";
                     }, 2500);
                 }

                 success_audio();
             }
         },
         error: function(data) {
             var jsonValue = $.parseJSON(data.responseText);
             const errors = jsonValue.errors;
             if (errors) {
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
             } else {

                 $.notify({
                     icon: "nc-icon nc-app",
                     message: jsonValue.message

                 }, {
                     type: type[4],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 error_audio();
             }
             $('#submit').show();
             $('#submiting').hide();
             $('.pageloader').hide();
         }
     });
 });

 if ($('#ajax_id').length > 0) {
     $('#ajax_id').parsley().on('field:validated', function() {
         var ok = $('.parsley-error').length === 0;
         $('.bs-callout-info').toggleClass('hidden', !ok);
         $('.bs-callout-warning').toggleClass('hidden', ok);
     });
 }
 $('#ajax_id').on('submit', function(e) {

     e.preventDefault();
     $('#submit').hide();
     $('#submiting').show();
     $('.pageloader').show();
     $(".ajax_error").remove();
     var submit_url = $('#ajax_id').attr('action');
     //Start Ajax
     var formData = new FormData($("#ajax_id")[0]);
     $.ajax({
         url: submit_url,
         type: 'POST',
         data: formData,
         contentType: false, // The content type used when sending data to the server.
         cache: false, // To unable request pages to be cached
         processData: false,
         dataType: 'JSON',
         success: function(data) {
             if (data.status == 'danger') {
                 $.notify({
                     icon: "nc-icon nc-app",
                     message: data.message

                 }, {
                     type: type[3],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 warning_audio();
             } else {
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
                 $('#submit').show();
                 $('#submiting').hide();
                 $('.pageloader').hide();
                 $('#ajax_id')[0].reset();
                 if (data.goto) {
                     setTimeout(function() {

                         window.location.href = data.goto;
                     }, 2500);
                 }

                 if (data.window) {
                     $('#ajax_id')[0].reset();
                     window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                     setTimeout(function() {
                         window.location.href = '';
                     }, 1000);
                 }

                 if (data.load) {
                     setTimeout(function() {

                         window.location.href = "";
                     }, 2500);
                 }

                 success_audio();
             }
         },
         error: function(data) {
             var jsonValue = $.parseJSON(data.responseText);
             const errors = jsonValue.errors;
             if (errors) {
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
             } else {

                 $.notify({
                     icon: "nc-icon nc-app",
                     message: jsonValue.message

                 }, {
                     type: type[4],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 error_audio();
             }
             $('#submit').show();
             $('#submiting').hide();
             $('.pageloader').hide();
         }
     });
 });


 /*
  * For Delete Item
  */
 $(document).on('click', '#delete_item', function(e) {
     e.preventDefault();
     var row = $(this).data('id');
     var url = $(this).data('url');
     swal({
         title: "Are you sure?",
         text: "You will not be able to recover this imaginary file!",
         type: "warning",
         showCancelButton: true,
         confirmButtonText: "Yes, delete it!",
         cancelButtonText: "No, cancel plx!",
         closeOnConfirm: true,
         closeOnCancel: true
     }, function(isConfirm) {
         if (isConfirm) {
             $.ajax({
                 url: url,
                 method: 'Delete',
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false,
                 dataType: 'JSON',
                 success: function(data) {

                     if (data.status == "danger") {
                         $.notify({
                             icon: "nc-icon nc-app",
                             message: data.message

                         }, {
                             type: type[3],
                             timer: 8000,
                             placement: {
                                 from: 'top',
                                 align: 'right'
                             }
                         });
                         warning_audio();
                     } else {
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
                         if (typeof(emran) != "undefined" && emran !== null) {
                             emran.ajax.reload(null, false);
                         }
                         if (data.goto) {
                             setTimeout(function() {

                                 window.location.href = data.goto;
                             }, 500);
                         }





                         if (data.load) {
                             setTimeout(function() {

                                 window.location.href = "";
                             }, 500);
                         }

                         success_audio();
                     }

                 },
                 error: function(data) {
                     var jsonValue = $.parseJSON(data.responseText);
                     const errors = jsonValue.errors
                     var i = 0;
                     $.each(errors, function(key, value) {

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
         } else {
             swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
     });
 });


 /*
  * For Status Change
  */
 $(document).on('click', '#change_status', function(e) {
     e.preventDefault();
     var row = $(this).data('id');
     var url = $(this).data('url');
     var status = $(this).data('status');
     if (status == 1) {
         msg = 'Change Status Form Online To Offline';
     } else {
         msg = 'Change Status Form Offline To Online';
     }
     swal({
         title: "Are you sure?",
         text: msg,
         type: "warning",
         showCancelButton: true,
         confirmButtonText: "Yes, Change it!",
         cancelButtonText: "No, cancel plx!",
         closeOnConfirm: true,
         closeOnCancel: true
     }, function(isConfirm) {
         if (isConfirm) {
             $.ajax({
                 url: url,
                 method: 'Put',
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false,
                 dataType: 'JSON',
                 success: function(data) {
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
                     if (typeof(emran) != "undefined" && emran !== null) {
                         emran.ajax.reload(null, false);
                     }

                     if (data.load) {
                         setTimeout(function() {

                             window.location.href = "";
                         }, 500);
                     }
                     success_audio();
                 },
                 error: function(data) {
                     var jsonValue = $.parseJSON(data.responseText);
                     const errors = jsonValue.errors
                     if (errors) {
                         var i = 0;
                         $.each(errors, function(key, value) {
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
                     } else {
                         $.notify({
                             icon: "nc-icon nc-app",
                             message: jsonValue.errors

                         }, {
                             type: type[4],
                             timer: 8000,
                             placement: {
                                 from: 'top',
                                 align: 'right'
                             }
                         });
                         error_audio();
                     }

                 }
             });
         } else {
             swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
     });
 });


 //remort product
 var _remortModalForm = function() {
     if ($('#remort_add').length > 0) {
         $('#remort_add').parsley().on('field:validated', function() {
             var ok = $('.parsley-error').length === 0;
             $('.bs-callout-info').toggleClass('hidden', !ok);
             $('.bs-callout-warning').toggleClass('hidden', ok);
         });
     }
     $('#remort_add').on('submit', function(e) {

         e.preventDefault();
         $(".ajax_error").remove();
         var submit_url = $('#remort_add').attr('action');
         //Start Ajax
         var formData = new FormData($("#remort_add")[0]);
         $.ajax({
             url: submit_url,
             type: 'POST',
             data: formData,
             contentType: false, // The content type used when sending data to the server.
             cache: false, // To unable request pages to be cached
             processData: false,
             dataType: 'JSON',
             success: function(result) {
                 success_audio();

                 $('select#product_id').append(
                     $('<option>', {
                         value: result.data.id,
                         text: result.data.name
                     })
                 );
                 $('select#product_id')
                     .val(result.data.id)
                     .trigger('change');
                 $('div#modal_remote').modal('hide');
             },
             error: function(data) {
                 var jsonValue = $.parseJSON(data.responseText);
                 const errors = jsonValue.errors;
                 if (errors) {
                     var i = 0;
                     $.each(errors, function(key, value) {
                         const first_item = Object.keys(errors)[i]
                         const message = errors[first_item][0]
                         $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                         $("#error_validation").text(value);
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
                 } else {

                     $.notify({
                         icon: "nc-icon nc-app",
                         message: jsonValue.message

                     }, {
                         type: type[4],
                         timer: 8000,
                         placement: {
                             from: 'top',
                             align: 'right'
                         }
                     });
                     error_audio();
                 }
             }
         });
     });
 };

  //remort product Model
 var _remortNewProductModelForm = function() {
     if ($('#remort_add').length > 0) {
         $('#remort_add').parsley().on('field:validated', function() {
             var ok = $('.parsley-error').length === 0;
             $('.bs-callout-info').toggleClass('hidden', !ok);
             $('.bs-callout-warning').toggleClass('hidden', ok);
         });
     }
     $('#remort_add').on('submit', function(e) {

         e.preventDefault();
         $(".ajax_error").remove();
         var submit_url = $('#remort_add').attr('action');
         //Start Ajax
         var formData = new FormData($("#remort_add")[0]);
         $.ajax({
             url: submit_url,
             type: 'POST',
             data: formData,
             contentType: false, // The content type used when sending data to the server.
             cache: false, // To unable request pages to be cached
             processData: false,
             dataType: 'JSON',
             success: function(result) {
                 success_audio();
                 $('select#part_id').append(
                     $('<option>', {
                         value: result.data.id,
                         text: result.data.name
                     })
                 );
                 $('select#product_id')
                     .val(result.data.product_id)
                     .trigger('change');
                 $('div#modal_remote').modal('hide');
             },
             error: function(data) {
                 var jsonValue = $.parseJSON(data.responseText);
                 const errors = jsonValue.errors;
                 if (errors) {
                     var i = 0;
                     $.each(errors, function(key, value) {
                         const first_item = Object.keys(errors)[i]
                         const message = errors[first_item][0]
                         $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                         $("#error_validation").text(value);
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
                 } else {

                     $.notify({
                         icon: "nc-icon nc-app",
                         message: jsonValue.message

                     }, {
                         type: type[4],
                         timer: 8000,
                         placement: {
                             from: 'top',
                             align: 'right'
                         }
                     });
                     error_audio();
                 }
             }
         });
     });
 };

 /*
  * Form Validation
  */

 if ($('#client_form').length > 0) {
     $('#client_form').parsley().on('field:validated', function() {
         var ok = $('.parsley-error').length === 0;
         $('.bs-callout-info').toggleClass('hidden', !ok);
         $('.bs-callout-warning').toggleClass('hidden', ok);
     });
 }

 $('#client_form').on('submit', function(e) {

     e.preventDefault();
     $('#submit').hide();
     $(".ajax_error").remove();
     var submit_url = $('#client_form').attr('action');
     //Start Ajax
     var formData = new FormData($("#client_form")[0]);
     $.ajax({
         url: submit_url,
         type: 'POST',
         data: formData,
         contentType: false, // The content type used when sending data to the server.
         cache: false, // To unable request pages to be cached
         processData: false,
         dataType: 'JSON',
         success: function(data) {
             if (data.status == 'danger') {
                 $.notify({
                     icon: "nc-icon nc-app",
                     message: data.message

                 }, {
                     type: type[3],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });

             } else {
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
                 $('#submit').show();
                 $('#submiting').hide();
                 $("#clientModal").modal('toggle');
                 if (data.goto) {
                     setTimeout(function() {

                         window.location.href = data.goto;
                     }, 2500);
                 }

                 if (data.window) {
                     $('#content_form')[0].reset();
                     window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                     setTimeout(function() {
                         window.location.href = '';
                     }, 1000);
                 }

                 if (data.load) {
                     setTimeout(function() {

                         window.location.href = "";
                     }, 2500);
                 }
             }
             success_audio();
         },
         error: function(data) {
             var jsonValue = $.parseJSON(data.responseText);
             const errors = jsonValue.errors;
             if (errors) {
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
             } else {

                 $.notify({
                     icon: "nc-icon nc-app",
                     message: jsonValue.message

                 }, {
                     type: type[4],
                     timer: 8000,
                     placement: {
                         from: 'top',
                         align: 'right'
                     }
                 });
                 error_audio();
             }
             $('#submit').show();
             $('#submiting').hide();
             $('.pageloader').hide();
         }
     });
 });