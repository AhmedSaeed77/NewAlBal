@extends('layouts.layoutV2')

@section('content')

    <div class="" id="app-1">

        <div data-src="{{asset('assetsV2/images/help_background.svg')}}" uk-img
             class="uk-height-large uk-background-norepeat  uk-background-center-center uk-background-image@s uk-section uk-padding-remove-top uk-flex uk-flex-middle">
            <div class="uk-width-1-1 uk-container">
                <div class="uk-container-xsmall uk-margin-auto uk-text-center">
                    <h3>{{__('User/faq.welcome')}}</h3>
                    <div class="uk-margin">

                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon"><i style="margin-bottom: 15px;" class="uil-search"></i></span>
                            <input class="uk-input  uk-form-large" type="text"
                                   placeholder="{{__('User/faq.search-something')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-margin-auto">
            <h4> {{__('User/faq.faq')}} </h4>
            <article class="uk-card-default p-4 rounded">
                <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                    @foreach(\App\FAQ::orderBy('created_at', 'desc')->get() as $q)
                    <li>
                        <a class="uk-accordion-title" href="#">{{$q->title}}</a>
                        <div class="uk-accordion-content">
                            <p>{!! $q->contant !!}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </article>
        </div>

        <div class="comments container mx-auto">
            <ul>
                @foreach($comments as $comment)
                    @if(\App\Models\Auth\User::find($comment->user_id))
                    <li>
                        @php
                            $profile_pic = asset('assets/layouts/layout/img/avatar3_small.jpg');
                            $ud = App\UserDetail::where('user_id', '=', $comment->user_id)->get()->first();
                            if($ud){
                                if($ud->profile_pic){
                                    $profile_pic =url('storage/profile_picture/'.basename($ud->profile_pic));
                                }
                            }
                        @endphp

                        <div class="comments-avatar">
                            <img src="{{$profile_pic}}" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="comment-by">{{\App\Models\Auth\User::find($comment->user_id)->name}} <span>{{$comment->created_at->diffForHumans()}}</span>
                                <a @click.prevent="ShowReplyForm({{$comment->id}})" class="reply"><i class="icon-line-awesome-undo"></i> {{__('User/faq.reply')}}</a>
                            </div>
                            <p> {{$comment->contant}} </p>
                        </div>

                        <ul>
                            <li id="reply-form-{{$comment->id}}"></li>
                            @foreach(\App\Comment::whereIn('id', \App\Reply::where('reply_to_id','=',$comment->id)->pluck('comment_id')->toArray() )->orderBy('created_at', 'desc')->get() as $reply)
                                @if(\App\Models\Auth\User::find($reply->user_id))
                                    @php
                                        $profile_pic = asset('assets/layouts/layout/img/avatar3_small.jpg');
                                        $ud = App\UserDetail::where('user_id', '=', $reply->user_id)->get()->first();
                                        if($ud){
                                            if($ud->profile_pic){
                                                $profile_pic =url('storage/profile_picture/'.basename($ud->profile_pic));
                                            }
                                        }
                                    @endphp

                                    <li id="reply-form-{{$comment->id}}">
                                        <div class="comments-avatar"><img src="{{$profile_pic}}" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-by">{{\App\Models\Auth\User::find($reply->user_id)->name}}<span>{{$reply->created_at->diffForHumans()}}</span>

                                            </div>
                                            <p> {{$reply->contant}} </p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>
                    @endif
                @endforeach


            </ul>


            <h3>{{__('User/faq.submit-review')}}</h3>
            <ul>
                <li>
                    @php

                        $profile_pic = '';
                        if(Auth::check()){
                            if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first() ){
                                if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first()->profile_pic){
                                    $profile_pic =url('storage/profile_picture/'.basename(\App\UserDetail::where('user_id','=',Auth::user()->id)->get()->first()->profile_pic));
                                }else{
                                    $profile_pic =asset('assets/layouts/layout/img/avatar3_small.jpg');
                                }
                            }else{
                                $profile_pic =asset('assets/layouts/layout/img/avatar3_small.jpg');
                            }
                        }

                    @endphp
                    <div class="comments-avatar"><img src="{{$profile_pic}}" alt="">
                    </div>
                    <div class="comment-content">
                        <form class="uk-grid-small" action="{{route('comment.store')}}" method="post" uk-grid>
                            @csrf
                            <input type="hidden" name="page" value="faq">
                            <input type="hidden" name="item_id" value="1">
                            <div class="uk-width-1-1@s">
                                <label class="uk-form-label">{{__('User/faq.comment')}}</label>
                                <textarea class="uk-textarea"
                                          name="contant"
                                          placeholder="{{__('User/faq.comment-here')}}"
                                          style=" height:160px" required></textarea>
                            </div>
                            <div class="uk-grid-margin">
                                <input type="submit" value="{{__('User/faq.submit')}}" class="btn btn-default">
                            </div>
                        </form>

                    </div>
                </li>
            </ul>
        </div>

    </div>
@endsection

@section('jscode')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        @php


        @endphp
        var app = new Vue({
            el: '#app-1',
            data: {

                rate_value: 0,
                rate_sentance: '',
                user_review: '',

            },
            methods: {

                _: function (ele) {
                    return document.getElementById(ele);
                },

                ShowReplyForm: function (comment_id) {
                    if (this._('reply-form-' + comment_id).innerHTML == '') {
                        this._('reply-form-' + comment_id).innerHTML = '<div class="row"><div class="col-md-10 col-md-offset-2"><form action="{{route("comment.reply")}}" method="post">@csrf<input type="hidden" name="reply_to_id" value="'+comment_id+'"><div class="form-group col-md-8" style="padding-left: 0 !important;"><textarea rows="1" name="contant" required placeholder="Write comment here ..." class="form-control c-square"></textarea></div><div class="form-group col-md-4"><div class="row"><button type="submit" class="btn blue uppercase btn-md col-md-6 sbold">Reply</button></div></div></form></div></div>';
                    } else {
                        this._('reply-form-' + comment_id).innerHTML = '';
                    }
                },
                removeReplyForm: function (comment_id) {
                    this._('reply-form-' + comment_id).innerHTML = '';
                    alert('ok');
                },

            }
        });
    </script>
@endsection
