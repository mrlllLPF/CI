<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑合辑</title>
<link href="<?=base_url();?>/public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>/public/css/select.css" rel="stylesheet" type="text/css" />


</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="<?=base_url();?>">后台合辑管理</a></li>
	<li><a href="#">编辑合辑</a></li>
    </ul>
    </div>
	
    <form action="<?=base_url();?>index.php/games/editGames" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <input name="id" value="<?=$games['id'];?>" type="hidden"/>
		<div class="formbody">
		
		<div class="formtitle"><span>编辑游戏合辑</span></div>
		
		
		<?php
		 if ( $code == 1 ) {
		?>
			<h1 style="color:green; font-size:20px !important;"><?=$des;?></h1>
		<?php
		 }else{
		?>
			<h1 style="color:red; font-size:20px !important;"><?=$des;?></h1>
		<?php
		}
		?>
		<ul class="forminfo">
		<li>
			<label>系统</label>
			<div class="vocation">
				<select name="system" class="select1">
				    <?php
					 if ( $games['system'] == 2 ) {
					?>
					    <option value ="2" selected="true">Android</option>
				        <option value ="1">IOS</option>
					<?php
					 }else{
					?>
					    <option value ="2">Android</option>
				        <option value ="1" selected="true">IOS</option>
					<?php
					}
					?>
				</select>
			</div>
		</li>
		<li><label>合辑名称</label><input name="collection_name" value="<?=$games['collection_name'];?>" type="text" class="dfinput" /></li>
		<li><label>合辑简称</label><input name="collection_abbreviation" value="<?=$games['collection_abbreviation'];?>" type="text" class="dfinput" /></li>
		
		<li>
		    <label>圆角图</label>
			<?php
			 if ( $games['fillet_url'] == '' ) {
			?>
				<img src="<?=base_url();?>/public/images/null_pic.jpg" style="width:100px; height:100px;"/>
			<?php
			 }else{
			?>
				<img src="<?=base_url().$games['fillet_url'];?>" style="width:100px; height:100px;"/>
			<?php
			}
			?>
			<br/><input style="margin-left:86px; margin-top:5px;" name="fillet_url" type="file" class="dfinput" />
		</li>
		<li>
		    <label>Banner图</label>
			<?php
			 if ( $games['banner_url'] == '' ) {
			?>
				<img src="<?=base_url();?>/public/images/null_pic.jpg" style="width:100px; height:100px;"/>
			<?php
			 }else{
			?>
				<img src="<?=base_url().$games['banner_url'];?>" style="width:300px; height:100px;"/>
			<?php
			}
			?>
			<br/><input style="margin-left:86px; margin-top:5px;" name="banner_url" type="file" class="dfinput" />
		</li>
		
		
		
		<li><label>合辑简介</label><textarea name="collection_txt" cols="" rows="" class="textinput"><?=$games['collection_txt'];?></textarea></li>
		
		<li><label>包含网游</label><input name="contain_games" value="<?=$games['contain_games'];?>" type="text" class="dfinput" /></li>
		<li><label>包含H5</label><input name="contain_h5" value="<?=$games['contain_h5'];?>" type="text" class="dfinput" /></li>
		<li><label>标签名称</label><input name="label_name" value="<?=$games['label_name'];?>" type="text" class="dfinput" /></li>
		<li><label>标签颜色</label><input name="label_color" value="<?=$games['label_color'];?>" type="text" class="dfinput" /></li>
		<li><label>排序位置</label><input name="sort_number" value="<?=$games['sort_number'];?>" type="text" class="dfinput" /></li>
		
		<li><label>是否首页推荐</label><cite><input name="is_home_recommended" type="radio" value="1" <?=($games['is_home_recommended']==1?"checked='checked'":"");?> />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_home_recommended" type="radio" value="0" <?=($games['is_home_recommended']==0?"checked='checked'":"");?>/>否</cite></li>
		<li><label>是否搜索推荐</label><cite><input name="is_search_recommended" type="radio" value="1" <?=($games['is_search_recommended']==1?"checked='checked'":"");?> />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_search_recommended" type="radio" value="0" <?=($games['is_search_recommended']==0?"checked='checked'":"");?>/>否</cite></li>
		<li>
		   <label>&nbsp;</label><input type="submit" name="submit" class="btn" value="提交"/>
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

	$(".select1").uedSelect({
		width : 152
	});
});
</script>

</html>
