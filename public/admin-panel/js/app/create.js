"use strict";


function create(id, fieldsValidation) {
    var t, e, o, n, r, i;
    
    i = new bootstrap.Modal(document.querySelector(`#kt_modal_add_setting${id}`)),
    r = document.querySelector(`#kt_modal_add_setting${id}_form`),
    t = r.querySelector(`#kt_modal_add_setting${id}_submit`),
    e = r.querySelector(`#kt_modal_add_setting${id}_cancel`),
    o = r.querySelector(`#kt_modal_add_setting${id}_close`),
    n = FormValidation.formValidation(r, {
        fields: {...fieldsValidation},
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }),
    t.addEventListener("click", (function(e) {
        e.preventDefault(),
        n && n.validate().then((function(e) {
            console.log("validated!"),
            "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"),
            t.disabled = !0,
            setTimeout((function() {
                t.removeAttribute("data-kt-indicator"),

                axios.post(r.getAttribute('action'), new FormData(r))
                .then(function (response) {


                    (r.reset(), i.hide())

                    reloadTable()

                    Toast.fire({
                        icon: 'success',
                        title: app_added_success
                    })

                    $('.img_preveiw').attr('style','')
                })
                .catch(function (error) {
                    console.log(error);
                  //   var data_err = error.errors;
                     let data_err = error.response.data.errors;

                    $.each(data_err, function(key, value) {
                        $("#" + key + "_err").text(value);
                    });
                    // let dataMessage = error.response.data.message;
                    let dataMessage = '';
                    let dataErrors = error.response?.data?.errors;

                    for (const errorsKey in dataErrors) {

                        // if (!dataErrors.hasOwnProperty(errorsKey)) continue;

                        dataMessage = dataErrors[errorsKey].map((v) => "<br>" + v).join("")
                        n.updateValidatorOption(errorsKey, 'blank', 'message', dataMessage)
                            .updateFieldStatus(errorsKey, 'Invalid', 'blank');
                    }

                    if (error.response) someErrors()
                })
                .then((function(e) {
                     (t.disabled = !1)
                  }
                ));
            }
            ), 2e3)) : someErrors();
        }
        ))
    }
    )),
    o.addEventListener("click", (t) => cancel(t, r, i, n))
}
