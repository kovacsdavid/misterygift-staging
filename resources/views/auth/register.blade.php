@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="margin: 0px auto;">
                <div class="card-header">Regisztráció</div>
                <div class="card-body">
                    <div style="width: 68%; margin-left: auto; margin-right: auto;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="last_name">Vezetéknév</label>

                                <input id="last_name" type="text"
                                       class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                       name="last_name" value="{{ old('last_name') }}" placeholder="Pl.: Nagy">

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="first_name">Keresztnév</label>

                                <input id="first_name" type="text"
                                       class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                       name="first_name" value="{{ old('first_name') }}" placeholder="Pl.: Ádám">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="email">E-mail cím</label>

                                <input id="email" type="text"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}" placeholder="Pl.: nagy.adam@pelda.hu">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="kar">Kar megnevezése</label>

                                <input id="kar" type="text"
                                       class="form-control{{ $errors->has('kar') ? ' is-invalid' : '' }}"
                                       name="kar" value="{{ old('kar') }}" placeholder="Pl.: SKK">

                                @if ($errors->has('kar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kar') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="facebook_profile">Facebook
                                    profil hivatkozás
                                </label>

                                <div class="input-group mb-2">
                                    {{--<div class="input-group-prepend">--}}
                                    {{--<div class="input-group-text">https://www.facebook.com/</div>--}}
                                    {{--</div>--}}
                                    <input id="facebook_profile" type="text"
                                           class="form-control{{ $errors->has('facebook_profile') ? ' is-invalid' : '' }}"
                                           name="facebook_profile" value="{{ old('facebook_profile') }}"
                                           placeholder="Pl.: https://www.facebook.com/nagy.adam">

                                    @if ($errors->has('facebook_profile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook_profile') }}</strong>
                                    </span>
                                    @endif
                                    <div style="width: 100%;">(pl.: <br/> <b>https://www.facebook.com/</b>kovacs.andras
                                        <br/> vagy <br/> <b>https://www.facebook.com/</b>valami id, amit a profilodra
                                        erkezve talalsz )
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_introduction">Rövid bemutatkozás</label>

                                <textarea id="short_introduction"
                                          class="form-control{{ $errors->has('short_introduction') ? ' is-invalid' : '' }}"
                                          name="short_introduction">{{ old('short_introduction') }}</textarea>

                                @if ($errors->has('short_introduction'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('short_introduction') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password">Jelszó</label>

                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm">Jelszó
                                    újra</label>

                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">

                            </div>

                            <div class="form-group row">
                                <label for="want-to-gift">Részt szeretnék venni az ajándékozásban</label>

                                <div style="width: 100%;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="want-to-gift"
                                               id="want-to-gift1" value="yes">
                                        <label class="form-check-label" for="want-to-gift1">
                                            Igen
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="want-to-gift"
                                               id="want-to-gift2" value="no">
                                        <label class="form-check-label" for="want-to-gift2">
                                            Nem
                                        </label>
                                    </div>
                                    @if ($errors->has('want-to-gift'))
                                        <span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('want-to-gift') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row">
                                <p>
                                    Adataidat kizárólat a rendezvénnyel kapcsolatban használjuk fel, a rendezvényt
                                    követő legkésőbb 7. napon töröljük őket a szervereinkről.
                                </p>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="privacypolicy"
                                           value="approved" id="privacypolicy1">
                                    <label class="form-check-label" for="privacypolicy1">
                                        Elolvastam és elfogadom az <a href="/adatvedelmitajekoztato">adatvédelmi
                                            tájékoztatót</a>, kifejezett hozzájárulásomat adom, hogy az adatvédelmi
                                        tájékoztatóban megjelölt adataimat, a nekem ajándékozó regisztrált
                                        felhasználóval közöljék.
                                    </label>
                                </div>
                                @if ($errors->has('privacypolicy'))
                                    <span class="invalid-feedback" role="alert" style="display: block !important;">
                                        <strong>{{ $errors->first('privacypolicy') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"
                                            style="background-color: #57ac41; border-color: #57ac41;">
                                        Regisztráció
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
