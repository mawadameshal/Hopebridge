@extends('layouts.index')

@section('content')
    <section class="content">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <button class="btn btn-default" onclick="myFunction()"><i class="fa fa-search"></i></button>
                    <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
                </div>
            </div>
            <div class="portlet-body collapse-body form">
                <form action="#" class="horizontal-form">
                    <div class="form-group">
                        <label class="control-label col-md-3">بحث بالاسم</label>
                        <div class="col-md-12">
                            <input type="text" id="admin_id" name="admin_id" class="form-control searchable" placeholder="الاسم">
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="col-md-12 clearfix ">
                            <div class="btn-search-reset pull-right">
                                <button type="button"
                                        class="btn green btn-submit-search">بحث
                                </button>
                                <button type="button"
                                        class="btn default btn-reset">تفريغ
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="proc_img_div" align="center"></div>
            </div>
            <div class="portlet-body form">
                <table id="data_tb" dir="rtl" class="table  table-bordered table-hover table-responsive"
                       style="display: block">
                    <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th> المستخدم</th>
                        <th>النوع</th>
                        <!--<th>التغييرات</th>-->
                        <th>التفاصيل</th>
                        <th>التاريخ</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <a name="detail_section"></a>
        </div>

        <style>
            #data_tb td:last-child {
                padding: 18px 10px;
            }
        </style>

    </section>

    @push('js')

        <script>

            $(document).ready(function () {
                var oTable;

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');

                $(function () {
                    var url = '{{url('activity/All')}}';

                    if ($.fn.DataTable.isDataTable("#data_tb")) {
                        $('#data_tb').DataTable().clear().destroy();
                    }


                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        serverSide: true,
                        paging: true,
                        searching: false,
                        info: true,
                        lengthMenu: [[25, 100, -1], [25, 100, "All"]],
                        pageLength: 25,
                        'columnDefs': [{
                            'targets': 0,
                            'searchable': false,
                            'orderable': false,
                            'className': 'dt-body-center',
                        }],
                        'order': [[1, 'asc']],
                        "ajax": {
                            url: url,
                            data: function (d) {
                                d.admin_id = document.getElementById('admin_id').value;
                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend : 'excel',
                                text : 'Export to Excel',
                                exportOptions: {
                                    modifier: {
                                        search: 'applied',
                                        order: 'applied'
                                    }
                                }
                            },

                            {
                                extend: 'print',
                                text: 'Print',
                                exportOptions: {
                                    modifier: {
                                        selected: null,
                                    }
                                }
                            }

                        ],
                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>",
                            "infoEmpty": "لا يوجد نتائج",
                            "zeroRecords": "لا يوجد نتائج للبحث",
                            "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                            "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                            "search": "بحث عن مستفيد (بالاسم او رقم الهوية او رقم الطلب): ",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير",
                            },
                        },
                        "columns": [
                            {'data': 'id', 'name': 'id'},
                            {'data': 'admin.name', 'name': 'admin_id'},
                            {'data': 'type', 'name': 'type'},
                            // {'data': 'attr', 'name': 'attr'},
                            {'data': 'details', 'name': 'details'},
                            {'data': 'created_at', 'name': 'created_at'},
                        ],
                        "fnDrawCallback": function () {
                            // oTable.column(0).nodes().each(function (cell, i) {
                            //     cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            // });
                        },
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },

                    });

                });


                $('.btn-submit-search').click(function () {
                    oTable.ajax.reload();
                });

                var table = $('#data_tb').DataTable();
                $('#data_tb tbody').on('click', 'tr', function () {
                    $('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                });

            });
        </script>

    @endpush
    @extends('archive.js')
@endsection