@php
  $canUpdate ??= null;
@endphp
<div class="toolbar" id="kt_toolbar">
  <!--begin::Container-->
  <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
      <!--begin::Title-->
      <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $pluralName }}
      <!--begin::Separator-->
      <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
      <!--end::Separator-->
      <!--begin::Description-->
      <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
          <li class="breadcrumb-item text-muted">
            @if (isset($createBreadcrumb))
                {{ __('main.create', ['name' => $createBreadcrumb]) }}
            @elseif(isset($editBreadcrumb))
            @if ($canUpdate)
              {{ __('main.edit_form', ['name' => $editBreadcrumb]) }}
            @else
              {{ __('main.show_form', ['name' => $editBreadcrumb]) }}
            @endif
            @elseif(isset($customBreadcrumb))
              {{ $customBreadcrumb }}
            @else
              {{ __('main.list', ['name' => $pluralName ]) }}
            @endif
          </li>
        </li>
        <!--end::Item-->
      </ul>     
       <!--end::Description-->
      </h1>
      <!--end::Title-->
    </div>
    <!--end::Page title-->
  </div>
  <!--end::Container-->
</div>