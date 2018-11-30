@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">MikulásGyár</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif

                    @if($givesGiftTo === null)
                        <form action="{{ route('keresspart') }}" method="POST" id="keresspart">
                            @csrf
                            <button class="btn btn-success" onclick="document.getElementById('keresspart').submit()">
                                Kinek ajándékozom?
                            </button>
                        </form>
                    @else
                        <h1>Kinek ajándékozom?</h1>
                        <div class="row" style="">
                            <div class="col-5">
                                Név:
                            </div>
                            <div class="col-7">
                                {{ $givesGiftTo->last_name }} {{ $givesGiftTo->first_name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                Facebook profil:
                            </div>
                            <div class="col-7">
                                <a href="{{$givesGiftTo->facebook_profile}}">{{ $givesGiftTo->facebook_profile }}</a>
                                <div style="font-size: 11px; margin-bottom: 15px;">
                                    <b>Tipp:</b> a megtekintéshez lehet, hogy be kell jelentkezned Facebookra.</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                Rövid bemutatkozás:
                            </div>
                            <div class="col-7">
                                {{ $givesGiftTo->short_introduction }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                E-mail:
                            </div>
                            <div class="col-7">
                                {{ $givesGiftTo->email }}
                            </div>
                        </div>
                    @endif
                    <div style="margin-top: 15px; font-size: 11px">
                        <b>Hibát találtál? Segítségre van szükséged?</b> <a href="mailto:kovacsd@gain.uni-sopron.hu">kovacsd@gain.uni-sopron.hu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
