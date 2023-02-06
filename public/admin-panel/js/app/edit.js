"use strict";
function edit(id, fieldsValidation, masterTable = false, fireChange = false, midTable = false) {
    var t, e, o, n, r, i;
    
    i = new bootstrap.Modal(document.querySelector(`#kt_modal_edit${id}`)),
    r = document.querySelector(`#kt_modal_edit${id}_form`),
    t = r.querySelector(`#kt_modal_edit${id}_setting_submit`),
    e = r.querySelector(`#kt_modal_edit${id}_setting_cancel`),
    o = r.querySelector(`#kt_modal_edit${id}_setting_close`),
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
                    console.log(r);
                    (r.reset(), i.hide(), $(r).find('select').val(null).trigger('change'))  

                    reloadTable()

                    Toast.fire({
                        icon: 'success',
                        title: app_updated
                    });
                })
                .catch(function (error) {
                    // let dataMessage = error.response.data.message;
                    let dataMessage = '';
                    let dataErrors = error.response.data.errors;

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