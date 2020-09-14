<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Http\Resources\NewReportCollection;
use App\Http\Resources\NewReportLargeResource;
use App\Http\Resources\NewReportTinyResource;
use App\Http\Resources\NewsCollection;
use App\Models\Ads;
use App\Models\NewReport;
use Illuminate\Http\Request;

class NewReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topnews = NewReport::Active()->PrioritySorted()->first();
        $recent = NewReport::Active()->orderBy('created_at','DESC')->take(4)->get();
        $Ad= Ads::Location('upNewsReports')->first();
        $recommended = NewReport::Active()->take(4)->get();

        return [
            'http_code' => 200,
            'data' => [
                'topnews' => new NewReportTinyResource($topnews),
                'recent' => new NewsCollection($recent),
                'Ad' =>  new AdsResource($Ad),
                'recommended' => new NewsCollection($recommended)

            ],
            'message' => __('successful')
        ];

        // return  new NewsCollection($topnews, $recent, $Ad, $recommended);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NewReport $newReport)
    {
        return $this->respondWithItem(new NewReportLargeResource($newReport));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
