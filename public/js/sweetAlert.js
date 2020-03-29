
    function delete_record(id){
        swal({
              title: "Are you sure?",
              text: "Your will not be able to recover this Details!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
          },
          function(confirmButtonText){
                if (confirmButtonText) {
                    $('#delete_form.delete_form_'+id).submit();
                }
        });
       }