<h1>Test Page</h1>

@foreach ($results as $s)
    <p>{{json_encode($s)}}</p>
@endforeach