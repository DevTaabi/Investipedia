To verify the email
<a href="{{route('sendemailDone',["email"=>$user->email,"verifyToken" => $user->verifyToken])}}">Click here</a>