<h2>Hey, It's me {{ $data->first_name }}</h2>
<br>

<strong>User details: </strong><br>
<strong>Name: </strong>{{ $data->first_name }} {{ $data->last_name }}<br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Subject: </strong>{{ $data->subject }} <br>
<strong>Message: </strong>{{ $data->user_query }} <br><br>

Thank you