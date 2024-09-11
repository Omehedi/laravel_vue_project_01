<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    use Helper;
    public function requiredData(){
        $array = request()->all();
        $data = [];
        if (in_array('category', $array)){
            $data['category'] = Category::get();
        }
        if (in_array('sub_category', $array)){
            $data['sub_category'] = SubCategory::get();
        }
        if (in_array('user', $array)){
            $data['user'] = User::get();
        }
        return $this->returnData(2000, $data);
    }
}
