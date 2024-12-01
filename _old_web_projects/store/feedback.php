<?
	include("include/session.php");
	include("include/openCon.php");
?>
<HTML>
<HEAD>
	<TITLE>momibello recording company</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</HEAD>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/continueShopping_over.gif')">

<table>
<tr>
	<td class="mainTable">
		<table cellpadding='0' cellspacing='0' border='0'>
        <!--DWLayoutTable-->
        <!-- casper gif trick for macs -->
        <tr> 
          <td><img src="art/transparent.gif" height="1" width="54px"></td>
          <td><img src="art/transparent.gif" height="1" width="550px"></td>
        </tr>
        <tr> 
          <td align='right' valign='top' >::&nbsp;</td>
          <td valign='top'><p><strong>Feedback</strong><br>Please rate your shopping experience with the Momibello Recording Company. And feel free to say what you purchased or what you'd like to see for sale on the site. Which bands do you like and why?</p>
            <p style="margin:0px 0px -10px 0px;"><a href="javascript:history.back()" onMouseOut="swapImgRestore()" onMouseOver="swapImage('continue','','art/swapImages/continueShopping_over.gif',1)"><img src="art/swapImages/continueShopping.gif" alt="Continue shopping" name="continue" width="127" height="26" border="0"></a></p>
            <p>&nbsp;</p></td>
          <td align='right' valign='top'>&nbsp;</td>
        </tr>
        <tr> 
          <td align='right' valign='top'>&nbsp;</td>
          <td> 
            <? 
				////////////////////////////////////////////////////////////////////////////////////////////////
				//  messageboard
					include("include/feedback.php"); 
				?>
          </td>
        </tr>
      </table>
		  <?
			include("include/logInStatus.php");
		  ?>
	  </td>
  </tr>
</table>
</body>
</html>
