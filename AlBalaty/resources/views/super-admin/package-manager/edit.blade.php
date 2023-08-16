@extends('layouts.super-admin-layout')

@section('pageTitle') Teacher @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon">
                <i class="text-primary flaticon-business icon-2x"></i>
            </span>
        <h3 class="card-label pr-2">Package Manager </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('super-admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Pacakges</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="app.store()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-lg">
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
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('super-admin.package-manager.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-lg">
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

    <!-- begin::Pricing -->
    <div class="bg-white rounded p-10" id="app1">

        <!--begin::Card-->
        <div class="card card-custom card-fit card-border my-3">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon-info icon-2x text-primary px-2"></i>
                    </span>
                    <h3 class="card-label">General Information</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <h2 class="text-primary">Package Name</h2>
                        <p>{{$package->package_name}}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-primary">Package Renew Period</h2>
                        <p>{{$package->renew_period_in_days ? $package->renew_period_in_days.' Days': 'One Time Payment.'}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <h2 class="text-primary">Teacher Name</h2>
                        <p>{{$package->teacher_name}}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-primary">Package Language</h2>
                        <p>{{$package->lang}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <h2 class="text-primary">Description</h2>
                        <p>{!! $package->description !!}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-primary">What you will learn</h2>
                        <p>{!!$package->what_you_learn !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <h2 class="text-primary">Requirement</h2>
                        <p>{!! $package->requirement !!}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-primary">Who Course For</h2>
                        <p>{!! $package->who_course_for !!}</p>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom card-fit card-border">
            <div class="card-header">
                <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    <h3 class="card-label">Pricing</h3>
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="form-group row">
                    <div class="col-md-5">
                        <label>Fallback Price ($)</label>
                        <input type="text" v-model="fallback_price" class="form-control form-control-solid" id="price_zone_0" data-id="0" v-on:change="estimatePrices">
                    </div>
                    <div class="col-md-5">
                        <label>Fallback Discount (%)</label>
                        <input type="text" v-model="fallback_discount" class="form-control form-control-solid" id="discount_zone_0" data-id="0" v-on:change="estimatePrices">
                    </div>

                    <div class="col-md-2">
                        <label>Estimated Price</label>
                        <input class="form-control form-control-solid" type="text" id="final_price_zone_0" disabled/>
                    </div>
                </div>

                <div class="form-group row" v-for="i in zones">
                    <div class="col-md-5">
                        <label><b>@{{i.name}}</b> Price ($)</label>
                        <input class="form-control form-control-solid" type="text" :id="'price_zone_'+i.id" :data-id="i.id" v-on:change="estimatePrices"/>
                    </div>
                    <div class="col-md-5">
                        <label><b>@{{i.name}}</b> Discount (%) </label>
                        <input class="form-control form-control-solid" type="text" :id="'discount_zone_'+i.id" :data-id="i.id" v-on:change="estimatePrices"/>
                    </div>
                    <div class="col-md-2">
                        <label>Estimated Price</label>
                        <input class="form-control form-control-solid" type="text" :id="'final_price_zone_'+i.id" disabled/>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom card-fit card-border my-3">

            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon-settings-1 icon-2x text-primary px-2"></i>
                    </span>
                    <h3 class="card-label">Approved</h3>
                </div>
                <div class="card-toolbar">
                    <span class="switch switch-lg">
                        <label>
                            <input type="checkbox" v-model="approved">
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>
        </div>
        <!--end::Card-->


    </div>
    <!-- end::Pricing -->

@endsection


@section('jscode')
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif

    <script>

        var app = new Vue({
            el: '#app1',
            data:{
                approved: {{$package->approved ? 'true': 'false'}},

                /** Pricing */
                zones: [],
                fallback_price: '{{$package->pricing['original_price']}}',
                fallback_discount: '{{$package->pricing['localized_onItem_discount']}}',


            },
            mounted(){
                KTApp.blockPage();
                this.loadZones();
                KTApp.unblockPage();
            },
            methods: {
                storeRequest: async function(data){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('super-admin.package-manager.update', $package_id)}}',
                        data,
                        error: function(err){
                            KTApp.unblockPage();
                            console.log(err);
                        }
                    });
                },
                store: async function(){
                    if(!this.validation()){
                        return;
                    }

                    const data = {
                        fallback_price          : app.fallback_price,
                        fallback_discount       : app.fallback_discount,
                        zones                   : app.getZonesPricing(),
                        approved                : app.approved,
                    };



                    await app.storeRequest(data).then((res) => {
                        swal({
                            title: 'Package Updated',
                            type: 'success',
                            cancelButtonText: 'Ok'
                        }).then(()=>{
                            window.location.replace('{{route('super-admin.package-manager.index')}}');
                        });
                    });
                },
                validation: function(){
                    /** Pricing */
                    if(this.fallback_price == '' || parseFloat(this.fallback_price) <= 0){
                        this.displayMessage('Fallback price, Is required !');
                        return false;
                    }
                    const wrongPricing = this.getZonesPricing().find(function(zone){
                        // zones with empty price
                        return zone.price == '' || parseFloat(zone.price) <= 0;
                    });
                    if(wrongPricing){
                        this.displayMessage('Price of Zone " '+wrongPricing.zone_name+' ", Is required !');
                        return false;
                    }

                    return true;

                },
                displayMessage: function(err, type = 'warning'){
                    swal({
                        title: ''+err+'',
                        type: type,
                        //   confirmButtonColor: '#DD6B55',
                        cancelButtonText: 'Ok'
                    });
                },

                getFallbackDiscount: function(input = null){
                    value = input ?? this.fallback_discount;
                    return (value == ''? null: parseFloat(value)) ?? 0;
                },
                getZonesPricing: function(){
                    return this.zones.map(function(zone){
                        return {
                            zone_id: zone.id,
                            zone_name: zone.name,
                            price: app._('price_zone_'+zone.id).value,
                            discount: app.getFallbackDiscount(app._('discount_zone_'+zone.id).value),
                        };
                    });
                },

                /**
                 * @param ele
                 * @param items array [ { text:'' , value: '',} ...]
                 * @returns {DualListbox}
                 */
                _: function(ele){
                    return document.getElementById(ele);
                },
                estimatePrices: function(e){
                    const zone_id = e.target.dataset.id;
                    const price = this._('price_zone_'+zone_id).value;
                    const discount = this._('discount_zone_'+zone_id).value;
                    this._('final_price_zone_'+zone_id).value = (Math.round(price * (1 - discount / 100) * 100) / 100 )+' $';
                },
                loadZones: async function(){
                    this.zones = await this.fetchZones();
                },
                fetchZones: function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('zone.fetch')}}',
                    });
                },
                getPaths:async function(){
                    return await this.fetchLibrary('', 'path');
                },
                getChapters:async function(){
                    return await this.fetchLibrary(this.course_id, 'chapter');
                },
                getExams: async function(){
                    return await  this.fetchLibrary(null, 'exams');
                },
                getDomains: async function(){
                    return await  this.fetchLibrary(null, 'domains');
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
            },
        });

    </script>

@endsection
