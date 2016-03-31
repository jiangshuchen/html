<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>郭浩的主页</title>
<meta name="Keywords" content="点云数据、郭浩"><meta name='Generator' content='郭浩欢迎您'><meta name='Author' content='郭浩'>
<meta name='Maketime' content='2016-03-11 16:02:29'>
<meta name="sitename" content="郭浩的主页">
<link rel="stylesheet" type="text/css" href="css/index.css" />
<style type="text/css">
span{font-weight:bold;}
#Container{
    width:80%;
    margin: auto;/*设置整个容器在浏览器中水平居中*/
}
#Header{
    height:131px;/*height设置为caulogo的高度，一般设置为overflow*/
    background: ghostwhite;
}
#Menu
{
margin: auto;/*设置整个容器在浏览器中水平居中*/
}
#Contents
{
height:500px;
background: ghostwhite;
}
</style>

<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

</head>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $website = $_POST["website"];
   $comment = $_POST["comment"];
   $gender = $_POST["gender"];
}
?>
<body>
<div id="Container">
	<div id="Header">
		
	</div>
	<div id="Menu">
		<ul>
			<li><a href="./index.html">主页</a></li>
			<li><a href="./curriculum_vitae.html">简介</a></li>
			<li><a href="./interest.html">个人兴趣</a></li>
			<li><a href="./research.html">科研教学</a></li>
			<li><a href="./contribution.html">社会贡献</a></li>
			<li><a href="./contacts.php">联系方式</a></li>
		</ul>
	</div>
	<div id="Contents">
		<table>
			<tr>
				<th>电话</th>
				<td>13426384870</td>
			</tr>
			<tr>
				<th>邮箱</th>
				<td>guohaolys@cau.edu.cn</td>
			</tr>
		</table>
		<div style="margin-top:10px;" id="formarea">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				 <fieldset>
				<legend>来访者信息</legend>
				<table>
					<tr>
					<td>姓名：<input type="text" name="name"></td>
					<td>电邮：<input type="text" name="email"></td>
					<td>网址：<input type="text" name="website"></td>
					</tr>
					<tr>
					<td colspan="3">
					评论：<textarea name="comment" rows="5" cols="80"></textarea>
					</td>
					</tr>
					<tr >
					<td colspan="3">
					性别：
					   <input type="radio" name="gender" value="female">女性
					   <input type="radio" name="gender" value="male">男性
					</td>
					</tr>
					<tr>
					<td colspan="3">
					<input type="submit" name="submit" value="提交"> 
					</td>
					</tr>
				</table>
			</form>
				<?php
				echo $name;
				echo "<br>";
				echo $email;
				echo "<br>";
				echo $website;
				echo "<br>";
				echo $comment;
				echo "<br>";
				echo $gender;
				?>
		</div>
		<div style="height:250px;border:#ccc solid 1px;  margin: auto;" id="dituContent"></div>
		<div id='footer' class='footer' ></div>
	</div>
	

</div>
<script src="js/sharedfunctions.js" type="text/javascript" ></script>
</body>

<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.364219,40.010529);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"郭浩的地址",content:"办公地址",point:"116.363087|40.012201",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</html>