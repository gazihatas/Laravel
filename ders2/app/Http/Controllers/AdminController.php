<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $post;

    public function __construct()
    {
        $this->middleware('auth');
    //    $post = new Posts();
    //    $this->post = $post;
    }

    public function index(){
        //return view('admin.index')->middleware('auth'); eğer admin giriş yapmamış ise route vermez
        return view('admin.index');
    }

    public function showAddPost() {
            return view('admin.addPost');
    }

    public function addPost(Request $request) {
        //debug ediyoruz tüm gelenlerin değerlerine bakıyoruz
        //dd($request->all());

        //status null gelebilir
        //dd($request->status);

        //requestleri tanımladık
        $name = $request->title;
        $content = $request->content;
        $status = $request->status;

        /*
        $post = $this->post;
        //Veri tabanındaki tablolar ile requestlerdeli değerleri eşitledik
        $post->name= $name;
        $post->content =$content;
        if(!is_null($status)){
            $post->status = 1;
        }
        //değişikleri kayıt ediyoruz. Kayıt etmezsek veritabanına kayıt etmez.
        $post->save();
        */

        //array oluşturduk. Array in içine gerekli parametreler verildi.
        $data = [
            'name' => $name,
            'content' => $content
        ];
        //eğer null değilse array in içerisinde ki status key ine 1 ver. Değilse verme.
        if (!is_null($status)) {
            $data['status'] = 1;
        }


        //Create yöntemini kullandığımız zaman bizden bir array[] istiyor.
        Posts::create($data);
        dd("Kayıt Oluşturuldu");
    }
}
