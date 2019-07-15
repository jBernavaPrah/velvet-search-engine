@extends('layouts.app')

{{-- Show all result of research --}}

@section('header')
    <div class="row mt-3 ml-0 mr-0">
        <div class="col-md-2 pl-lg-5">
            <a href="/">
                @include('partials.logo')
            </a>
        </div>
        <div class="col-md-6">
            @include('search.partials.form')
        </div>
    </div>

@endsection

@section('content')
    <div class="row pt-lg-5">
        
        <div class="col-md-12">
            <div class="row ml-5">
                
                <div class="col-md-6">
                    
                    {{--
                    React component will be loaded into search-engine div.
                    
                    This is here only to prove the possibilities to add react component in blade file.
                    
                    --}}
    
                    @if (count($websites))
                        <div id="search-engine" data-props='@json($websites)'></div>
                        
                    @else
                        @include('search.partials.empty')
                    @endif
            
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-5">
                            {{ $websites->links() }}
                        </div>
                    </div>
                </div>
            </div>
        
        
        </div>
    
    </div>
@endsection
