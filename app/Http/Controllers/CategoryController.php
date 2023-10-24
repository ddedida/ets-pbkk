<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function tambahKategori(Request $request) {
        $incomingFields = $request->validate([
            'jenis' => 'required'
        ]);

        $incomingFields['jenis'] = strip_tags($incomingFields['jenis']);
        $incomingFields['user_id'] = auth()->id();

        Category::create($incomingFields);

        return redirect('/');
    }
}
