@extends('layouts.master')

@section('content')
    <div class="container">

        <h1 style="text-align: center">Lara_maps</h1>
        <h1 style="text-align: center">by Arslan Ismail</h1>

        <br>


<div id =map>

</div>

        <br><br>
        <br><br>
<div style="margin-left: 450px">
        {!! Form::open([]) !!}

        {!! Form::label('district','District') !!}


        {!! Form::select('district', $district,null,['id'=>'district'])!!}

    <div id="city">


    </div>



    {!! Form::close() !!}



    </div>

    </div>

    @endsection