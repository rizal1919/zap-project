"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email address is required",
                                },
                                emailAddress: {
                                    message:
                                        "The value is not a valid email address",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {

                            if(i == "Valid"){
                                e.setAttribute("data-kt-indicator", "on");
                            }else{
                                e.disabled = !0;
                            }

                            var formData = new FormData(t);
                            const pathname = window.location.pathname;

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: route("loginStart"),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    console.log(response);
                                    (e.disabled = !0),
                                    e.removeAttribute("data-kt-indicator"),
                                    (e.disabled = !1),
                                    Swal.fire({
                                        text: "Login Success !",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                            "btn btn-primary",
                                        },
                                    }).then(function (t) {
                                            window.location.href = route('position');
                                        });
                                },
                                error: function (error) {
                                    e.removeAttribute("data-kt-indicator");

                                    if (error.responseJSON.errors) {
                                        const errors = Object.values(
                                            error.responseJSON.errors
                                        );

                                        errors.forEach((element) => {
                                            toastr.error(element[0], options);
                                        });
                                    } else {
                                        toastr.error(
                                            error.responseJSON.message,
                                            options
                                        );
                                    }
                                },
                            });

                                //   setTimeout(function () {
                                //       e.removeAttribute("data-kt-indicator"),
                                //           (e.disabled = !1),
                                //           Swal.fire({
                                //               text: "You have successfully logged in!",
                                //               icon: "success",
                                //               buttonsStyling: !1,
                                //               confirmButtonText: "Ok, got it!",
                                //               customClass: {
                                //                   confirmButton:
                                //                       "btn btn-primary",
                                //               },
                                //           }).then(function (e) {
                                //               if (e.isConfirmed) {
                                //                 (t.querySelector('[name="email"]').value = "");
                                //                 (t.querySelector('[name="password"]').value = "");
                                //                 var i = t.getAttribute("data-kt-redirect-url");
                                //                 i && (location.href = i);
                                //               }
                                //           });
                                //   }, 2e3))
                                // : Swal.fire({
                                //       text: "Sorry, looks like there are some errors detected, please try again.",
                                //       icon: "error",
                                //       buttonsStyling: !1,
                                //       confirmButtonText: "Ok, got it!",
                                //       customClass: {
                                //           confirmButton: "btn btn-primary",
                                //       },
                                //   });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
