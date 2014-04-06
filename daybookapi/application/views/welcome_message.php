<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Day Book API Docs</title>

<!-- Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?=base_url();?>/res/bootstrap/css/bootstrap.min.css">
<link href="<?=base_url();?>/res/bootstrap/css/bootstrap-switch.css" rel="stylesheet">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?=base_url();?>res/bootstrap/js/jquery.min.js"></script>

<!-- Bootstrap 核心 JavaScript 文件 -->

<script src="<?=base_url();?>/res/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>/res/bootstrap/js/bootstrap-switch.js"></script>
		
</head>
<body data-time="{elapsed_time}" data-spy="scroll" data-target=".navmargin">
<div class="container">
	<!--栅格系统-->
	<div class="row">
		<!--菜单-->
  		<div class="col-md-2 col-lg-2 col-xs-12">
  			<!--导航菜单开始-->
		  	<div class="navbar visible-lg visible-md navmargin" data-spy="affix">
		  		<ul class="nav nav-pills nav-stacked">
		  			<li><a href="#getmusic">1.获取歌曲</a></li>
		  			<li><a href="#daysentence">2.获取每日一句</a></li>
		  		</ul>
		  	</div>	
		  	<!--导航菜单结束-->
  		</div>
  		<!--菜单结束-->

		<!--文档开始-->
  		<div class="col-md-10 col-lg-10 col-xs-12">
  			<div id="setting">
  				<p>
  					表单新页面打开（target）:<input type="checkbox" checked id="formswitch"/>
  					,表单提交类型(GET):<input data-on="success" data-off="warning" data-on-label="GET" data-off-label="POST" type="checkbox" checked id="postswitch"/>
  				</p>
  			</div>
  			<div id="getmusic">
  				<h2>1.获取歌曲<small>getmusic</small></h2>
  				
  				<!--测试表单-->
  				<form action="<?=site_url("apis");?>"  class="form-horizontal" role="form" target="_blank" method="get">

  					  <div class="form-group">
					    <label for="type" class="col-sm-2 control-label">请求类型:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="type" id="type" placeholder="api类型" value="getmusic" readonly="readonly" />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">开始条数:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="sCounts" id="inputPassword3" placeholder="开始条数,eg:0" >
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">结束条数:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="eCounts" id="inputPassword3" placeholder="结束条数,eg:10" >
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">确认</button>
					    </div>
					  </div>
  				</form>
  				
  				<h3>参数说明</h3>
  				<div class="table-responsive">
  					<table class="table table-bordered">
	  					<tr>
	  						<th>参数</th>
	  						<th>值（默认）</th>
	  						<th>可选</th>
	  						<th>参数说明</th>
	  					</tr>

	  					<tr>
	  						<td>type</td>
	  						<td>getmusic</td>
	  						<td>&nbsp;</td>
	  						<td>请求类型</td>
	  					</tr>

	  					<tr>
	  						<td>sCounts</td>
	  						<td>0</td>
	  						<td>是</td>
	  						<td>开始条数</td>
	  					</tr>

	  					<tr>
	  						<td>eCounts</td>
	  						<td>10</td>
	  						<td>是</td>
	  						<td>结束条数</td>
	  					</tr>
  					</table>
  				</div>
  				<p><strong>默认:</strong>开始条数(sCounts)为0,结束条数(eCounts)为10,将返回10条记录</p>
<pre>limit是mysql的语法
select * from table limit m,n
其中m是指记录开始的index，从0开始，表示第一条记录
n是指从第m+1条开始，取n条。
select * from tablename limit 2,4
即取出第3条至第6条，4条记录
来自:<a href="http://zhidao.baidu.com/link?url=Z7VOUZUxWp7bnATyzQoDOWmV4dsNbFs0kKqwftzo-SyM5Wm_RkN-I7g0ANwH-dHp1qi89lMPCbdducDcx7Xe-_" target="_blank">mysql limit参考链接</a></pre>	
  			</div>

  			<!--daySentence start-->
  			<div id="daysentence">
  				<h2>2.获取每日一句<small>daysentence</small></h2>
  				
  				<!--测试表单-->
  				<form action="<?=site_url("apis");?>"  class="form-horizontal" role="form" target="_blank" method="get">

  					  <div class="form-group">
					    <label for="type" class="col-sm-2 control-label">请求类型:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="type" id="type" placeholder="api类型" value="daysentence" readonly="readonly" />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">开始条数:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="sCounts" id="inputPassword3" placeholder="开始条数,eg:0" >
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">结束条数:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="eCounts" id="inputPassword3" placeholder="结束条数,eg:10" >
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">确认</button>
					    </div>
					  </div>
  				</form>
  				
  				<h3>参数说明</h3>
  				<div class="table-responsive">
  					<table class="table table-bordered">
	  					<tr>
	  						<th>参数</th>
	  						<th>值（默认）</th>
	  						<th>可选</th>
	  						<th>参数说明</th>
	  					</tr>

	  					<tr>
	  						<td>type</td>
	  						<td>daysentence</td>
	  						<td>&nbsp;</td>
	  						<td>请求类型</td>
	  					</tr>

	  					<tr>
	  						<td>sCounts</td>
	  						<td>0</td>
	  						<td>是</td>
	  						<td>开始条数</td>
	  					</tr>

	  					<tr>
	  						<td>eCounts</td>
	  						<td>5</td>
	  						<td>是</td>
	  						<td>结束条数</td>
	  					</tr>
  					</table>
  				</div>
  				<p><strong>默认:</strong>开始条数(sCounts)为0,结束条数(eCounts)为5,将返回5条记录</p>
  			</div>
  			<!--daySentence end-->

  		</div>
  		<!--文档结束-->
	</div>

</div>

<script type="text/javascript" src="<?=base_url();?>/res/bootstrap/js/apis.js"></script>
</body>
</html>