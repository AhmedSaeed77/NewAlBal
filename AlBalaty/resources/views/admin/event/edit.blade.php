@extends('layouts.admin-layout')
@section('pageTitle') Edit Event @endsection

@section('subheaderTitle') Edit Event @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="app.storeEvent()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Submit</a>
    <!--end::Button-->

    <!--begin::Button-->
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('event.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>
                <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Cancel</a>
    <!--end::Button-->
@endsection

@section('content')

    <div class="row" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">

            <div class="form-horizontal " style="background: white; padding: 30px 15px;" id="app-1" >

                <h2>Event Details</h2>
                <hr>
                <!--<div class="row">-->
                <!--    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">-->
                <!--        Active :-->
                <!--    </div>-->
                <!--    <div class="col-10">-->
                <!--        <span class="switch switch-icon">-->
                <!--            <label><input type="checkbox" v-model="event_active"> <span></span></label>-->
                <!--        </span>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Title:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="event_title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Language:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="event_lang" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Total Lectures Time:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="total_time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Total Lectures count:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="total_lecture" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1" style="text-align: center;">{{config('library.path.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getCourses" v-model="path_id">
                            <option value=""></option>
                            <option v-for="i in paths" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1" style="text-align: center;">{{config('library.course.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-model="course_id">
                            <option value=""></option>
                            <option v-for="i in courses" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Picuture:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="file" name="event_picture" class="form-control" id="event_picture">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Event Description :
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea id="description" rows="10" class="form-control">{!!$event->description!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        What you'll learn :
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea id="what_you_learn" rows="10" class="form-control">{!!$event->what_you_learn!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Requirement :
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea id="requirement" rows="10" class="form-control">{!!$event->requirement!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Who this course is for :
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea id="who_course_for" rows="10" class="form-control">{!!$event->who_course_for!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Enroll Message :
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea id="enroll_msg" rows="10" class="form-control" placeholder="English">{!!$event->enroll_msg!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Free Included Package :
                    </div>
                    <div class="col-md-10" >
                        <div class="form-group">
                            <select name="free_package_id[]" id="free_package_id" multiple class="form-control" v-model="free_package_id">
                                <option value="--">Non</option>
                                @foreach(\App\Models\Package\Packages::where('active', 1)->get() as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        WhatsApp Link:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="whatsapp" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                       google meet Link:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" v-model="zoom" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Certification:
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <select class="form-control" v-model="certification" id="certification">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="certification == 1">
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Certification Title(optional):
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Certification Title "
                                   v-model="certification_title" id="certification_title"/>
                        </div>
                    </div>
                </div>

                <h2>Event Days</h2>
                <hr>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <td>Day</td>
                        <td>From</td>
                        <td>To</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="day in days">
                        <td>@{{ day.day }}</td>
                        <td>@{{ day.from }}</td>
                        <td>@{{ day.to }}</td>
                        <td>
                            <a v-on:click="day_delete(day.day)">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-1 "  style="margin-top:20px;">
                        Day :
                    </div>
                    <div class="col-md-11 " >
                        <div class="form-group" style="display: inline-flex;">
                            <input type="date" v-model="day_day" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-1 "  style="margin-top:20px;">
                        From :
                    </div>
                    <div class="col-md-2" >
                        <div class="form-group" style="display: inline-flex;">
                            <input type="text" v-model="day_from_hour" id="time" placeholder="00" class="form-control" >
                            <input type="text" v-model="day_from_min" id="time" placeholder="00" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-1 "  style=" margin-top:20px;">
                        To :
                    </div>
                    <div class="col-md-2 " >
                        <div class="form-group" style="display: inline-flex;">
                            <input type="text"  v-model="day_to_hour" placeholder="00"  class="form-control" >
                            <input type="text"  v-model="day_to_min" placeholder="00" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top:13px;">
                        <a v-on:click="add_day" class="btn btn-success">Add</a>
                    </div>
                </div>
                <h2>Pricing</h2>
                <hr>
                @foreach($prices as $zone)
                    <div class="row" >
                        <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                            <b>{{$zone->name}} -</b> Price ($) :
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="number" v-model="price_zone_{{$zone->id}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                            <b>{{$zone->name}} -</b> Discount (%):
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="number" v-model="discount_zone_{{$zone->id}}" class="form-control">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row" >
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Original Price ($) :
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <input type="number" v-model="event_price" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2"  style="display:flex; justify-content: center; margin-top:10px;">
                        Discount (%):
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <input type="number" v-model="event_discount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-10">
                        <a v-on:click="storeEvent" class="btn btn-success form-control">Edit</a>
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>

        var app = new Vue({
            el: '#app-1',
            data: {
                event_id: {{$event->id}},
                // event_active: @if($event->active) true @else false @endif,
                event_title: '{{$event->name}}',
                event_lang: '{{$event->lang}}',

                free_package_id: [
                    @foreach(\App\EventFreePackage::where('event_id', $event->id)->get() as $free)
                        '{{$free->package_id}}',
                    @endforeach
                ],

                ck_array: {
                    'event_description': null,
                    'event_what_you_learn': null,
                    'event_requirement': null,
                    'event_who_course_for': null,
                    'event_enroll_msg': null,
                },

                event_price: '{{ $event->original_price }}',
                event_discount: '{{$event->discount}}',
                event_picture: '',
                path_id:'{{$event->path_id}}',
                course_id:'{{$event->course_id}}',
                paths: [],
                courses: [],
                total_time: '{{$event->total_time}}',
                total_lecture: '{{$event->total_lecture}}',
                day_day: '',
                whatsapp: '{{$event->whatsapp}}',
                zoom: '{{$event->zoom}}',
                certification: '{{$event->certification ? 1 : 0}}',
                certification_title: '{{$event->certification_title}}',

                day_from_hour: '',
                day_from_min: '',

                day_to_hour: '',
                day_to_min: '',

                days: [
                        @foreach(\App\EventTime::where('event_id', $event->id)->get() as $time)
                    {
                        'day': '{{$time->day}}',
                        'from': '{{$time->from}}',
                        'to': '{{$time->to}}',
                    },
                    @endforeach
                ],

                @foreach($prices as $zone)
                price_zone_{{$zone->id}}: '{{$zone->original_price}}',
                discount_zone_{{$zone->id}}: '{{$zone->discount}}',
                @endforeach
            },
            mounted(){
                this.ck_array.event_description = this.initEditor('description', 200);
                this.ck_array.event_what_you_learn = this.initEditor('what_you_learn', 200);
                this.ck_array.event_requirement = this.initEditor('requirement', 200);
                this.ck_array.event_who_course_for = this.initEditor('who_course_for', 200);
                this.ck_array.event_enroll_msg = this.initEditor('enroll_msg', 200);
                this.getPaths();
                this.getCourses();
            },
            methods: {
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                    });
                },
                fetchLibrary: function(parent_topic_id, topic_required){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.fetch')}}',
                        data: {
                            parent_topic_id,
                            topic_required,
                        },
                    });
                },
                getPaths :async function(){
                    this.paths = await this.fetchLibrary(null, 'path');
                },
                getCourses:async function(){
                    this.courses = await this.fetchLibrary(this.path_id, 'course');
                },
                _: function (ele) {
                    return document.getElementById(ele);
                },

                add_day: function(){

                    if(this.validate_day())
                    {
                        day = {
                            'day': this.day_day,
                            'from': this.day_from_hour+':'+this.day_from_min,
                            'to': this.day_to_hour+':'+this.day_to_min,
                        };

                        this.days.push(day);

                        this.day_empty();
                    }

                },
                validate_day: function(){
                    if(this.day_day == '' || this.day_from_hour == '' ||
                        this.day_to_hour == '' ){
                        return 0;
                    }

                    if(this.day_from_min == ''){
                        this.day_from_min = '00';
                    }
                    if(this.day_to_min == ''){
                        this.day_to_min = '00';
                    }

                    this.day_from_hour = this.prefix(this.day_from_hour);
                    this.day_from_min = this.prefix(this.day_from_min);
                    this.day_to_hour = this.prefix(this.day_to_hour);
                    this.day_to_min = this.prefix(this.day_to_min);



                    return 1;
                },
                day_empty: function(){
                    this.day_day = '';
                    this.day_from_hour = '';
                    this.day_from_min = '';
                    this.day_to_hour = '';
                    this.day_to_min = '';
                },
                day_delete: function(day){


                    this.days.forEach(function(i, index){
                        if(i.day == day){
                            app.days.splice(index, 1);
                        }
                    });

                },
                prefix: function(time){
                    if(time.length == 1){
                        return '0'+time;
                    }else if(time.length == 2){
                        return time;
                    }else{
                        return time.slice(0, 2);
                    }

                    if(time >= 24){
                        return '00';
                    }

                },
                storeEvent: function () {

                    Errors = [];

                    this.event_picture = $('#event_picture')[0].files[0];

                    /**
                     * validate Event Details
                     */
                    if(this.event_title == ''){
                        Errors.push('Title is required !');
                    }

                    /**
                     * validate Event Language
                     */
                    if(this.event_lang == ''){
                        Errors.push('Language is required !');
                    }
                    /**
                     * validate Event course id
                     */
                    if(this.course_id == ''){
                        Errors.push('Course is required !');
                    }


                    /**
                     * validate Event Language
                     */
                    // if(!this.event_picture){
                    //     Errors.push('Event Picture is reqired !');
                    // }


                    if(this.event_start == '' || this.event_end == ''){
                        Errors.push('Event Start and end dates are required !');
                    }
                    /**
                     * Validate Event days
                     */
                    if(this.days.length <= 0){
                        Errors.push('Event Days are required (one day at least ) !');
                    }

                    /**
                     * validate event price
                     */
                    if(this.event_price == ''){
                        Errors.push('Price is required');
                    }
                    if(this.event_discount == ''){
                        this.event_discount = 0;
                    }


                    if(Errors.length == 0){


                        var formdata = new FormData();

                        formdata.append('_token', '{{ csrf_token() }}');
                        formdata.append('event_id', app.event_id);
                        formdata.append('title', app.event_title);
                        formdata.append('title_ar', app.event_title_ar);
                        formdata.append('lang', app.event_lang);
                        formdata.append('description', app.ck_array.event_description.getData());
                        formdata.append('what_you_learn', app.ck_array.event_what_you_learn.getData());
                        formdata.append('requirement', app.ck_array.event_requirement.getData());
                        formdata.append('who_course_for', app.ck_array.event_who_course_for.getData());
                        formdata.append('enroll_msg', app.ck_array.event_enroll_msg.getData());
                        formdata.append('start', app.event_start);
                        formdata.append('end', app.event_end);
                        formdata.append('days', JSON.stringify(app.days) );
                        formdata.append('originalPrice', app.event_price);
                        formdata.append('discount', app.event_discount);
                        formdata.append('picture', app.event_picture);
                        formdata.append('path_id', app.path_id);
                        formdata.append('course_id', app.course_id);
                        formdata.append('total_time', app.total_time);
                        formdata.append('total_lecture', app.total_lecture);
                        formdata.append('free_package_id', app.free_package_id);
                        formdata.append('active', app.event_active);
                        @foreach($prices as $zone)
                        formdata.append('price_zone_{{$zone->id}}', app.price_zone_{{$zone->id}});
                        formdata.append('discount_zone_{{$zone->id}}', app.discount_zone_{{$zone->id}});
                        @endforeach
                        formdata.append('whatsapp', app.whatsapp);
                        formdata.append('zoom', app.zoom);
                        formdata.append('certification', app.certification);
                        formdata.append('certification_title', app.certification_title);
                        
                        var ajax = new XMLHttpRequest();

                        ajax.addEventListener('load', this.completeHandler, false); // complete event
                        ajax.addEventListener('error', this.errorHandler, false);


                        ajax.open("POST" ,"{{ route('event.update') }}");
                        ajax.send(formdata);
                        KTApp.blockPage();




                    }else{

                        swal({
                            title: ''+Errors[0]+'',
                            type: 'warning',
                            //   confirmButtonColor: '#DD6B55',
                            cancelButtonText: 'Ok'
                        });
                    }





                },
                completeHandler: function(event){
                    console.log(JSON.parse(event.target.responseText));
                    KTApp.unblockPage();
                    if( event.target.responseText == 0){

                        swal({
                            title: 'Edit Complete Successfully.',
                            type: 'success',
                            cancelButtonText: 'Ok'
                        }).then(function(){
                            location.replace('{{route('event.index')}}');
                        });


                    }else{
                        swal({
                            title: event.target.responseText,
                            type: 'warning',
                            cancelButtonText: 'Ok'
                        });
                    }
                },
                errorHandler: function(event){
                    console.log(event);
                    KTApp.unblockPage();
                    swal({
                        title: 'Error !',
                        type: 'error',
                        cancelButtonText: 'Ok'
                    });
                }

            }
        });

    </script>
@endsection