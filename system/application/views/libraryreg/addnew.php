<?php

echo "<div class='container'>";
echo "<div class='content_header'>";
/*---------------     content title       ---------------------*/
echo "<div class='content_title'>";
echo $pagetitle.' > '. $event;
echo "</div>";
echo "<div class='content_message'>";

echo "</div>";
/*---------------     content events       ---------------------*/
echo "<div class='content_events'>";

echo "<div class='events'>";
echo "<a href='".$url."libraryreg/listview'>";
echo "<span> <img src='".$url."images/cancel.png' border='0' /></span>";
echo "<span>Cancel</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='save_data(2);'>";
echo "<span><img src='".$url."images/apply.png' border='0' /></span>";
echo "<span>Apply</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='save_data(1);'>";
echo "<span><img src='".$url."images/save.png' border='0' /></span>";
echo "<span>Save</span>";
echo "</a>";
echo "</div>";

echo "</div>";
echo "</div>";
/*---------------     content        ---------------------*/
echo "<div align='center' class='content'>";
echo "<div id ='message'></div>";
echo "<div id ='message1'></div>";
echo "<div id = 'mandatory' ><span align ='right' class = 'mandatory'>*</span> Specified fileds are mandatory</div>";
echo "<table border='0' cellpadding='0' cellspacing='0' class='formtable'>";
echo '<tr><th colspan = "3" id = "table_title">Create New Library Register</th></tr>';

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Student Roll No<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'StudentId' id = 'StudentId' >";
echo "<option value = 'x'>- - Select RollNo - -</option>";
	foreach($rollno as $rowa):
		echo "<option value = '".$rowa->StudentId."' >";
		echo $rowa->StudentRollNo;
		echo "</option>";
	endforeach;
echo "</select>";
echo "</td></tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Library No<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'LibraryNo' id = 'LibraryNo' /></td>";
echo "</tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Description</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'LibraryDes' id = 'LibraryDes' /></td>";
echo "</tr>";

echo "</table>";

echo "</div>";
echo "</div>";
?>
<script>

function validation(){

 var StudentId = $('#StudentId').val();
 var LibraryNo = $('#LibraryNo').val();
	 
	 if(StudentId =='x'){
		$('#message').html('RollNo should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#StudentId').focus();
		return false;
	}else if(LibraryNo == ''){
		$('#message').html('LibraryNo should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#LibraryNo').focus();
		return false;
	}else{
		return true;
	}
}
function save_data($e){

 var StudentId = $('#StudentId').val();
 var LibraryNo = $('#LibraryNo').val();
 var LibraryDes = $('#LibraryDes').val();

 if(validation()){
 		$.ajax({
				type: 'POST',
				url: '<?=$url?>libraryreg/save',
				data: 'StudentId='+StudentId+'&LibraryNo='+LibraryNo+'&LibraryDes='+LibraryDes,
				success: function(response){
				      //alert(response);			
						if(response == 1){
							if($e == 1){
								window.location.href='<?=$url?>libraryreg/listview';
							}else{
								alert('Insert Successfully');
							}	
						}else if(response == 2){
								alert('Recode already exists!..');
							}else{
								alert('Insert Not Successfully');
						}
					}
					
		});
	}	
}		
</script>
