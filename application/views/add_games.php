<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增合辑</title>
<link href="<?=base_url();?>/public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>/public/css/select.css" rel="stylesheet" type="text/css" />


</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="<?=base_url();?>">后台合辑管理</a></li>
	<li><a href="#">新增合辑</a></li>
    </ul>
    </div>
	
    <form id="gamesForm" onsubmit = "return checkForm();" action="<?=base_url();?>index.php/games/addNewGames" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    
		<div class="formbody">
		
		<div class="formtitle"><span>新增游戏合辑</span></div>
		<h1 style="color:red; font-size:20px !important;"><?=$error;?></h1>
		
		<ul class="forminfo">
		<li>
			<label>系统</label>
			<div class="vocation">
				<select name="system" class="select1">
				   <option value ="2">Android</option>
				   <option value ="1">IOS</option>
				</select>
			</div>
		</li>
		<li><label>合辑名称</label><input id="collection_name" name="collection_name" value="" type="text" class="dfinput" /></li>
		<li><label>合辑简称</label><input id="collection_abbreviation" name="collection_abbreviation" type="text" class="dfinput" /></li>
		
		<li><label>圆角图</label><input name="fillet_url" type="file" class="dfinput" /></li>
		<li><label>Banner图</label><input name="banner_url" type="file" class="dfinput" /></li>
		
		<li><label>合辑简介</label><textarea name="collection_txt" cols="" rows="" class="textinput"></textarea></li>
		<li><label>包含网游</label><input name="contain_games" type="text" class="dfinput" /></li>
		<li><label>包含H5</label><input name="contain_h5" type="text" class="dfinput" /></li>
		<li><label>标签名称</label><input name="label_name" type="text" class="dfinput" /></li>
		<li><label>标签颜色</label><input name="label_color" type="text" class="dfinput" /></li>
		<li><label>排序位置</label><input id="sort_number" name="sort_number" type="number" class="dfinput" /></li>
		
		<li><label>是否首页推荐</label><cite><input name="is_home_recommended" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_home_recommended" type="radio" value="0" />否</cite></li>
		<li><label>是否搜索推荐</label><cite><input name="is_search_recommended" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_search_recommended" type="radio" value="0" />否</cite></li>
		<li>
		   
		   <label>&nbsp;</label><input type="submit" name="submit" class="btn" value="提交"/>
		    <!--
		   <label>&nbsp;</label><input id="submit" class="btn" value="提交" style="text-align:center;"/>-->
		   <input name="" type="button" class="btn" value="取消"/>
		</li>

		</ul>
		
		
		</div>
	</form>


</body>

<script type="text/javascript" src="<?=base_url();?>/public/js/jquery.js"></script>
<!--
<script type="text/javascript" src="<?=base_url();?>/public/js/jquery.idTabs.min.js"></script>-->
<script type="text/javascript" src="<?=base_url();?>/public/js/select-ui.min.js"></script>
<!--
<script type="text/javascript" src="<?=base_url();?>/public/editor/kindeditor.js"></script>-->

<script type="text/javascript">
$(document).ready(function(e) {
    
	//选择框初始化
	$(".select1").uedSelect({
		width : 152
	});
	
});

//表单验证
function checkForm(){
	
	if($("#collection_name").attr("value")==''){
		alert('合辑名称不能为空！');
		return false;
	}
	
	if($("#collection_abbreviation").attr("value")==''){
		alert('合辑简称不能为空！');
		return false;
	}
	
	if($("#sort_number").attr("value")==''){
		alert('排序位置不能为空！');
		return false;
	}
	
	return true;
}
</script>

</html>
