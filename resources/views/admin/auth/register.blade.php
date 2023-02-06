@extends('layouts.admin.index')

@section('main')
    <!--begin::Main-->
    <form class="pad-hor" method="POST" role="form" action="{{ route('register') }}">
        <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 p-lg-15">
                <!--begin::Logo-->
                <a href="/" class="mb-12">
                    <img alt="Logo" src="{{ asset('imgs/logo.png') }}" class="h-100px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">انشاء حساب شركة</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">الاسم</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" dir="ltr" type="text"  name="name" required autofocus />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">البريد الالكتروني</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" dir="ltr" type="text" name="email" autocomplete="on" value="{{ old('email')}}" required autofocus/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">كلمة المرور</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" dir="ltr" type="password" name="password" autocomplete="on" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">تاكيد كلمة المرور</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" dir="ltr" type="password" name="password_confirmation" autocomplete="on" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">تسجيل</span>
                                <span class="indicator-progress">الرجاء الانتظار ...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('لدي حساب بالفعل') }}
                            </a>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    </form>
    <!--end::Main-->
@endsection

@push('scripts')
    <script src="{{ asset('admin-panel/js/custom/authentication/sign-in/general.js') }}"></script>
@endpush
