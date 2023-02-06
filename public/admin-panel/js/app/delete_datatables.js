"use strict";

$(function() {
    $(document).on('click', '[data-kt-table-filter="delete_row"]', function (e) {
        handleDeleteRows(e)    
    } );
});

function handleDeleteRows(e) {
e.preventDefault();
var table = document.querySelector('table.dataTable')
const form = e.target.closest('form');

Swal.fire({
    title: app_are_you_sure,
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: app_delete,
    cancelButtonText: app_back,
    customClass: {
        confirmButton: "btn fw-bold btn-danger",
        cancelButton: "btn fw-bold btn-active-light-primary"
    }
}).then(function (result) {
    if (result.value) {
    
            axios.post(form.getAttribute('action'), new FormData(form))
            .then(function (response) {
                Toast.fire({
                    icon: 'success',
                    title: app_deleted
                })
                reloadTable()
            })
            .catch(function (error) {
                var errors = error.response?.data?.errors
                if (errors) {
                    var message = errors[Object.keys(errors)[0]][0]
                } else if (error?.response?.status == 412) {
                    var message = error?.response?.data?.message
                } else {
                    var message = app_error
                }

                if (message) {
                    ConstToast.fire({
                        html: message,
                        icon: "error",
                    });
                }
            })    

    } else if (result.dismiss === 'cancel') {
    }
});
}