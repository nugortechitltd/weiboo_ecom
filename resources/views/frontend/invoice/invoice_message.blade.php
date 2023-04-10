

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Order confirmation </title>
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
    <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
      body { margin: 0; padding: 0; background: #e1e1e1; }
      div, p, a, li, td { -webkit-text-size-adjust: none; }
      .ReadMsgBody { width: 100%; background-color: #ffffff; }
      .ExternalClass { width: 100%; background-color: #ffffff; }
      body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
      html { width: 100%; }
      p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
      .visibleMobile { display: none; }
      .hiddenMobile { display: block; }

      @media only screen and (max-width: 600px) {
      body { width: auto !important; }
      table[class=fullTable] { width: 96% !important; clear: both; }
      table[class=fullPadding] { width: 85% !important; clear: both; }
      table[class=col] { width: 45% !important; }
      .erase { display: none; }
      }

      @media only screen and (max-width: 420px) {
      table[class=fullTable] { width: 100% !important; clear: both; }
      table[class=fullPadding] { width: 85% !important; clear: both; }
      table[class=col] { width: 100% !important; clear: both; }
      table[class=col] td { text-align: left !important; }
      .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
      .visibleMobile { display: block !important; }
      .hiddenMobile { display: none !important; }
      }
    </style>
</head>
<body>
<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tr>
      <td height="20"></td>
    </tr>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 10px 10px;">
          <tr>
            <td>
              <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                <tbody>
                  <tr>
                    <td>
                      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="col">
                        <tbody>
                          <tr class="hiddenMobile">
                            <td height="40"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="20"></td>
                          </tr>
                          <tr>
                            <td style="font-size: 24px; font-weight: semi-bold">
                              Name: {{App\Models\Contact::where('id', $message_id)->first()->name}}
                            </td>
                          </tr>
                          <tr>
                            <td style="margin-top: 30px; font-size: 24px; font-weight: semi-bold">
                                Email: {{App\Models\Contact::where('id', $message_id)->first()->email}}
                              </td>
                          </tr>
                          <tr>
                            <td style="margin-top: 30px; font-size: 24px; font-weight: semi-bold">
                                Subject: {{App\Models\Contact::where('id', $message_id)->first()->subject}}
                              </td>
                          </tr>
                          <tr>
                            <td style="margin-top: 30px; font-size: 24px; font-weight: semi-bold ">
                                Phone: {{App\Models\Contact::where('id', $message_id)->first()->number}}
                              </td>
                          </tr>
                          <tr>
                            <td style="padding-top: 15px; font-size: 24px; font-weight: semi-bold; padding-bottom: 5px">
                                Message: 
                            </td>
                          </tr>
                          <tr>
                            <td style="margin-top: 50px; margin-bottom: 50px; background-color: #1f1f1f; color: #fff; border-radius: 10px; padding: 20px; font-size: 16px; font-weight: normal">
                                {{App\Models\Contact::where('id', $message_id)->first()->message}}
                              </td>
                          </tr>
                          <tr align="right">
                            <td style="padding-top: 5px">
                                Thank you.
                              </td>
                          </tr>
                          <tr class="hiddenMobile">
                            <td height="40"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="20"></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      {{-- <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                        <tbody>
                          <tr class="visibleMobile">
                            <td height="20"></td>
                          </tr>
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td style="font-size: 21px; color: #ff0000; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                              Invoice
                            </td>
                          </tr>
                          <tr>
                          <tr class="hiddenMobile">
                            <td height="50"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="20"></td>
                          </tr>
                          <tr>
                            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                              <small>ORDER</small><br />
                              <small>{{App\Models\Contact::where('id', $message_id)->first()->email}}</small>
                            </td>
                          </tr>
                        </tbody>
                      </table> --}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
        <td height="20"></td>
      </tr>
  </table>
  <!-- /Header -->
  <!-- Order Details -->
  <!-- /Order Details -->
</body>
</html>
