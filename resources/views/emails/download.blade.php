<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Otterbach sendIT Download</title>

<style type="text/css">
	
  /* reset */
  #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */ 
  .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */  
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */ 
  p {margin: 0; padding: 0; font-size: 0px; line-height: 0px;} /* squash Exact Target injected paragraphs */
  table td {border-collapse: collapse;} /* Outlook 07, 10 padding issue fix */
  table {border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; color: #4c4c4c} /* remove spacing around Outlook 07, 10 tables */
  table th {font-weight: bold; font-size: larger}
  
  /* bring inline */
  img {display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
  a img {border: none;} 
  a {text-decoration: none; color: #e2493e;} /* text link */
  a.phone {text-decoration: none; color: #e2493e !important; pointer-events: auto; cursor: default;} /* phone link, use as wrapper on phone numbers */
  span {font-size: 13px; line-height: 17px; font-family: "Helvetica Neue LT"; color: #4c4c4c;}
</style>
<!--[if gte mso 9]>
  <style>
  /* Target Outlook 2007 and 2010 */
  </style>
<![endif]-->
</head>
<body style="width:100%; margin-top: 50px;margin-left: auto; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; >

<!-- body wrapper -->
<table cellpadding="0" cellspacing="0" border="0" style="margin:0px; padding:0px; width:100%; line-height: 100% !important;">


      <!-- edge wrapper -->
      <table cellpadding="10" cellspacing="20" border="0" align="center" width="600" style="background: #ecf0f5;">
        <th align="center"><img src="/bower_components/admin-lte/dist/img/CI_Siegel.jpg" style="width: 70px; padding-bottom: 5px"/>
        Neuste Uploads</th>
        <tr>
          <td valign="top">
            <!-- content wrapper -->
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="560" style="background: #FFFFFF;">
              <tr>
                <td valign="top" style="vertical-align: top;">



                        <!-- ///////////////////////////////////////////////////// -->
                  <table cellpadding="10" cellspacing="3" border="0" align="left">

                              <th align="left" style="font-size: medium; padding-bottom: 15px">
                                Hier ist dein Link zu deinen Dateien:
                                </th>

                            <tr>
                            {{--  <td>
                                <img src="{{ URL::route('getfile',$params) }}"  style="width: 10%;"/>
                              </td>--}}
                              <td><span style="">{{ URL::route('getfile',$params) }}</span>
                              <br></td>
                            </tr>
                            <tr height="30">
                              <td valign="top" style="vertical-align: top; background: #FFFFFF;" width="600">
                                <span style="">{{ $mailcontent }}</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <span>Mit freundlichen Grüßen
                                <br>{{ $username }}</span>
                              </td>
                            </tr
                  </table>
                  <!-- //////////// -->


                </td>
              </tr>
            </table>
            <!-- / content wrapper -->
          </td>
        </tr>
      </table>
      <!-- / edge wrapper -->

<!-- / page wrapper -->
</body>
</html>