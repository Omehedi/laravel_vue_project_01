<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use App\Models\SubCategory;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    use Helper;

    public function requiredData()
    {
        $array = request()->all();
        $data = [];
        if (in_array('category', $array)) {
            $data['category'] = Category::get();
        }
        if (in_array('sub_category', $array)) {
            $data['sub_category'] = SubCategory::get();
        }
        if (in_array('user', $array)) {
            $data['user'] = User::get();
        }
        return $this->returnData(2000, $data);
    }

    public function getConfigurations()
    {
        $permittedModuleId = DB::table('role_modules')->where('role_id', auth()->user()->role_id)->get()->pluck('module_id')->toArray();
        $data['menus'] = Module::where('parent_id', 0)
            ->whereIN('id', $permittedModuleId)
            ->with(['sub_menus' => function ($query) use ($permittedModuleId) {
                $query->whereIN('id', $permittedModuleId);
                $query->with(['sub_menus' => function ($query) {
                    $query->with('sub_menus');
                }]);
            }])->get();

        $data['permissions'] = $this->authPermissions();

        return $this->returnData(2000, $data);
    }
}