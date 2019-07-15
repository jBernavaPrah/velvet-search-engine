<form method="GET" action="{{route('search')}}">
    
    <div class="form-group  mb-2">
        <input value="{{$q??''}}" type="text" name="q" class=" @error('q') is-invalid @enderror form-control search-input" autofocus
               required>
    </div>
    
    @includeWhen($withButton??false, 'search.partials.submit')

</form>
