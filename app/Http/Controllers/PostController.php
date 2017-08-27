<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
        ]);
    }
}
