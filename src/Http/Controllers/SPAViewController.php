<?php

namespace Wewowweb\Trubar\Http\Controllers;

class SPAViewController
{
    /**
     * Single page application catch-all route.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json();
    }
}
