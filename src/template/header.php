<div class="header">
	<div class="logo">
		<a href="#"></a>
	</div>
	<div class="menu">
		<a href="<?php p(webhost)?>" <?php if($model=='judge'){p('class="current"');}?>>评价</a>
		<a href="<?php p(webhost.'rank/')?><?php p($gend==0?'':'1')?>" <?php if($model=='rank'){p('class="current"');}?>>排行榜</a>
		<a href="<?php p($gend==0?1:0)?>">男女切换</a>
		<a href="<?php p(webhost.'about/')?>" <?php if($model=='about'){p('class="current"');}?>>关于</a>
	</div>
</div>
<div class="clear"></div>