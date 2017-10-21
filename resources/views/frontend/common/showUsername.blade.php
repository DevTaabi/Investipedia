@if(Auth::user()->role == 0)
    @inject('username','App\Regular')
    {{$username->where('user_id',Auth::user()->id)->value('username')}}
@endif
@if(Auth::user()->role == 1)
    @inject('company_name','App\Company')
    {{$company_name->where('user_id',Auth::user()->id)->value('company_name')}}
@endif