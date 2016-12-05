<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台合辑管理</title>
<link href="<?=base_url();?>/public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>/public/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url();?>/public/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url();?>/public/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>/public/js/select-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>/public/editor/kindeditor.js"></script>

<style type="text/css">
.myclass{
	font-size:20px;
	
}
</style>
  

</head>

<body class="sarchbody">

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">后台合辑管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    

    
    <div class="formtitle"><span>游戏合辑列表</span></div>
    
	<ul class="seachform1">
       <li class="sarchbtn"><input name="" type="button" class="scbtn" value="新建"/></li>  
    </ul><br/>
	
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>合辑名称</th>
        <th>合辑简称</th>
        <th>排序位置</th>
        <th>是否首页推荐</th>
        <th>是否搜索推荐</th>
        <th>操作</th>
        </tr>
        </thead>
        
		<tbody>
		
		<?php foreach ($dataList as $game_item): ?>
        <tr id="games_<?php echo $game_item['id']; ?>">
        <td><?php echo $game_item['collection_name']; ?></td>
        <td><?php echo $game_item['collection_abbreviation']; ?></td>
        <td><?php echo $game_item['sort_number']; ?></td>
        <td><?php echo $game_item['is_home_recommended']; ?></td>
        <td><?php echo $game_item['is_search_recommended']; ?></td>
        <td><a href="#" class="tablelink" onclick="javascript:edit(<?php echo $game_item['id']; ?>);">修改</a>     <a href="#" class="tablelink" onclick="javascript:del(<?php echo $game_item['id']; ?>);"> 删除</a></td>
        </tr> 
		<?php endforeach; ?>
        
       
    
        </tbody>
		
    </table>
	
	<div style="text-align:right; margin:30px; font-size:30px !important; font-weight:block !important;"><?=$page_html;?></div>
    

       
	</div> 
 

    
    
    </div>


</body>

    
<script language="javascript">
$(document).ready(function() 
{ 
    $(".scbtn").click(function() 
    {      
       window.location="<?=base_url();?>index.php/games/addNewGamesHtml";
    }); 
});

//删除游戏合辑
function del(_id){
	
	if(confirm("确定删除该记录吗？")){
		$.ajax({
			type :"post",
			url : "<?=base_url();?>index.php/games/deleteGames",
			data : {'id':_id},
			dataType : "json",
			success : function(data) {
				if(data){
					$("#games_"+_id).remove();
				}else{
					alert('删除失败，请稍后重试！');
				}
			},
			error : function(err) {
				alert('删除失败，请稍后重试！');
			}
		});
	}
} 

//编辑游戏合辑
function edit(_id){
	
	 window.location="<?=base_url();?>index.php/games/editGamesHtml/"+_id;
} 
	
	
</script>

</html>
