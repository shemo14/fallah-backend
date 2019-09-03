<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Events;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Organizations;

class SalesReportsController extends Controller
{
    public function index(){
        $eventsIds      = Bookings::select('event_id')
                                ->groupBy('event_id')
                                ->orderByRaw('COUNT(*) DESC')
                                ->distinct()
                                ->get(['event_id']);

        $events         = Events::whereIn('id', $eventsIds)->get();
        $total          = Bookings::sum('price');
        $categories     = Categories::get();
        $countries      = Countries::get();
        $organizations  = Organizations::get();


        $monthes = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $allSum  = [];
        foreach ($monthes as $monthe) {
            $allSum[] = Bookings::whereRaw('MONTH(created_at) = ?', $monthe)->sum('price');
        }
        $allSum = json_encode($allSum);

        return view('dashboard.sales_reports.index', compact('events', 'total', 'allSum', 'categories', 'countries', 'organizations'));
    }

    public function clearBookings(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Bookings::delete()) {
            addReport(auth()->user()->id, 'قام بتصفير التقارير و حذف الحجوزات', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function filterReport(Request $request){
        $eventsIds = Bookings::select('event_id')
                                ->groupBy('event_id')
                                ->orderByRaw('COUNT(*) DESC')
                                ->distinct()
                                ->get(['event_id']);

        $events    = Events::query();

        if (isset($request['category_id'])){
            $events = $events->where('category_id', $request['category_id']);
        }

        if (isset($request['country_id'])){
            $events = $events->where('country_id', $request['country_id']);
        }

        if (isset($request['organization_id'])){
            $events = $events->where('organization_id', $request['organization_id']);
        }

        if (isset($request['from']) && isset($request['to'])){
            $events = $events->whereBetween('date', [ $request['from'], $request['to']]);
        }

        $events         = $events->whereIn('id', $eventsIds)->get();
        $total          = Bookings::sum('price');
        $categories     = Categories::get();
        $countries      = Countries::get();
        $organizations  = Organizations::get();
        $monthes        = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $allSum         = [];

        foreach ($monthes as $monthe) {
            $allSum[] = Bookings::whereRaw('MONTH(created_at) = ?', $monthe)->sum('price');
        }

        $allSum = json_encode($allSum);
        return view('dashboard.sales_reports.index', compact('events', 'total', 'allSum', 'categories', 'countries', 'organizations'));
    }

}
