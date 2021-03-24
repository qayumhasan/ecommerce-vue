<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Email Template Announcement</title>

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">


</head>

<body style="font-family: 'Rubik', sans-serif;overflow-x:hidden;margin: 0px;padding: 0px;">
    <!-- header center-->

    <table width="100%" bgcolor="#fcfcfc" cellpadding="0" cellspacing="0" border="0" id="backgroundTable"
        st-sortable="banner">
        <tbody>
            <tr>
                <td>
                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                        <tbody>
                            <tr>
                                <td width="100%">
                                    <table width="600" height="auto" align="center" cellspacing="0" cellpadding="0"
                                        border="0" class="devicewidth"
                                        style="text-align: center;background: url(https://image.freepik.com/free-photo/close-up-blank-old-concrete-wall_23-2147856094.jpg)no-repeat;background-size: cover;padding:20px 10px;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- logo -->
                                                    <table bgcolor="#282828" width="140" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="140" height="50" align="center">
                                                                    <div class="imgpop">
                                                                        <a target="_blank" href="#">
                                                                        <img src="{{ asset($frontLogo->front_logo) }}"
                                                                                alt="" border="0" width="140"
                                                                                height="50"
                                                                                style="display:block; border:none; outline:none; text-decoration:none;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end of logo -->
                                                    <!-- start of menu -->
                                                    <table width="300" height="50" border="0" align="right"
                                                        valign="middle" cellpadding="0" cellspacing="0" border="0"
                                                        class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="right" valign="middle"
                                                                    style="font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828"
                                                                    st-content="menu">
                                                                    <p class="link" style="font-size: 16px;font-weight: 600;">
                                                                        <a href="#"
                                                                            style="text-decoration: none;color: #ffffff;">About</a>&nbsp;&nbsp;&nbsp;
                                                                        <a href="#"
                                                                            style="text-decoration: none;color: #ffffff;">Product</a>&nbsp;&nbsp;&nbsp;
                                                                        <a href="#"
                                                                            style="text-decoration: none;color: #ffffff;">Help</a>

                                                                    </p>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end of menu -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content_cell" height="30">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- start of image -->
                                                <td align="center" st-image="banner-image">
                                                    <div class="icon"
                                                        style="background-color: #fff;width:60px;height: 60px;text-align: center;line-height: 60px;border-radius: 50%;">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"
                                                            style="font-size:22px;color: #2ccf9c;"></i>
                                                    </div>
                                                    <div class="banner_cont">
                                                        <h4
                                                            style="color: #fff;font-size: 24px;font-weight: 600;margin: 20px;">
                                                            Invoice #{{ $order->order_id }}</h4>

                                                        <span style="color: #fff;font-size: 18px;">{{ $order->created_at->toDateTimeString() }}</span>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content_cell" height="40">
                                                    &nbsp;
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <!-- end of image -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


    <!-- order -->

    <table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
        <tbody>
            <tr>
                <td class="content_cell" height="30">
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td>
                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                        <tbody>
                            
                            {{-- <tr>
                                <td width="100%">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center"
                                        class="devicewidth"
                                        style="border-bottom: 1px dotted rgb(165, 165, 165);padding-top:2px;padding-bottom: 2px;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- logo -->
                                                    <table  width="150" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr >
                                                                <td width="150" height="50" align="center">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Item
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table> 

                                                    <table  width="100" align="center" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100" height="50" align="center">
                                                                    <div class="ship_cont">
                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            SKU
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table> 

                                                    <table  width="100" align="center" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100" height="50" align="center">
                                                                    <div class="ship_cont">
                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Discount
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width="100" height="50" border="0" align="center"
                                                        valign="middle" cellpadding="0" cellspacing="0" border="0"
                                                        class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                  <div class="qty">
                                                                      <span style="color: #6d6d6d;font-size: 16px;">Quantity</span>
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width=100 height="50" border="0" align="center" valign="middle"
                                                        cellpadding="0" cellspacing="0" border="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                           Price
                                                                        </span>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr> --}}

                            <tr>
                                <td width="100%">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center"
                                        class="devicewidth"
                                        style="border-bottom: 1px dotted rgb(165, 165, 165);padding-top:2px;padding-bottom: 2px;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- logo -->
                                                    <table  width="180" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="180" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Item
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table  width="100" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="380" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            SKU
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table  width="100" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="380" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Discount
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width="100" height="50" border="0" align="left"
                                                        valign="middle" cellpadding="0" cellspacing="0" border="0"
                                                        class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                  <div class="qty">
                                                                      <span style="color: #6d6d6d;font-size: 16px;">Quantity</span>
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width=100 height="50" border="0" align="left" valign="middle"
                                                        cellpadding="0" cellspacing="0" border="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                           Price
                                                                        </span>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td width="100%">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center"
                                        class="devicewidth"
                                        style="border-bottom: 1px dotted rgb(165, 165, 165);padding-top:10px;padding-bottom: 10px;">
                                        <tbody>
                                            @php
                                            $product_storage = App\ProductStorage::where('order_id', $order->order_id)
                                            ->first();
                                            @endphp
                                            @foreach(json_decode($product_storage->product_details) as $product_detail)
                                            <tr>
                                                <td>
                                                    <!-- logo -->
                                                    <table  width="180" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="280" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 12px;">
                                                                            <b style="font-weight: 600;color: #0275d8;">{{ Str::limit($product_detail->name, 20)  }}</b>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table  width="100" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 12px;">
                                                                            <b style="font-weight: 600;color: #0275d8;">{{ $product_detail->sku }}</b>
                                                                       </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table> 

                                                    <table  width="100" align="left" border="0"
                                                        cellpadding="0" cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100" height="50" align="left">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 12px;">
                                        <b style="font-weight: 600;color: #0275d8;">{{ $product_detail->flashdeals ? $product_detail->flashdeals : 0 }}</b>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width="100" height="50" border="0" align="left"
                                                        valign="middle" cellpadding="0" cellspacing="0" border="0"
                                                        class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                  <div class="qty">
                                                                      <span> {{ $product_detail->quantity }} </span>
                                                                   </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width=100 height="50" border="0" align="left" valign="middle"
                                                        cellpadding="0" cellspacing="0" border="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="center" valign="middle">
                                                                    <div class="ship_cont">
                                                                        <span style="color: #6d6d6d;font-size: 12px;">
                                                                            ৳ {{ $product_detail->price }} 
                                                                       </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            

                            <tr>
                                <td width="100%">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center"
                                        class="devicewidth"
                                        style="padding-top:10px;padding-bottom: 10px;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    
                                                    <table width=200 height="50" border="0" align="right" valign="middle"
                                                        cellpadding="0" cellspacing="0" border="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="right" valign="middle">
                                                                    <div class="ship_cont">

                                                                        <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Subtotal: {{ $order->total_price }} ৳
                                                                            
                                                                        </span>
                                                                        {{--<br> <span style="color: #6d6d6d;font-size: 16px;">
                                                                            Tax $100
                                                                        </span> --}}
                                                                     <br><br>
                                                                        <span style="color: #6d6d6d;font-size: 16px;border-top: 1px dotted #9e9c9c;display: inline-block;">
                                                                            Total :<b style="color: #0275d8;">{{ $order->total_price }} ৳</b>
                                                                        </span>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            
        </tbody>
    </table>
    </td>
    </tr>
    <tr>
        <td class="content_cell" height="32">
            &nbsp;
        </td>
    </tr>
    </tbody>
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
        <tbody>

            <tr>
                <td>
                    <table width="600" cellpadding="0" cellspacing="0" bgcolor="#f4f4f4" border="0" align="center"
                        class="devicewidth" style="padding:20px 10px;">
                        <tbody>
                            <tr>
                                <td width="100%">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center"
                                        class="devicewidth">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- logo -->
                                                    <table width="400" align="left" border="0" cellpadding="0"
                                                        cellspacing="0" class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td width="400" height="50" align="left">
                                                                    <div class="footcont">
                                                                        <span style="color: dimgray;">©{{ date('Y') }} {{ $siteSettings->company_name }}<br>
                                                                            {{ $siteSettings->address }}</span>
                                                                        <p class="link">
                                                                            <a href="{{ route('about.us') }}"
                                                                                style="text-decoration: none;color: #0275d8;">About</a>&nbsp;&nbsp;
                                                                            <a href="{{ route('contract.us') }}"
                                                                                style="text-decoration: none;color: #0275d8;">Contract us</a>&nbsp;&nbsp;
                                                                            <a href="#"
                                                                                style="text-decoration: none;color: #0275d8;">Help</a>&nbsp;&nbsp;
                                                                            <a href="#"
                                                                                style="text-decoration: none;color: #0275d8;">Unsubscribe</a>&nbsp;&nbsp;
                                                                        </p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end of logo -->
                                                    <!-- start of menu -->
                                                    <table width="200" height="50" border="0" align="right"
                                                        valign="middle" cellpadding="0" cellspacing="0" border="0"
                                                        class="devicewidth">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50" align="right" valign="middle"
                                                                    style="font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828"
                                                                    st-content="menu">
                                                                    <a href="{{ $siteSettings->facebook }}"
                                                                        style="text-decoration: none;color: #8a8d8e;font-size: 24px;"><i
                                                                            class="fa fa-facebook-official"
                                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                    <a href="{{ $siteSettings->twitter }}"
                                                                        style="text-decoration: none;color: #8a8d8e;font-size: 24px;"><i
                                                                            class="fa fa-twitter-square"
                                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                    <a href="{{ $siteSettings->instagram }}"
                                                                        style="text-decoration: none;color: #8a8d8e;font-size: 24px;"><i
                                                                            class="fa fa-instagram"
                                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;

                                                                    <a href="#"
                                                                        style="text-decoration: none;color: #8a8d8e;font-size: 24px;"><i
                                                                            class="fa fa-pinterest-square"
                                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end of menu -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>