<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $now = Carbon::now();
        $filename = strtotime($now).".".$image->getClientOriginalExtension();
        $upload = public_path().'\images';
	    $image->move($upload, $filename);

        $slider = new Slider();
        $slider->name = $request->name;
        $slider->image = $filename;


        if ($slider->save()) {
            return redirect(route('slider.index'));
        }else{
            return redirect(route('slider.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.detail', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable',
        ]);

        // return $request;

        $slider = Slider::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $now = Carbon::now();
            $filename = $slider->image;
            $upload = public_path().'\images';
            $image->move($upload, $filename);

            $slider->image = $filename;
        }

        $slider->name = $request->name;
        if ($slider->save()) {
            return redirect(route('slider.index'));
        }else {
            return redirect(route('slider.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return redirect(route('slider.index'));
    }
}
