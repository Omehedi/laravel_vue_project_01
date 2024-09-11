<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Supports\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Helper;
    public function __construct(){
        $this->model = new Category();
    }

    public function index()
    {
        $data =  $this->model->get();

        return $this->returnData(2000, $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = $this->model->validate($request->all());
        if ($validator->fails()){
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
        }

        $this->model->fill($request->all());
        $this->model->save();

        return $this->returnData(2000, $this->model);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        try {
            $validator = $this->model->validate($request->all());
            if ($validator->fails()){
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }

            $data = $this->model->where('id', $request->input('id'))->first();
            if ($data){
                $data->fill($request->all());
                $data->save();

                return $this->returnData(2000, $data);
            }

            return $this->returnData(3000, null, 'Category not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }

    public function destroy($category_id)
    {
        try {
            $data = $this->model->where('id',$category_id)->first();
            if ($data){
                $data->delete();

                return $this->returnData(2000, null, 'Category deleted successfully');
            }
            return $this->returnData(3000, null, 'Category not found');

        }catch (\Exception $exception){
            return $this->returnData(5000, $exception->getMessage(), 'Something Wrong');
        }
    }
}
