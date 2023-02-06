@extends('layouts.admin.app')

@push('styles')
  <link href="{{ asset('admin-panel/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
  <style>
    table.dataTable > thead > tr > td:not(.sorting_disabled), table.dataTable > thead > tr > th:not(.sorting_disabled),
    table.dataTable > thead > tr > th:not(.sorting_disabled), table.dataTable > thead > tr > td:not(.sorting_disabled)
    {
      padding-right: 0.75rem !important;
    }

    .ltr_col {direction: ltr}
    .rtl_col {direction: rtl}
    table.dataTable th {
      font-weight: 700;
      color: #000;
      background-color: #ccc;
    }

  </style>
@endpush

@section('content')
  <div class="app-content flex-column-fluid ">
    <div class="app-container container-xxl ">
      <div class="card card-p-0 card-flush">
        @yield('table')
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('admin-panel/plugins/custom/datatables/datatables.bundle.js') }}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
  <script src="{{ asset('admin-panel/js/app/delete_datatables.js') }}"></script>
  <script src="{{ asset('admin-panel/js/app/ar_datatables.js') }}"></script>
  <script>
      $(window).on('load', function () {
        var th_checkboxs = $('th.checkbox');
        Array.from(th_checkboxs).forEach(function (ch, index) {
          $(ch).html(`
            <div class="form-check form-check-custom form-check-solid d-block text-center">
              <input class="form-check-input checkAll" type="checkbox" value="" id="checkAll${index}"/>
              <label class="form-check-label fw-bolder" for="checkAll${index}"></label>
            </div>
          `)
        })

      })

    $(document).on('click', '.checkAll', function () {
      // console.log(  $(this).closest('table'));
      if ($(this).is(':checked')) {
        $(this).parents('table').find('td.checkbox').find('input').prop('checked', true)
      } else {
        $(this).parents('table').find('td.checkbox').find('input').prop('checked', false)
      }
      checkedInputs(this)
    })

    $(document).on('click', '.deleteCheck', function () {

      if ($(this).parents('table').find('input.deleteCheck:checked').length != $(this).parents('table').find('input.deleteCheck').length) {
        $(this).parents('table').find('.checkAll').prop('checked', false);
      } else {
        $(this).parents('table').find('.checkAll').prop('checked', true);
      }

      checkedInputs(this)
    })

    function checkedInputs(target) {
      var delForm = $(target).closest('.dataTables_wrapper').siblings('[data-kt-docs-table-toolbar="base"]').find('form')
      var checkedInputs = $(target).closest('table').find('input.deleteCheck:checked')
      if (checkedInputs.length) {
        delForm.find('.deleteAll').show()
        delForm.find('.appendInputs').html('')

        checkedInputs.each(function () {
          delForm.find('.appendInputs').append(`<input type="hidden" value="${$(this).val()}" name="selected[]">`)
        })

      } else {
        delForm.find('.appendInputs').html('')
        delForm.find('.deleteAll').hide()
      }
    }

    $(document).on('click', '[data-bs-target="#kt_modal_edit"]', function(e) {
      fillEditForm($(this), id = '', fields_raw, fields_data, fields_data_select, fields_data_select_relation, fields_data_select_raw, fields_data_img)
    });

    function fillEditForm(target, id, fields_raw = [], fields_data = [], fields_data_select = [], fields_data_select_relation = [], fields_data_select_raw = []) {
      var modalEditID = `#kt_modal_edit${id}`
      var row_data = $('table.dataTable').DataTable().row($(target).parents('tr')).data();
      $(`#kt_modal_edit${id}_form`).attr('action', $(target).attr('href'))
      Array.from(fields_raw).map((v) => $(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).attr('value', $(row_data[v]).text().trim()))
      Array.from(fields_data).map((v) => ($(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).attr('value', row_data[v]), $(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).text(row_data[v])))
      Array.from(fields_data_select).map((v) => $(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).find(`option:contains("${row_data[v]}"), [value="${row_data[v]}"]`).prop("selected", "selected").change())
      Array.from(fields_data_select_relation).map((v) => $(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).select2({dropdownParent: $(modalEditID)}).val(row_data[v]).trigger('change'))
      Array.from(fields_data_select_raw).map((v) => $(`#kt_modal_edit${id}_form`).find(`[name="${v}"]`).find(`option:contains("${$(row_data[v]).text().trim()}")`).prop("selected", "selected").change())
      Array.from(fields_data_img).map((v) => $(`#kt_modal_edit${id}_form`).find(`.data_${v}`).css('background-image',` url(${row_data[v]})`))
    }
  </script>
@endpush
