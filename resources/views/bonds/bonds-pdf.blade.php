<!DOCTYPE html>

<html lang="ar">

<head>
    <title>فاتورة ضريبة  </title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        /* استخدام الخط Tanseek في النصوص */
        body {
            font-family: 'tanaseek', sans-serif;
            font-size: 20px;
            line-height: 1.6;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            width: 100vw;
            height: 100vh;
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            background-color: #fff;
            font-size: 16px;
            box-sizing: border-box;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;

        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;

        }

        .invoice-box table tr.tax td:nth-child(2) {
            border-top: 1px solid #eee;
        }

        .invoice-box table tr.grand-total td:nth-child(2) {
            border-top: 2px solid #333;

        }
        .text-center {
            text-align: center;
        }

        /* إعدادات الطباعة */
        @media print {
            @page {
                margin: 0;
                size: auto;
            }
            body {
                background-color: #fff;
                margin: 0;
                padding: 0;
            }
            .invoice-box {
                width: 100%;
                height: 100%;
                box-shadow: none;
                margin: 0;
                padding: 0;
            }
        }
    </style>


</head>

<body>
<htmlpageheader name="page-header">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">

                            </td>

                            <td>
                                الانجاز المعتمد للاستقدام  <br>
                                ترخيص رقم 81   <br>
                                س .ت:5950032577 <br>
                                رقم ضريبي: 300617567500003<br>


                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

    </div>
</htmlpageheader>

hr



<div class="invoice-box">


    <table>

        <tr>

            <td style="text-align: center ;font-size: 25px">

                سند قبض رقم


            </td>


    </table>
    <table>

        <tr>

            <td style="text-align: center;font-weight: bold ;font-size: 20px;color: #dc3545">

             1111


            </td>


    </table>
    <hr>

    <tr class="information">
        <td colspan="2">
            <table>

                <tr>

                    <td>

                        العميل :       1414141414<br>
                        رقم هوية:     14141414141<br>
                        رقم جوال :    1414114<br>

                    </td>
                    <td>
                        التاريخ : 144141<br>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="text-center">رقم الفاتورة </td>

    </tr>

    <tr class="heading item " >
        <td style="text-align: center">الوصف : عقد تشغيل لمدة 1414141 </td>
        <td style="text-align: center">خدمة     : عقد تشغيل</td>
    </tr>
    <tr class="item">
        <td style="text-align: center">144141</td>
        <td>رسوم الخدمة</td>
    </tr>
    <tr class="item">
        <td style="text-align: center"> 1414</td>
        <td> الخصم</td>
    </tr>
    <tr class="item">
        <td style="text-align: center"> 14141    (غير خاضع للضريبة )</td>
        <td> المجموع</td>
    </tr>
    <tr class="item last">
        <td style="text-align: center"> 11414</td>
        <td>الضريبة المضافة </td>
    </tr>

    <tr class="item last">
        <td style="text-align: center"> 14141</td>
        <td>المطلوب من العميل</td>
    </tr>


    </table>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>
    <h4 style="text-align: center;color: grey">يشمل الضريبة المضافة</h4>
    <h3 style="text-align: center">الموظف</h3>
    <h4 style="  content: '';
    display: block;
    border-bottom: 2px solid black; /* You can adjust the color, thickness, and style of the line */
    width: 12%; /* Set the width of the line to 50% of the container width */
    margin: 0 auto; /* Center the line horizontally */
    margin-top: 5px; /* Adjust the distance between the text and the line as needed */
    position: relative;
    left: 0;
    right: 0;">اسامه فتحي عبدالله </h4>
</div>





</body>

</html>
