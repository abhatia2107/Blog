<?php
/**
 * Created by PhpStorm.
 * User: Abhishek Bhatia
 * Date: 07-Oct-15
 * Time: 2:13 PM
 */

namespace Blog\Http\Controllers;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\Contacts;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagesController extends Controller
{
    /**
     * To display homepage of the app
     * @return \Illuminate\View\View
     */

    public function welcome()
    {
        return view('pages.welcome');
    }

    /**
     * To display about us page of the app
     * @return \Illuminate\View\View
     */

    public function about()
    {
        return view('pages.about');
    }

}