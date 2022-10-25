<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoranas;
use App\Models\Patiekalas;

class HomeController extends Controller
{
    public function homeList(Request $request)
    {
        // Filter, Search
        if ($request->rest) {
            $patiekalas = Patiekalas::where('restoranas_id', $request->rest);
        }
        else if ($request->s) {
            $search = explode(' ', $request->s);
            if (count($search) == 1) {
                $patiekalas = Patiekalas::where('title', 'like', '%'.$request->s.'%');
            } 
            else {
                $patiekalas = Patiekalas::where('title', 'like', '%'.$search[0].' '.$search[1].'%')
                ->orWhere('title', 'like', '%'.$search[1].'%'.$search[0].'%')
                ->orWhere('title', 'like', '%'.$search[0].'%')
                ->orWhere('title', 'like', '%'.$search[1].'%');
            }
        }
        else {
            $patiekalas = Patiekalas::where('id', '>', 0);
        }

        // Sort
        if ($request->sort == 'price_asc') {
            $patiekalas->orderBy('price');
        }
        else if ($request->sort == 'price_desc') {
            $patiekalas->orderBy('price', 'desc');
        }

        return view('home.index', [
            'patiekalas' => $patiekalas->get(),
            'restoranas' => Restoranas::orderBy('title')->get(),
            'rest' => $request->rest ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Patiekalas::SORT_SELECT,
            's' => $request->s ?? '',
        ]);

    }

    public function rate(Request $request, Patiekalas $patiekalas)
    {
        $patiekalas->rating_sum = $patiekalas->rating_sum + $request->rate;
        $patiekalas->rating_count ++;
        $patiekalas->rating = $patiekalas->rating_sum / $patiekalas->rating_count;
        $patiekalas->save();
        return redirect()->back();
    }

    

}
