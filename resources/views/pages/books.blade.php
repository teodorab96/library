@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5 text-center text-primary bg-secondary">
            <div class="col"><h1><i><b>Sve knjige</b></i></h1></div>
        </div>
        @if(count($books)>0)
        <div class="row mb-3 text-center">
            <form action="/books" method="post" role="search" class="m-auto form-inline my-2 my-lg-0">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Unesite naslov za pretragu" aria-label="Search">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="SLOBODNA" checked>
                    <label class="form-check-label" for="inlineRadio1">Slobodna</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="IZDATA">
                    <label class="form-check-label" for="inlineRadio2">Izdata</label>
                  </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pretrazi</button>
            </form>
        </div>
            <div class="row">
            @foreach ($books as $book)
                <div class="col-4 mb-3">
                    <div class="card text-center container">
                        <div class="card-header">
                            {{$book->ime_autora}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$book->naslov}}</h5>
                            <p class="card-text"><b>Izdavač: </b> {{$book->izdavac}}</p>
                            <p class="card-text"><b>Kategorija: </b>{{$book->kategorija}}</p>
                            <p class="card-text"><b>Štampara: </b> {{$book->stampara}}</p>
                            <p class="card-text col"><b>Status: </b> {{$book->status}}</p>
                        </div>
                        <div class="card-footer text-muted row">
                            @if($book->status === 'SLOBODNA')
                                 <a class="btn btn-secondary card-text col text-center mr-1 w-75 col" href="/reserveBook">Rezerviši</a>
                            @endif
                            @if($book->status === 'SLOBODNA')
                                <a class="btn btn-secondary card-text col text center ml-1 w-50 col" href="/rentBook">Iznajmi</a>
                            @endif
                        </div>
                  </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-5"></div>
                <div class="col-4">
                    {{$books->links()}}
                </div>
                <div class="col"></div>
            </div>
        </div>

        @else
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1>Nije pronadjena ni jedna knjiga</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
    
@endsection