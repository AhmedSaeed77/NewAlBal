@extends('layouts.layoutV2')

@section('content')
    <h3> {{\App\Course::find($course_id)->title}} </h3>

    <div class="section-small">

        <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2" uk-grid>
            @if(\App\Material::where('course_id', '=', $course_id)->get()->first())
                @foreach(\App\Material::where('course_id', '=', $course_id)->get() as $m)
                    <div>
                        <a href="{{route('download.material', $m->id)}}" class="uk-text-bold">
                            @if($m->cover_url)
                                <img src="{{asset('storage/material/'.basename($m->cover_url))}}" class="mb-2 w-100 shadow rounded">
                            @else
                                <img src="{{asset('assetsV2/images/book/html5.jpg')}}" class="mb-2 w-100 shadow rounded">
                            @endif

                            {{$m->title}}
                        </a>
                    </div>
                @endforeach
            @else
                <p>Nothing to show !</p>
            @endif

        </div>

    </div>
@endsection
