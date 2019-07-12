@extends('layouts.app')

<div class="row mt-lg-5">
    
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-2">
                @include('partials.logo')
            </div>
            <div class="col-md-6">
                @include('search.partials.form')
            </div>
        </div>
        
        <div class="row ml-5">
            
            <div class="col-md-6">
    
                @each('search.partials.result', $websites, 'website', 'search.partials.empty')
    
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-5">
                        {{ $websites->links() }}
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>

</div>

