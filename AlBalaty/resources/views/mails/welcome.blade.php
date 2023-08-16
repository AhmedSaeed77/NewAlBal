dear, {{$data['name']}} Welcome to {{env('APP_NAME')}}.
<a href="{{route('activateAccount',$data['id'])}}?hash={{$data['hash']}}"> Click Here to Confirm You Account</a>
