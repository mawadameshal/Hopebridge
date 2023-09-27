@extends('layouts.index')
@section('content')
    <style>
        @page {
            direction: rtl;
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 20px;
                direction: rtl;
            }

            .page-break {
                display: block;
                height: 1px;
                page-break-before: always;
            }

            .page-break-no {
                display: block;
                height: 1px;
                page-break-after: avoid;
            }

            table {
                border: 1px solid #000 !important;
                direction: ltr;
                font-weight: normal;
                border-collapse: collapse;
                width: 98% !important;
                background-color: #f2f2f2;
            }

            table tr {
                counter-increment: rowNumber;
            }

            table tr td:nth-child(7)::before {
                content: counter(rowNumber);
                min-width: 1em;
                margin-right: 0.5em;
            }

            tr.page-break {
                display: block;
                page-break-before: always;
            }

            :not(table) {
                direction: rtl;
            }

            table th, tr, td {
                border: 1px solid #000 !important;
                font-weight: normal !important;
                padding: 8px !important;
            }
        }

    </style>
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
                            <div class="form-group">
                                <label class="control-label col-md-3">بحث برقم الكشف</label>
                                <div class="col-md-12">
                                    <input type="text" id="tag" name="tag" class="form-control searchable"
                                           placeholder="رقم الكشف" value="{{request('tag')}}">
                                </div>
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
                                <input id="deliver_date" required name="deliver_date"
                                       value="{{request('deliver_date')}}" type="date"
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
                <div class="printable">
                    <table id="data_tb" class="printer">
                        <thead>
                        <tr>
                            <th style="text-align: center;width: 25px;"><input type="checkbox" name="select_all"
                                                                               value="1" id="example-select-all"></th>
                            <th align="center">الرقم</th>
                            <th align="center">رقم الملف</th>
                            <th align="center">رقم الكشف</th>
                            <th align="center">الاسم</th>
                            <th align="center"> الهوية</th>
                            <th align="center"> الجوال</th>
                            <th align="center" width="25%">توقيع المستلم</th>
                        </tr>
                        </thead>
                    </table>
                </div>

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
                        <div class="col-md-3">
                            <div class="form-group input-wlbl">
                                <span class="lblinput">ملاحظة</span>
                                <div class="input-group">
                                    <input id="future_field" name="future_field" type="text" class="form-control">
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
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="sendMessageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">نص الرسالة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">نص الرسالة</label>
                        <textarea class="form-control" name="message" cols="3" id="message_text" required></textarea>
                        <p id="optradio1p" class="help-block" style="color:red !important;"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="button" id="sendMessageButton" class="btn btn-primary">ارسال</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تأكيد!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">هل أنت متأكد من حذف الأيتام المحددين من المشروع ؟؟؟</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                    <button type="button" id="deleteButton" class="btn btn-primary">نعم</button>
                </div>

            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                var oTable;
                var ids = [];

                $('body').on('click', '#sendMessageButton', function (e) {
                    if ($('#message_text').val() == '') {
                        $("#optradio1p").text('يرجى كتابة نص الرسالة');
                        return;
                    } else if (ids.length == 0) {
                        $("#optradio1p").text('يرجى اختيار المستفيدين');
                        return;
                    } else {
                        $("#optradio1p").hide();
                    }
                    console.log(ids);

                    var url = "{{url('Orphan/send_message')}}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            ids: ids,
                            message: $('#message_text').val(),
                            _token: "{{csrf_token()}}"
                        },
                        success: function (response) {
                            console.log(response);
                            toastr.success(response.message);
                            $('#sendMessageModal').modal('hide');
                        }
                    });
                });

                $('body').on('click', '#deleteButton', function (e) {

                    var url = "{{url('Orphan/delete_orphans_from_project')}}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            ids: ids,
                            project_id: $('#project_id').val(),
                            _token: "{{csrf_token()}}"
                        },
                        success: function (response) {
                            console.log(response);
                            toastr.success(response.message);
                            $('#deleteModal').modal('hide');
                            location.reload();
                        }
                    });
                });

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');

                $('#example-select-all').on('click', function () {
                    // Get all rows with search applied
                    var rows = oTable.rows({'search': 'applied'}).nodes();
                    // Check/uncheck checkboxes for all rows in the table
                    $('input[type="checkbox"]', rows).prop('checked', this.checked);
                });

                function checkedselected() {
                    var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
                    rowcollection.each(function (index, elem) {
                        console.log(elem);
                        var checkbox_value = $(elem).val();
                        //Do something with 'checkbox_value'
                        ids.push(checkbox_value);
                    });
                    console.log(ids);
                }

                // Handle click on checkbox to set state of "Select all" control
                $('#example tbody').on('change', 'input[type="checkbox"]', function () {
                    // If checkbox is not checked
                    if (!this.checked) {
                        var el = $('#example-select-all').get(0);
                        // If "Select all" control is checked and has 'indeterminate' property
                        if (el && el.checked && ('indeterminate' in el)) {
                            // Set visual state of "Select all" control
                            // as 'indeterminate'
                            el.indeterminate = true;
                        }
                    }
                });


                $(function () {

                    //   $('#data_tb').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

                    var project_name = $('#project_id option:checked').text();
                    var project_sponser = $('#project_id option:checked').data('sponser');
                    var state = $('#state option:checked').text();
                    var title = document.getElementById('rep_title').value;
                    var deliver_date = document.getElementById('deliver_date').value;
                    var url = '{{url("printOrphanReportData")}}';


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
                        fixedMessage: true,
                        "ajax": {
                            url: url,
                            data: function (d) {
                                d.coupon_from = document.getElementById('coupon_from').value;
                                d.coupon_to = document.getElementById('coupon_to').value;
                                d.tag = document.getElementById('tag').value;
                                d.project = document.getElementById('project_id').value;
                                d.state = document.getElementById('state').value;

                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                text: 'ارسال رسائل للمستفيدين',
                                className: 'sendMessage_btn',
                                action: function (e, dt, node, config) {
                                    $('#sendMessageModal').modal('show');
                                    checkedselected();

                                }
                            },
                            {
                                text: 'حذف مستفيدين من مشروع',
                                className: 'delete_btn',
                                action: function (e, dt, node, config) {
                                    $('#deleteModal').modal('show');
                                    checkedselected();

                                }
                            },
                            {
                                extend: 'print',
                                className: 'btn-info print_btn',
                                text: 'طباعة',
                                title: '',
                                message: '<div style="line-height:25px;font-weight: bold;border:1px solid #000;margin-bottom: 20px ;padding-bottom: 20px"> <div style="text-align: center;font-size: 17px;margin-right: 10px;margin-top: 20px;float: right; width: 70%;">' +
                                    '<div>Hope Bridge Charitable Association <br>جمعية جسر الأمل الخيرية</div>' +
                                    '<div>بتمويل من ' + project_sponser + '</div>' +
                                    '<div style="margin-top: 5px">مشروع ' + project_name +
                                    '<br>' + title + '</div>' +
                                    '</div>' +
                                    '<div style="width: 30%;float:left;margin-top: 20px;text-align: center;margin-right: -10px;">' +
                                    '<img width="160px" style=""  src="{{url("uploads/news/sub/". \App\Models\Setting::find(1)->img_name )}}">' +
                                    '</div><div style="clear: both;"></div></div>' +
                                    '<div style="text-align: center;margin-bottom: 10px">' +
                                    '<div>' +
                                    '<div style="float: right;margin-right:30px;"><strong>المحافظة : </strong>' + state + '</div>' +
                                    '<div style="float:left;margin-left:30px;"><strong>تاريخ التسليم : </strong>' + deliver_date + '</div>' +
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
                                    columns: [7, 6, 5, 4, 3, 2, 1],

                                    modifier: {
                                        page: 'all'
                                    },

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
                            "sProcessing": "<img src='{{url('assets/images/loading.gif')}}'>"
                        },
                        "columns": [
                            {
                                'data': 'orphan_id',
                                'sortable': false,
                                'searchable': false,
                                // 'visible':false,
                                'render': function (id) {
                                    return '<input type="checkbox" class="call-checkbox" checked="checked" name="id[]" value="' + id + '">'

                                }
                            },
                            {
                                orderable: false,
                                'render': function () {
                                    return '';
                                }
                            },
                            {'data': 'orphan.file_no', 'name': 'coupon_no'},
                            {'data': 'tag', 'name': 'tag', 'orderable': false,},
                            {'data': 'orphan.name', 'name': 'orphan_id', 'orderable': false,},
                            {'data': 'orphan.card_no', 'name': 'orphan_id', 'orderable': false,},
                            {'data': 'orphan.mobile', 'name': 'orphan_id', 'orderable': false,},
                            {'data': 'sign', 'name': 'sign', 'orderable': false, 'searchable': false}

                        ],

                        "fnDrawCallback": function () {
                            oTable.column(1).nodes().each(function (cell, i) {
                                cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            });
                        }

                    });
                });


                $('.btn-submit-search').click(function (e) {
                    e.preventDefault();
                    url = '{{url('printOrphanReport')}}?' + $('#add_form').serialize();
                    window.location = url;
                });

            });
        </script>
    @endpush
@endsection