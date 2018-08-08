<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Captcha;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCaptchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Captcha()
    {
        //
        return Captcha::create('default');
    }
}
