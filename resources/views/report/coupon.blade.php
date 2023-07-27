<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('')}}/assets/global2/css/bootstrap/css/bootstrap-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/global2/css/style.css" rel="stylesheet" type="text/css">
    <style>
        .canvas {
            width: 100%;
            height: 100%;
            background: #fff;
            position: relative;
            background-size: contain !important;
        }


        td {
            font-size: 24px !important;
        }

        @page {
            direction: rtl;
            font-size: 40px !important;
            size: 21cm 29.7cm;
            margin: 20px 20px 80px 20px;
        }

        .couponh {
            font-size: 24px !important;
        }

        @media print {

            @page {
                size: A4 landscape;
                margin: 0;
                n-up: 2x2;
                margin: 20px 20px 80px 20px;
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
        }


    </style>

</head>

<body>


<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-lg green-haze hidden-print uppercase print-btn" style="float: right"
           onclick="javascript:window.print();">طباعة</a>
    </div>
</div>


@foreach($Coupons as $coupon)
    <div class="canvas" style="width: 100%;margin-bottom:50px;font-size: 26px;">
            <div style=" width: 100%;">
                <table style="width: 100%;" border="1" dir="rtl">
                    <tbody>
                    <tr style="height: 200px;">
                        <td width="75%" style="text-align: center;position: relative;">
                            <h3 style="margin-top: 15px;font-size: 2.875rem;">جمعية جسر الأمل الخيرية</h3>
                            <p style="padding-bottom: 10px;font-size: 24px !important;">{{$coupon->project->name }}</p>
                            <div style="font-size: 18px;">
                                <div style="position: absolute;right: 30px;bottom: 15px;">
                                    <strong>المحافظة</strong>: <span
                                            style="background: #eee;padding: 5px 10px">{{$coupon->customer->getState->name??''}}</span>


                                    <span style="background: #eee;padding: 5px 120px;margin-right: 10px;">
                                        {{request('future_field')??''}}
                                    </span>
                                </div>

                                <div style="position: absolute;left: 30px;bottom: 15px;">
                                    <strong>رقم الكوبون</strong>: <span
                                            style="background: #eee;padding: 5px 10px;font-size: 30px;">{{$coupon->coupon_no}}</span>
                                </div>
                            </div>
                        </td>
                        <td width="25%" style="text-align: center">
                            <img width="250px"
                                 src="{{url("uploads/news/sub/".\App\Models\Setting::find(1)->img_name)}}">
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <table border="1" style="height: 120px;width: 100%;text-align: center">
                                <tr align="center">
                                    <td align="center">
                                        الاسم
                                    </td>
                                    <td align="center" style="background: #eee">
                                        <div class="couponh">{{ $coupon->customer->name  }}</div>
                                    </td>
                                    <td align="center">
                                        الهوية
                                    </td>
                                    <td align="center" style="background: #eee">
                                        <div class="couponh">{{ $coupon->customer->card_no }}</div>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td>نقطة التسليم</td>
                                    <td style="background: #eee" colspan="3">{{ $address }}</td>
                                </tr>
                                <tr>
                                    <td>تاريخ التسليم</td>
                                    <td style="background: #eee">{{ $date_s }}</td>

                                    <td>وقت التسليم</td>
                                    <td style="background: #eee">{{ request('time_s') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div>
                                <div style="width: 70%;float: right;margin-top: 20px;">
                                    <div style="width: 400px; margin-right: 50px; font-size: 20px;">
                                        <p style="font-size: 24px !important;">توقيع المدير</p>
                                        <p style="border-bottom: 1px solid ; width: 100%;"></p>
                                    </div>
                                </div>
                                <div style="width: 30%;float: right;padding: 0px 10px ;">
                                    <div style="border: 1px solid;text-align: center;height: 250px;display: flex;align-items: center;justify-content: center;">
                                        <p style="font-size: 24px !important;">ختم الجمعية</p>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="text-align: center;font-size: 20px;margin-top:23px;margin-bottom: 20px;">
                                <small>يصرف هذا الكوبون للشخص المستفيد فقط بعد الاطلاع على هويته الشخصية</small>
                                <br>
                                <small>هذا الكوبون ليس للبيع ويلغى في حال الشطب او التأخر عن موعد التسليم</small>
                            </div>
                        </td>
                    </tr>
                    <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
@endforeach

<script src="{{url('')}}/assets/js/jquery.min.js" type="text/javascript"></script>
</body>
</html>