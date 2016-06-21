@if(count($errors)>0)
    <div class="alert alert-danger">
        <strong>Some thing wrong!</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif