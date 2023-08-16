@extends('layouts.student-layout')
@section('css')
<style>
.accordion-button::after {
    margin-right: auto;
    margin-left: 0 !important;
}
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content bg-white ">
            <h3 class="box-title mb-20 fw-500 me-4">جميع المواد الدراسية</h3>
            <div class="row container">
                @foreach($userPartsByPackage as $package)
                    <h3 class="box-title mb-20 fw-500">{{$package->first()->package_name}}</h3>
                    @foreach($package as $part)

                        <div class="box-body bg-primary-light mb-30 px-xl-5 px-xxl-20 pull-up">
                            <div class="d-flex align-items-center ps-xl-20">
                                <div class="d-flex flex-column w-75">
                                    <a href="#" class="text-dark hover-primary mb-5 fw-600 fs-18">
                                        {{ $part->part_title }}
                                        <h4>
                                            <small>{{$part->teacher_name}}</small>
                                        </h4>
                                    </a>

                                    <div class="row p-left-10">
                                        <div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
                                            <p class="my-10"><span class="m-left-5">5  فيديو</span><span><i class="si-book-open si"></i></span></p>
                                            {{--<p> <span class="m-left-5">5 إختبار</span> <span><i class="si-note si"></i></span></p>--}}
                                        </div>
                                        <div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
                                            <p class="my-10"> <span class="m-left-5">50 دقيقة</span><span><i class="si-clock si"></i></span></p>
{{--                                            <p><span class="m-left-5">312 طالب</span><span><i class="si-people si"></i></span></p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between  mx-lg-10 mt-10">
                                <h2 class="my-5 c-green"></h2>
                                <div class="text-center">
                                    {{--										<a type="button" href="course_metrial.html"  class="waves-effect waves-light btn rounded10  me-xxl-25 me-lg-15 me-15 bg-green-br text-fade mb-5 px-25 py-8">المحتوي</a>--}}
                                    <a type="button" href="{{ route('student.package.details', [$part->package_id, $part->part_id]) }}" class="btn-primary waves-effect waves-light btn  bg-green mb-5 px-25 py-8">استمرار</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endforeach

            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')

<script src="{{ asset('assets-student/assets/vendor_plugins/weather-icons/WeatherIcon.js') }}"></script>
<script src="{{ asset('assets-student/js/pages/weather.js') }}"></script>
@endsection
