@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px;">
        <div class="col-md-8">
        
            </div>
            <div class="head">
              <h2 class="text-center">
                
               
              Cars for  {{$blog_posts->name}}


                </h2>
                     
             </div>
            <div style="width: 700px; height: 300px; padding-top: 10px;">
              <div>
                <div class="d-flex">
                  <strong scope="col">Id</strong>
                  <strong scope="col" style="padding-left: 30%;">Car</strong>
               </div>
              <div class="dropdown-divider" style="border-top: 2px solid black;"></div>
          </div>
          <div>

            

              {{-- @foreach ($blog_posts->cars as $car) --}}
             
              <div class="d-flex">
                  <div> {{$blog_posts->cars()->orderBy('id', 'desc')->first()->id}} </div>
                  
                  <div style=" padding-left: 30%;"> {{$blog_posts->cars()->orderBy('id','desc')->first()->car}}</div>
                <div class="space" style="height: 60px;">
                    
                  </div>
              </div>
                
              {{-- @endforeach --}}
          </div>

      </div>
</div>
</div>
</div>
@endsection
