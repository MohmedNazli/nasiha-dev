<!DOCTYPE html>

<html lang="ar" direction="rtl" dir="rtl">
	<!--begin::Head-->
	<head><base href="">
		<title> Site Name </title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{ asset('imgs/favicon.ico') }}">
		<!--begin::Fonts-->
    	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!--end::Fonts-->

		@stack('styles')

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('admin-panel/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin-panel/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Stylesheets Bundle-->
		<link href="{{ asset('admin-panel/css/main.css') }}" rel="stylesheet" type="text/css" />

		@stack('stylesAfter')

		<style>
			input[type="email"]::placeholder {text-align: right !important}
			input[type="password"]::placeholder {text-align: right !important}

			.daterangepicker th{
					font-weight: 700 !important
				}

			.cancelBtn, .applyBtn, .drp-calendar th  {
				font-size: 14px !important;
				font-weight: 700 !important;
			}

			.drp-selected{
				margin-right: auto !important;
				font-size: 14px !important;
				direction: rtl !important;
				margin-bottom: 8px;
				font-weight: 600
			}

				.swal2-container {
					z-index: 99999 !important;
				}
				.typeahead.dropdown-menu {
					right: 2rem !important;
					text-align: right!important;
					/* padding-right: 1rem!important; */
					z-index: 999999999999!important;
				}
				.select2-selection__choice__remove {
					margin-right: 0 !important;
				}
				.select2-selection__choice__display {
					margin-right: 1.2rem !important;
				}
				.select2-search__field {
					padding-bottom: 1.5rem !important;
				}
				.select2-container--bootstrap5 .select2-selection__clear {
					display: none !important;
				}
		</style>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="dark-mode header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

		<!--begin::Main-->

		@yield('main')

		<!--end::Main-->

		<!--begin::Javascript-->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>



		@stack('scripts')

		<script>
			const Toast = Swal.mixin({
					toast: true,
					position: 'bottom-start',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					iconColor: 'white',
					customClass: {
							popup: 'colored-toast'
					},
					didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
			})

			const ConstToast = Swal.mixin({
					toast: true,
					position: 'bottom-start',
					showConfirmButton: false,
					showCloseButton: true,
					timer: false,
					iconColor: 'white',
					customClass: {
							popup: 'colored-toast'
					},
			})

			@if (Session::has('message'))
					var type = "{{ Session::get('alert-type', 'info') }}"
					Toast.fire({
							icon: type,
							title: "{{ Session::get('message') }}"
					})
			@endif
	</script>

	<script>
			function doAction(event, text = null, isTable = false, message = null) {
					event.preventDefault();

					var text = text || $(event.target).text()
					var form = $(event.target.closest('form'))

					if (formaction = $(event.target).attr('formaction')) {
							form.attr('action', formaction)
					}

					var route = form.attr('action');

					var sure = message ? `${app_are_you_sure_want} ${text}${question}` : app_are_you_sure;
					var confirm = message ? app_confirm : app_delete;
					var method = message ? 'POST' : 'DELETE';

					Swal.fire({
							title: sure,
							icon: 'warning',
							showCancelButton: true,
							buttonsStyling: false,
							confirmButtonText: confirm,
							cancelButtonText: app_back,
							customClass: {
									confirmButton: "btn fw-bold btn-danger",
									cancelButton: "btn fw-bold btn-active-light-primary"
							}
					}).then((result) => {
							if (result.isConfirmed) {
									$.ajax({
											url: route,
											type: method,
											data: form.serialize(),
											success: function(data) {
													Swal.fire({
															icon: 'success',
															title: message || app_deleted,
															showConfirmButton: false,
															timer: 1500
													}).then(() => isTable ? (reloadTable()) : (window.location.href = data));
											},
											error: function(data) {
													var errors = data.responseJSON?.errors
													var message = errors ? errors[Object.keys(errors)[0]][0] : (data
															.responseJSON?.message || app_error);

													var message = errors ?
															errors[Object.keys(errors)[0]][0] :
															(data.responseJSON?.message || app_error)

													if (message) {
															return ConstToast.fire({
																	html: message,
																	icon: "error",
															});
													}
											}
									});

							}

					})
			}

			$(document).on('click', '.lang_button', function(e) {
					e.preventDefault()
					$.ajax({
							url: $(this).attr('href'),
							type: "GET",
							dataType: "json",
							success: function(data) {
									window.location.reload();
							},
							error: function(data) {
									window.location.reload();
							},
					});
			});

			function reloadTable() {
				$('table.dataTable').DataTable().ajax.reload()
					$('.checkAll').prop('checked', false)
					$('.deleteAll').hide()
			}

			document.addEventListener("keydown", function onPress(e) {
					if (e.which == 27) {
							$('.modal').modal('hide')
					}
			});
	</script>

	<script>
			$(document).on('click', '.ajax_pagination a', function(e) {
            e.preventDefault();

            $.ajax({
                url: e.target.href,
                type:"GET",
                dataType:"json",
                success: function(data) {

                    var el = $(e.target).closest('.ajax_pagination_container');

                    el.fadeOut(200, function () {

                        el.html(data.data);
                        $(e.target).parent().html(data.pagination);
                        el.css('opacity', '1');

                    }).fadeIn(200);
                },
                beforeSend: function() {
                    $(e.target).closest('.ajax_pagination_container').css('opacity', '0.5');
                },
            });
      });


		</script>

	<script>
				let loc = {
            "format": "YYYY/MM/DD",
            "separator": " - ",
            "applyLabel": "متابعة",
            "cancelLabel": "إلغاء",
            "fromLabel": "من",
            "toLabel": "إالى",
            "customRangeLabel": "مخصص",
            "firstDay": 6,
            "daysOfWeek": [
                "أحد",
                "اثنين",
                "ثلاثاء",
                "أربعاء",
                "خميس",
                "جمعة",
                "سبت"
            ],
            "monthNames": [
                "يناير",
                "فبراير",
                "مارس",
                "أبريل",
                "مايو",
                "يونيو",
                "يوليو",
                "أغسطس",
                "سبتمبر",
                "أكتوبر",
                "نوفمبر",
                "ديسمبر"
            ],
        }

				$("#kt_daterangepicker_1").daterangepicker({
							locale: loc,
							autoUpdateInput: false,
				})
				$("#kt_daterangepicker_31, #kt_daterangepicker_32, #kt_daterangepicker_33, #kt_daterangepicker_34").daterangepicker({
							locale: loc,
							autoUpdateInput: false,
							singleDatePicker: true,
							autoApply: true,
							showDropdowns: true,
				})

				$("#kt_daterangepicker_31, #kt_daterangepicker_32, #kt_daterangepicker_33, #kt_daterangepicker_34").on('apply.daterangepicker', function(ev, picker) {
						$(this).val(picker.startDate.format('YYYY/MM/DD'));
				});
		</script>

    @stack('scriptsAfter')

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
