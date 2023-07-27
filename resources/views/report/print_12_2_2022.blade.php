@extends('layouts.index')
@push('css')
    {{--<style type="text/css" media="print">--}}
    {{--@page--}}
    {{--{--}}
    {{--size:  auto;   /* auto is the initial value */--}}
    {{--margin: 0mm;  /* this affects the margin in the printer settings */--}}
    {{--}--}}

    {{--html--}}
    {{--{--}}
    {{--background-color: #FFFFFF;--}}
    {{--margin: 0px;  /* this affects the margin on the html before sending to printer */--}}
    {{--}--}}

    {{--body--}}
    {{--{--}}
    {{--border: solid 1px blue ;--}}
    {{--margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */--}}
    {{--}--}}
    {{--</style>--}}

@endpush
@section('content')

    <section class="content">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
                </div>

            </div>
            {!! Form::open(['method'=>'post','url'=> url($route) , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}

            <div class="portlet-body collapse-body form">
                <div class="form-body" style="padding: 10px;">
                    <div class="row" style="position: relative">
                        <div class="col-md-3">
                            <div class="form-group selectbs-wlbl">
                                <span class="lblselect">المشروع </span>
                                <select data-column="1" name="project_id" id="project_id"
                                        class="bs-select form-control searchableList">
                                    <option value="">اختر المشروع</option>
                                    @foreach($Projects as $project)
                                        <option {{request('project_id')==$project->id ?"selected":""}} data-sponser="{{$project->Sponser->name}}"
                                                value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">  المحافظة </span>
                                <div class="input-group">
                                    <select data-column="2" name="state" id="state"
                                            class="bs-select form-control searchableList">
                                        <option value="">اختر المحافظة</option>
                                        @foreach($States as $state)
                                            <option {{request('state')==$state->id ?"selected":""}} value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">من كابون رقم</span>
                                <div class="input-group">
                                    <input id="coupon_from" name="coupon_from" type="text"
                                           value="{{request('coupon_from')}}"
                                           class="form-control searchable">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">الى كابون رقم</span>
                                <div class="input-group">
                                    <input id="coupon_to" name="coupon_to" type="text" value="{{request('coupon_to')}}"
                                           class="form-control searchableList">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="position: relative">
                        <div class="col-md-9">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">عنوان التقرير</span>
                                <input id="rep_title" name="rep_title" value="{{request('rep_title')}}" type="text"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">تاريخ التسليم</span>
                                <input id="deliver_date" required name="deliver_date" value="{{request('deliver_date')}}" type="date"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-actions">
                    <div class="col-md-3 clearfix ">
                        <div class="btn-search-reset">
                            <button type="submit"
                                    class="btn green btn-submit-search">بحث
                            </button>
                            <button type="button"
                                    class="btn default btn-reset">تفريغ
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body collapse-body form" style="background: #ffffff">
                <table id="data_tb" >
                    <thead>
                    <tr >
                        <th align="center">الرقم</th>
                        <th align="center">الاسم</th>
                        <th align="center"> الهوية</th>
                        <th align="center">افراد</th>
                        <th align="center"> الجوال</th>
{{--                        <th align="center"> تاريخ الاستلام</th>--}}
                        <th align="center" width="25%">توقيع المستلم</th>
                    </tr>
                    </thead>
                </table>

                <div class="form-actions" style="margin-top: 10px;">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-print"></i>
                            <span class="caption-subject font-blue-sharp bold uppercase">طباعة الكوبونات</span>
                        </div>
                    </div>
                    <div class="row" style="position: relative">
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">عنوان نقطة التوزيع</span>
                                <div class="input-group">
                                    <input id="address" name="address" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">تاريخ التوزيع</span>
                                <div class="input-group">
                                    <input id="date_s" name="date_s" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">وقت التسليم</span>
                                <div class="input-group">
                                    <input id="time_s" name="time_s" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9" style="margin-right: 40px;">
                            <button type="submit" class="btn btn-primary" style="width: 150px;"> طباعة الكوبونات <i
                                        class="fa fa-print"></i></button>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}

            <div id="proc_img_div" align="center"></div>
        </div>

        <style>


            @media print {
                :not(table) {
                    direction: rtl;
                }

                table{
                    direction: ltr;
                    border: 1px solid #000000 !important;
                }


                table th{
                    border-right:1px solid #000000 ;

                }
                table td{
                    border-left:1px solid #000000 ;
                    background: red !important;

                }


                table td {
                    border-top:1px solid #000000 ;
                }


            }


            @page {
                margin: 60px;
                margin-top: 20px;


            }

        </style>
    </section>
    @push('js')
        <script>
            $(document).ready(function () {

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');


                $(function () {

                    //   $('#data_tb').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

                    var project_name = $('#project_id option:checked').text();
                    var project_sponser = $('#project_id option:checked').data('sponser');
                    var state = $('#state option:checked').text();
                    var title = document.getElementById('rep_title').value;
                    var deliver_date = document.getElementById('deliver_date').value;
                    var url = '{{url("printReportData")}}';


                    if ($.fn.DataTable.isDataTable("#data_tb")) {
                        $('#data_tb').DataTable().clear().destroy();
                    }

                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        "serverSide": true,
                        paging: false,
                        "pageLength": 25,
                        searching: false,
                        info: false,
                        columnDefs: [
                            {"className": "dt-center", "targets": "_all"},
                            {width: 30, targets: 0},
                            {width: 150, targets: 1},
                        ],
                        fixedColumns: true,
                        "ajax": {
                            url: url,
                            data: function (d) {
                                d.coupon_from = document.getElementById('coupon_from').value;
                                d.coupon_to = document.getElementById('coupon_to').value;
                                d.project = document.getElementById('project_id').value;
                                d.state = document.getElementById('state').value;

                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn-info print_btn',
                                text: 'طباعة',
                                title: '',
                                message: '<div style="line-height:25px;font-weight: bold;border:1px solid #000;margin-bottom: 20px ;padding-bottom: 20px"><div  style="width:70%;float:right;text-align:center;font-size: 17px;margin-right: 10px;margin-top: 5px">' +
                                    '<div>Hope Bridge Charitable Association <br>جمعية جسر الأمل الخيرية</div>' +
                                    '<div>بتمويل من '+project_sponser +'</div>' +
                                    '<div style="margin-top: 5px">مشروع '+project_name +
                                    '<br>'+title+'</div>' +
                                    '</div>' +
                                    '<div class="col-md-6" style="width:20%;float:left;padding-left: 30px" >' +
                                    '<img width="160px" style="margin-top: 30px;"  src="{{url("uploads/news/sub/". \App\Models\Setting::find(1)->img_name )}}">' +
                                    '</div><div style="clear: both;"></div></div>' +
                                    '<div style="text-align: center;margin-bottom: 10px">' +
                                    '<div>' +
                                    '<div style="float: right;"><strong>المحافظة : </strong>'+state+'</div>' +
                                    '<div style="float:left;"><strong>تاريخ التسليم : </strong>'+deliver_date+'</div>' +
                                    '</div>' +
                                    '<div style="clear:both;"></div>' +
                                    '</div>'
                                    ,
                                // title: title,

                                messageBottom: function () {
                                    return '<p>' + 'العدد الاجمالي للكشف : ' + oTable.page.info().end + '</p>';
                                },
                                autoPrint: true,
                                exportOptions: {
                                    columns: [5, 4, 3, 2,1,  0]
                                },

                            },
                            {
                                extend: 'excel',
                                text: 'تصدير اكسل',
                                className: 'btn-success',
                                title: 'تصدير اكسل'

                            }
                        ],


                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                        },
                        "columns": [
                            {'data': 'coupon_no', 'name': 'coupon_no'},
                            {'data': 'customer.name', 'name': 'customer_id', 'orderable': false,},
                            {'data': 'customer.card_no', 'name': 'customer_id', 'orderable': false,},
                            {'data': 'customer.child_no', 'name': 'customer_id', 'orderable': false,},
                            {'data': 'customer.mobile', 'name': 'customer_id', 'orderable': false,},
                            // {'data': 'sign', 'name': 'sign', 'orderable': false,},
                            {'data': 'sign', 'name': 'sign', 'orderable': false, 'searchable': false}
                        ],

                    });

                    console.log(oTable);
                });

                $('.btn-submit-search').click(function (e) {
                    e.preventDefault();
                    url = '{{url('printReport')}}?' + $('#add_form').serialize();
                    window.location = url;
                });

            });
        </script>
    @endpush
@endsection









