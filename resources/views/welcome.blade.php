@extends('layouts.app')

@section('content')
    <div class="position-ref full-height">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="card">
                        <div class="card-header">Kezdőoldal</div>

                        <div class="card-body">
                            <p>
                                Vegyél részt az egyetem egyik legkirályabb Mikulás-buliján, ahol a karácsonyi hangulat
                                mellett
                                egy hallgatótársad is meglepetéssel vár majd és te is mosolyt csalhatsz valaki arcára
                                egy
                                ajándékkal.
                            </p>
                            <p>
                                A regisztrációt követően bekerülsz a kalapba, ahonnan véletlenszerűen kiválaszthat téged
                                valaki,
                                hogy aztán egy apró ajándékkal lepjen meg az egyetemi Mikulás-bulin. Neked is választunk
                                valakit,
                                akit pedig te lepsz meg ajándékkal.
                            </p>
                            <p>
                                <b>Időpont:</b> 2018. 12. 06. 18:00-21:00 <br/>
                                <b>Helyszín:</b> SOE-LKK aula<br/>
                                <a href="https://www.facebook.com/events/546425002458998/">Facebook esemény</a>
                                (Facebook bejelentkezés szükséges)
                            </p>
                            <div style="width: 100%; margin-top: 45px; text-align: center;">
                                <a href="/regisztracio" class="btn btn-success">Regisztráció</a>
                                <a href="/bejelentkezes" class="btn btn-primary">Bejelentkezés</a>
                                <div style="margin-top: 5px">
                                    <a href="/adatvedelmitajekoztato">Adatvédelmi tájékoztató</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


