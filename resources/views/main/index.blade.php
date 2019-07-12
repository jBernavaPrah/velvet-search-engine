@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-md-center align-items-center" style="height: 100vh">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @include('partials.logo')
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-7">
                    @include('search.partials.form',['withButton'=>true])
                </div>
            </div>
        
        </div>
    
    
    </div>

@endsection
