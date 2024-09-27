<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'year' => ['required', 'max:255'],
            'car_type' => ['required', 'max:255'],
            'daily_rent_price' => ['required', 'max:255'],
            'availability' => ['required', 'max:5'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']

        ]);
        $user_id = $request->input('id');

        $img_file = $request->file('image');
        $time = time();
        $ext = $img_file->getClientOriginalName();
        $img_name = "{$user_id}.{$time}.{$ext}";

        $img_url = "uploads/{$img_name}";
        $img_file->move(public_path('uploads'), $img_name);

        return Car::create([
            'name' => $request->input('name'),
            'brand' =>  $request->input('brand'),
            'model' =>  $request->input('model'),
            'year' =>  $request->input('year'),
            'car_type' =>  $request->input('car_type'),
            'daily_rent_price' =>  $request->input('daily_rent_price'),
            'availability' =>  $request->input('availability'),
            'image' => $img_url
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        return Car::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        return Car::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        if ($request->hasFile('image')) {

            $img = $request->file('img');
            $time = time();
            $ext = $img->getClientOriginalName();
            $img_name = "{$time}.{$ext}";
            $img_url = "uploads/{$img_name}";
            $img->move(public_path('uploads/'), $img_name);

            $file_path = $request->input('filePath');
            file::delete($file_path);

            return Car::where('id', $id)->update([
                'name' => $request->name,
                'brand' =>  $request->brand,
                'model' =>  $request->model,
                'year' =>  $request->year,
                'car_type' =>  $request->car_type,
                'daily_rent_price' =>  $request->daily_rent_price,
                'availability' =>  $request->availability,
                'image' => $img_url
            ]);
        }else{
            return Car::where('id', $id)->update([
                'name' => $request->name,
                'brand' =>  $request->brand,
                'model' =>  $request->model,
                'year' =>  $request->year,
                'car_type' =>  $request->car_type,
                'daily_rent_price' =>  $request->daily_rent_price,
                'availability' =>  $request->availability
            ]);
        }

    }
    public function destroy(Request $request)
    {

        $id = $request->id;
        $img = $request->input('filePath');
        file::delete($img);
        return Car::where('id',$id)->delete();
    }
}
