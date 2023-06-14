<h1>Test Page</h1>
<h2>syukkin Test</h2>
<p>query:</p>
<p>{{$querys[0]->staff_id}}</p>

@foreach ($querys as $query)

    {{$query->staff_id}}

@endforeach


