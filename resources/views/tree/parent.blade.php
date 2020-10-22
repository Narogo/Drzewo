
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>

            </div>
        </div>
        <trees-component></trees-component>
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">Struktura Drzewa</div>

                <div class="card-body">

                    @foreach($drzewo as $branch)

                        {{$branch->name}}

                        @if(count($branch->child))
                            @include('tree.child',['children' => $branch->child])
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

