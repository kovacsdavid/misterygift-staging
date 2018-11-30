<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    /**
     * Search for giftable user.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if (Auth::user()->verified_by_administrator === 1) {
            $giftableUsers = User::where('id', '<>', Auth::user()->id)->where('want_to_gift_somebody', 1)->where('recieves_gift_from', null)->where('verified_by_administrator', true)->get();
            $authenticatedUser = Auth::user();


            if ($giftableUsers->count() === 0) {
                return redirect('/home')->with('status', 'Jelenleg sajnos nincs szabad ember, aki ajándékot kaphatna tőled, kérlek próbáld meg később újra!');
            } else {
                $giftableUser = $giftableUsers->random();
                DB::transaction(function () use ($giftableUser, $authenticatedUser) {
                    $giftableUser->recieves_gift_from = $authenticatedUser->id;
                    $authenticatedUser->gives_gift_to = $giftableUser->id;
                    $giftableUser->save();
                    $authenticatedUser->save();
                });
                return redirect('/home')->with('status', 'Megtaláltuk az embert, akit meglepsz majd! Ne felejtsd otthon az ajándékot! :)');
            }
        } else return redirect('/home')->with('status', 'Adminisztrátoraink ellenőrzik, hogy jogosult vagy-e a regisztrációra! Az ellenőrzés várható időpontja: minden nap 20:00. <b>Ne felejts el visszajönni! :)</b>');

    }
}
