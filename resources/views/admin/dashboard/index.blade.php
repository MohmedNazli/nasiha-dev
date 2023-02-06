@extends('layouts.admin.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        @include('admin.dashboard.breadcrumb')
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
