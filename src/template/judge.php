<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="IE=8" http-equiv="X-UA-Compatible"/>
<title><?php p('Facemash');?></title>
<meta charset="utf-8" />
<meta name="description" content="Facemash，等你回家！" />
<?php css('main');?>
<?php js('jquery.min');?>
</head>
<body style="background-image:url(img/mashface<?php if($gend==1){p(2);}?>.jpg);">
<?php include("header.php")?>
<div class="judgebox">
	<div class="left">
		<span class="f12 name" id="info1">Loading...</span>
		<span class="f12 name" id="name1">Loading...</span>
		<div class="photo" id="photo1"></div>
		<input type="hidden" id="uid1">
		<a class="btn<?php p($gend==0?'2':'1')?>" mashface="sbtn" id="leftbtn" obj="uid1"></a>
	</div>
	<div class="right">
		<span class="f12 name" id="info2">Loading...</span>
		<span class="f12 name" id="name2">Loading...</span>
		<div class="photo" id="photo2"></div>
		<input type="hidden" id="uid2">
		<a class="btn<?php p($gend==0?'2':'1')?>" mashface="sbtn" id="rightbtn" obj="uid2"></a>
	</div>
	<input type="hidden" id="verify">
	<input type="hidden" id="grade" value="0">
	<div class="equal">
		<div class="f14 b refresh" mashface="refresh">很难抉择，换一换</div>
		<div class="keycon f12">可以使用快捷键投票 H 左边 / L 右边 / X 战平</div>
		<div class="keycon f12" mashface="grade">筛选年级 
			<select id="grades">
			<option value="0">显示全部</option>
			<option value="2003">2003级</option>
			<option value="2004">2004级</option>
			<option value="2005">2005级</option>
			<option value="2006">2006级</option>
			<option value="2007">2007级</option>
			<option value="2008">2008级</option>
			<option value="2009">2009级</option>
			<option value="2010">2010级</option>
			</select>
		</div>
	</div>
</div>
<?php include("footer.php")?>
<script>
$("[mashface='grade']").change(function(){
		$("#grade").val($("#grades").val());
		$("[mashface='sbtn']").trigger("click");
	});
$(document).ready(function(){
    $.ajax({
				url: '<?php p($webinfo["webhost"].'include/ajax/getman.php');?>',
				type:'POST',
				complete :function(){}, 
				dataType: 'json',
				data:{ sex: "<?php p($gend);?>",grade:$("#grade").val()},
				timeout: 8000,
				error: function() { alert('页面加载失败');},
				success: function(data) {
					var info1;
					info1 = data[0].grade + "级 " + data[0].classx + "班";
					var info2;
					info2 = data[1].grade + "级 " + data[1].classx + "班";
					$("#info1").html(info1);
					$("#info2").html(info2);
					$("#name1").html(data[0].name);
					$("#name2").html(data[1].name);
					$("#uid1").val(data[0].photo);
					$("#uid2").val(data[1].photo);
					$("#photo1").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[0].photo+"\">");
					$("#photo2").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[1].photo+"\">");
				}
           });
	$("[mashface='refresh']").click(function(){
		$.ajax({
				url: '<?php p($webinfo["webhost"].'include/ajax/getman.php');?>',
				type:'POST',
				complete :function(){}, 
				dataType: 'json',
				data:{ sex: "<?php p($gend);?>",grade:$("#grade").val()},
				timeout: 8000,
				error: function() { alert('提交超时');},
				success: function(data) {
					var info1 = data[0].grade + "级 " + data[0].classx + "班";
					var info2 = data[1].grade + "级 " + data[1].classx + "班";
					$("#info1").html(info1);
					$("#info2").html(info2);
					$("#name1").html(data[0].name);
					$("#name2").html(data[1].name);
					$("#uid1").val(data[0].photo);
					$("#uid2").val(data[1].photo);
					$("#photo1").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[0].photo+"\">");
					$("#photo2").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[1].photo+"\">");
				}
           });
	});
	$("[mashface='sbtn']").click(function(){
		$.ajax({
				url: '<?php p($webinfo["webhost"].'include/ajax/getman.php');?>',
				type:'POST',
				complete :function(){}, 
				dataType: 'json',
				data:{ sex: "<?php p($gend);?>",uid: $("#"+$(this).attr('obj')).val(),grade:$("#grade").val()},
				timeout: 8000,
				error: function() { alert('提交超时');},
				success: function(data) {
					var info1 = data[0].grade + "级 "+data[0].classx + "班";
					var info2 = data[1].grade + "级 "+data[1].classx + "班";
					$("#info1").html(info1);
					$("#info2").html(info2);
					$("#name1").html(data[0].name);
					$("#name2").html(data[1].name);
					$("#uid1").val(data[0].photo);
					$("#uid2").val(data[1].photo);
					$("#photo1").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[0].photo+"\">");
					$("#photo2").html("<img src=\"<?php p($webinfo["webhost"].'include/plugin/getFace.php?str=')?>"+data[1].photo+"\">");
				}
           });
	});
    $(document).keydown(function(event){
        if(72==event.which){
			$("#leftbtn").trigger("click");
		}
		else if(76==event.which){
			$("#rightbtn").trigger("click");
		}
		else if(88==event.which){
			$("[mashface='sbtn']").trigger("click");
		}
    });
});

</script>
</body>