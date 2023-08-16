@extends('layouts.layoutV2')

@section('head')
<style>
    .fancy-checkbox{
        font-size: 10px;
        cursor: pointer;
        
    }

    .fancy-checkbox input[type="checkbox"],
    .fancy-checkbox .checked {
        display: none;
    }
    
    .fancy-checkbox input[type="checkbox"]:checked ~ .checked
    {
        display: inline-block;
        
    }
    
    .fancy-checkbox input[type="checkbox"]:checked ~ .unchecked
    {
        display: none;
    }
    .video-title{
        padding-left: 15px;
    }
    .video-title{
        color: #333;

    }
    .video-title:hover, .video-title:active{
        color: #333 !important;
        text-decoration: none !important;
    }
    .rate {
    display: flex;
    justify-content: center;
    flex-direction: row-reverse;
    
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:40px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
    
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>


@endsection


@section('content')
    <div class="container" style="min-height: 80vh;">
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <div class="row">
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-doc font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">{{__('User/feedback.feedback')}}</span>
                                </div>

                            </div>
                            <div class="portlet-body">

                                <form action="{{route('user.feedback.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{__('User/feedback.rating')}} :
                                            </div>
                                            <div class="col-md-9 rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="{{__('User/feedback.5stars')}}" >5 stars</label>


                                                <input type="radio" id="star4"  name="rate" value="4" />
                                                <label for="star4" title="{{__('User/feedback.4stars')}}" >4 stars</label>


                                                <input type="radio" id="star3"   name="rate" value="3" />
                                                <label for="star3" title="{{__('User/feedback.3stars')}}">3 stars</label>


                                                <input type="radio" id="star2"  name="rate" value="2" />
                                                <label for="star2" title="{{__('User/feedback.2stars')}}" >2 stars</label>


                                                <input type="radio" id="star1"  name="rate" value="1" />
                                                <label for="star1" title="{{__('User/feedback.1stars')}}">1 stars</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{__('User/feedback.title')}} :
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="title" class='uk-input'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{__('User/feedback.feedback')}} :
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="feedback" id="feedback" class="uk-input" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-2 col-md-offset-10">
                                                <input type="submit" value="{{__('User/feedback.send')}}" class="btn green form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>

                    <div class="col-md-6">
                        <div class="portlet light bordered">

                            <div class="portlet-body">


                                <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
                                    @foreach(\App\Feedback::where('user_id', Auth::user()->id)->where('disable', 0)->orderBy('created_at', 'desc')->get() as $feed)
                                    <div style="width: 100%;">
                                        <div class="uk-card uk-card-primary uk-card-body">
                                            <span class="uk-card-title">{{$feed->created_at->diffForHumans()}}</span>
                                            <a href="{{route('user.feedback.delete', $feed->id)}}" style="float: {{app()->getLocale() == 'en'? 'right': 'left'}}; margin: 0 5px 0 0;">{{__('User/feedback.delete')}}</a>
                                            <h5>{{$feed->feedback}}</h5>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
