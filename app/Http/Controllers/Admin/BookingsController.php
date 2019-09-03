<?php

namespace App\Http\Controllers\Admin;

use App\Models\Events;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Helpers\UploadFile;
use Session;
use Validator;

class BookingsController extends Controller
{
    public function index(){
        $bookings   = Bookings::get();
        $users      = User::get();
        $events     = Events::get();
        return view('dashboard.bookings.index', compact('bookings', 'users', 'events'));
    }

    public function addBooking(Request $request){
        $booking            = new Bookings();
        $booking->user_id   = $request['user_id'];
        $booking->event_id  = $request['event_id'];
        $event              = Events::find($request['event_id']);

        if ($request['ticket'] == 1){
            $booking->price  = $event->normal;
        }elseif ($request['ticket'] == 2){
            $booking->price  = $event->gold;
        }else{
            $booking->price  = $event->vip;
        }

        if ($booking->save()){
            addReport(auth()->user()->id, 'اضافة حجز', $request->ip());
            Session::flash('success', 'تم اضافة الحجز بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم الاضافة بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function updateBooking(Request $request){
        $booking            = Bookings::find($request['id']);
        $booking->user_id   = $request['user_id'];
        $booking->event_id  = $request['event_id'];
        $event              = Events::find($request['event_id']);

        if ($request['ticket'] == 1){
            $booking->price  = $event->normal;
        }elseif ($request['ticket'] == 2){
            $booking->price  = $event->gold;
        }else{
            $booking->price  = $event->vip;
        }

        if ($booking->save()){
            addReport(auth()->user()->id, 'تعديل حجز رقم ' . $booking->id , $request->ip());
            Session::flash('success', 'تم تعديل الحجز بنجاح');
            return back();
        }else{
            Session::flash('danger', 'لم يتم التعديل بعد, الرجاء محاولة مره اخري');
            return back();
        }
    }

    public function deleteBooking(Request $request){
        Bookings::findOrFail($request->delete_id)->delete();
        addReport(auth()->user()->id, 'بحذف الحجز', $request->ip());
        Session::flash('success', 'تم حذف الحجز بنجاح');
        return back();
    }

    public function deleteBookings(Request $request){
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Bookings::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد من الحجوزات', $request->ip());
            Session::flash('success', 'تم الحذف بنجاح');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
