<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Record Search</title>
<script src="js/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// validate signup form on keyup and submit
	$("#searchfrm").validate({
		rules: {
			query: {
				required: true
			}
		},
		messages: {
			query: {
				required: "Please enter your query"
			}
		},
		submitHandler: function() {
		var arg=$("#searchfrm").serialize();
		//alert(arg);
		 $.ajax({
		  url: "ajax/ajax_feedback.php",
		  type: "GET",
		  dataType: 'html',
		  data: arg,
		  timeout: 5000,
		  cache: false,
		  success: function(html)
			{
				//alert(html);
				if(html==0)
				{
					$.blockUI({ message: '<h4>Documents not found.</h4>' });
					setTimeout('$.unblockUI()',3000);
				}
				else if(html==1)
				{
					$.blockUI({ message: '<h4>Documents found.</h4>' });
					setTimeout('$.unblockUI()',3000);
				}
				else 
				{
					$.blockUI({ message: '<h4>Documents not found.</h4>' });
					setTimeout('$.unblockUI()',3000);
				} 
		  }
		});
	 }
	});
});
</script>
</head>
<body>
<form name="searchfrm" id="searchfrm" action="" method="get">
  <table width="400" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><input type="hidden" value="auto" name="method">
        <input type="hidden" value="/au" name="meta">
        <input type="hidden" value="" name="mask_path">
        <input type="hidden" value="" name="mask_world">
        <input type="hidden" value="50" name="results"></td>
      <td><input type="hidden" value="on" name="rank">
        <input type="hidden" value="off" name="callback">
        <input type="hidden" value="" name="legisopt">
        <input type="hidden" value="relevance" name="view">
        <input type="hidden" value="" name="max"></td>
    </tr>
    <tr>
      <td><input type="text" id="query" value="" size="60" name="query"></td>
      <td><input type="submit" name="submit" value="Search"></td>
    </tr>
  </table>
</form>
</body>
</html>
