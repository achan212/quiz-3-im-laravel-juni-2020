<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;
use App\Comments;

class ArtikelController extends Controller
{
    //
    public function create(){
        return view('form');
    }

    public function store(Request $request){
        $data=$request->all();
        unset($data["_token"]);
        $data["slug"]=$this->slugify($data["judul"]);
        $new_artikel=ArtikelModel::save($data);
        return redirect('artikel');
    }

    public function index(){
        $artikels=ArtikelModel::get_all();
        return view('index',compact('artikels'));
    }

    public function show($id){
        $artikel=ArtikelModel::find_by_id($id);
        return view('show',compact('artikel'));
    }

    public function edit($id){
        $artikel=ArtikelModel::find_by_id($id);
        return view('edit',compact('artikel'));
    }

    public function update($id,Request $request){
        $data=$request->all();
        $data["slug"]=$this->slugify($data["judul"]);
        $artikel=ArtikelModel::update($id,$data);
        return redirect('artikel');
    }

    public function destroy($id){
        $deleted=ArtikelModel::destroy($id);
        return redirect('artikel');
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
        }
}