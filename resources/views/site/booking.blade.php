@extends('site.layouts.index')@section('title')    | {{ trans('site.booking_details') }}@endsection@section('content')    <div class='content'>        <div class="container contentContainer">            @include('site.layouts.top_header')            <div class="eventDet wow fadeIn " data-wow-delay="1.6s">                <div class="event">                    <div id="owl-event" class="owl-carousel">                        @foreach($booking->event->images()->get() as  $image)                            <div class="item">                                <img src="{{ Request::root() }}/images/events/{{ $image->name }}" alt="event img">                            </div>                        @endforeach                    </div>                    <div class="eDet">                        <div class="eventCont">                            <div class="eventName">                                <span>{{ $booking->event->title }}</span>                            </div>                            <div class="eventDate">                                <span class='date'>{{ Carbon\Carbon::parse($booking->event->date)->format('M d') }}</span>                                {{--<span class='date pinkClr'>13 س متبقي</span>--}}                            </div>                        </div>                        <span class='price'>                                    {{ $booking->event->normal }} {{ trans('site.rs') }}                            </span>                        <ul class="timeUl">                            <li><img src="{{ Request::root() }}/design/site/img/clock.png" alt="clock">{{ $booking->event->time }}</li>                            <li><img src="{{ Request::root() }}/design/site/img/calendar2.png" alt="clock">{{ $booking->event->date }}</li>                            <li><a href="https://google.com/maps/?q={{ $booking->event->lat }},{{ $booking->event->lng }}"><img src="{{ Request::root() }}/design/site/img/location.png" class="loc" alt="clock">{{ $booking->event->city->name }}</a></li>                            <li><img src="{{ Request::root() }}/design/site/img/reserv.png" class="loc" alt="clock">حجز اون لاين</li>                        </ul>                        <div class="desc qr">                            <span>{{ trans('site.scan_qr') }}</span>                            <div class="qrParent">                                <div id="qrcode"></div>                            </div>                        </div>                        <a href='{{ route('delete_ticket', $booking->id) }}' class="formBtn cancelRes">                            {{ trans('site.delete_ticket') }}                        </a>                    </div>                </div>            </div>        </div>    </div>@endsection@section('script')    <script type="text/javascript">		var qrcode = new QRCode(document.getElementById("qrcode"), {			text: "{{ route('booking_details', [ $booking->id, Auth::user()->id ]) }}",			width: 90,			height: 90,			colorDark : "#000000",			colorLight : "#ffffff",			correctLevel : QRCode.CorrectLevel.H		});		qrcode.makeCode("{{ route('booking_details', [ $booking->id, Auth::user()->id ]) }}");    </script>@endsection