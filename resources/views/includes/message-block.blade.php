@if(count($errors)>0)
    <div class='row'>
        <div class="col-md-6 error">
            <ul class="alert alert-danger ">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class='row'>
        <div class="col-md-6 alert alert-info success">
          {{Session::get('message')}}
        </div>
    </div>
@endif