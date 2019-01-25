<?php 
// Tôi chọn password là "kangourou"
if(isset($_POST['password'])) // Nếu biến này tồn tại
{
    // Mình hãy tạo một biến $mat_khau chứa cái password mà người ta gõ vào nhé
    $mat_khau = $_POST['password'];
}
else // biến chưa tồn tại
{
    $mat_khau = ""; // Tạo một biến rỗng
}

if ($mat_khau == "ilovemypen") // nếu mật khẩu đúng
{
// Mình cho hiện ra nội dung trang web
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" type="image/png" href="image/favicon.png">
		<title>Tynylove</title>	    
        <link type="text/css" rel="stylesheet" href="./renxi/default.css">
		<script type="text/javascript" src="./renxi/jquery.min.js"></script>
		<script type="text/javascript" src="./renxi/jscex.min.js"></script>
		<script type="text/javascript" src="./renxi/jscex-parser.js"></script>
		<script type="text/javascript" src="./renxi/jscex-jit.js"></script>
		<script type="text/javascript" src="./renxi/jscex-builderbase.min.js"></script>
		<script type="text/javascript" src="./renxi/jscex-async.min.js"></script>
		<script type="text/javascript" src="./renxi/jscex-async-powerpack.min.js"></script>
		<script type="text/javascript" src="./renxi/functions.js" charset="utf-8"></script>
		<script type="text/javascript" src="./renxi/love.js" charset="utf-8"></script>
	    <style type="text/css">
<!--
.STYLE1 {color: #666666}
-->
        </style>
</head>
    <body>
        <div id="main">
            <div id="error">Nó hông hiện hở em yêu, kêu anh nè ;) :-*</div>
             <div id="wrap">
                <div id="text">
			        <div id="code">
			      <font color="#151515"><span class="say">Em yêu dấu <3</span><br>
						<span class="say"> </span><br>
						<span class="say">Ngày mình quen nhau đó em yêu</span><br>
						<span class="say">Anh đem hoa chạy qua nhà em yêu đó ;)	</span><br>
						<span class="say">Rồi anh hỏi "BeN nè, anh hỏi ni nè..</span><br>
						<span class="say">Có một người cũng hay nt cho anh mỗi ngày..</span><br>
						<span class="say">cầm tay anh rồi, có ôm nhẹ anh một lần nữa...</span><br>
						<span class="say">Không biết người ta có th....."</span><br>
						<span class="say">Nhưng mờ anh run quá ^^</span><br>
						<span class="say">Anh nói "làm người yêu anh nhé!" <3</span><br>
						<span class="say">Xong bây giờ em yêu là mẹ tấm nè! :-*</span><br>
						<span class="say"> </span><br>
                    </font>    
					<font color="#DF0101"><span class="say"><span class="space"></span>-- Anh yêu em <3 --</span><br>
                        <span class="say">-- yêu tấm, yêu cả nhà mình! --</span>
			  </font></p>
      </div>
                </div>
                <div id="clock-box">
                    <!--span class="STYLE1"></span><font color="#FF0000">Anh <3 Em</font-->
<span class="STYLE1"> Time of love...</span>
                  <div id="clock"></div>
              </div>
                <canvas id="canvas" width="1100" height="680"></canvas>
            </div>
            
        </div>
    
    <script>
    </script>

    <script>
    (function(){
        var canvas = $('#canvas');
		
        if (!canvas[0].getContext) {
            $("#error").show();
            return false;        }

        var width = canvas.width();
        var height = canvas.height();        
        canvas.attr("width", width);
        canvas.attr("height", height);
        var opts = {
            seed: {
                x: width / 2 - 20,
                color: "rgb(190, 26, 37)",
                scale: 2
            },
            branch: [
                [535, 680, 570, 250, 500, 200, 30, 100, [
                    [540, 500, 455, 417, 340, 400, 13, 100, [
                        [450, 435, 434, 430, 394, 395, 2, 40]
                    ]],
                    [550, 445, 600, 356, 680, 345, 12, 100, [
                        [578, 400, 648, 409, 661, 426, 3, 80]
                    ]],
                    [539, 281, 537, 248, 534, 217, 3, 40],
                    [546, 397, 413, 247, 328, 244, 9, 80, [
                        [427, 286, 383, 253, 371, 205, 2, 40],
                        [498, 345, 435, 315, 395, 330, 4, 60]
                    ]],
                    [546, 357, 608, 252, 678, 221, 6, 100, [
                        [590, 293, 646, 277, 648, 271, 2, 80]
                    ]]
                ]] 
            ],
            bloom: {
                num: 700,
                width: 1080,
                height: 650,
            },
            footer: {
                width: 1200,
                height: 5,
                speed: 10,
            }
        }

        var tree = new Tree(canvas[0], width, height, opts);
        var seed = tree.seed;
        var foot = tree.footer;
        var hold = 1;

        canvas.click(function(e) {
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            if (seed.hover(x, y)) {
                hold = 0; 
                canvas.unbind("click");
                canvas.unbind("mousemove");
                canvas.removeClass('hand');
            }
        }).mousemove(function(e){
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            canvas.toggleClass('hand', seed.hover(x, y));
        });

        var seedAnimate = eval(Jscex.compile("async", function () {
            seed.draw();
            while (hold) {
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canScale()) {
                seed.scale(0.95);
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canMove()) {
                seed.move(0, 2);
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
        }));

        var growAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.grow();
                $await(Jscex.Async.sleep(10));
            } while (tree.canGrow());
        }));

        var flowAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.flower(2);
                $await(Jscex.Async.sleep(10));
            } while (tree.canFlower());
        }));

        var moveAnimate = eval(Jscex.compile("async", function () {
            tree.snapshot("p1", 240, 0, 610, 680);
            while (tree.move("p1", 500, 0)) {
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
            foot.draw();
            tree.snapshot("p2", 500, 0, 610, 680);

            canvas.parent().css("background", "url(" + tree.toDataURL('image/png') + ")");
            canvas.css("background", "#ffe");
            $await(Jscex.Async.sleep(300));
            canvas.css("background", "none");
        }));

        var jumpAnimate = eval(Jscex.compile("async", function () {
            var ctx = tree.ctx;
            while (true) {
                tree.ctx.clearRect(0, 0, width, height);
                tree.jump();
                foot.draw();
                $await(Jscex.Async.sleep(25));
            }
        }));

        var textAnimate = eval(Jscex.compile("async", function () {
		    var together = new Date();
		    var year = 2016, month = 5, day = 28; // thay đổi ngày tháng năm tại đây
		    together.setFullYear(year, month - 1, day); 			
		    together.setHours(15);							
		    together.setMinutes(0);				
		    together.setSeconds(0);					
		    together.setMilliseconds(0);			

		    $("#code").show().typewriter();
            $("#clock-box").fadeIn(500);
            while (true) {
                timeElapse(together);
                $await(Jscex.Async.sleep(1000));
            }
        }));

        var runAsync = eval(Jscex.compile("async", function () {
            $await(seedAnimate());
            $await(growAnimate());
            $await(flowAnimate());
            $await(moveAnimate());

            textAnimate().start();

            $await(jumpAnimate());
        }));

        runAsync().start();
    })();
    </script>
<!-- src="hat em nghe.mp3" hidden="true" autostart="true"></embed-->
<iframe width="100%" height="500" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/445200990%3Fsecret_token%3Ds-j5NM9&amp;color=%23ffe&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
		
		<!-- Script Popup-->
<script type="text/javascript">
function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">hem cho ai xem đâu[X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Điều bí mật cho mẹ tấm nè!</a>';
 }
 }
</script>
<style>
.float-ck { position: fixed; bottom: 0px; z-index: 9000}
* html .float-ck {position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
#float_content_right {border: 1px solid #01AEF0;}
#hide_float_right {text-align:right; font-size: 11px;}
#hide_float_right a {background: #01AEF0; padding: 2px 4px; color: #FFF;}
</style>

<!-- Code hien thi -->
<div id="mobile-hide" class="float-ck" style="right: 0px" >
<div id="hide_float_right">



<a href="javascript:hide_float_right()">Điều bí mật cho mẹ tấm nè!</a></div>
<div id="float_content_right" style="display: none;">
<!-- Start quang cao: phần này sẽ hiển thị nội dung của quảng cáo có thể chèn ảnh hoặc video hay flash tùy bạn -->
<iframe src="messages.html" width="400px"  height="200px" frameborder="0" scrolling="auto" ></iframe>
<!-- End quang cao -->
</div>
</div>

</body>
</html>

<?php 
}
else // nếu mật khẩu không đúng
{
// Mình cho hiện ra vùng text để gõ lại mật khẩu.
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" type="image/png" href="image/favicon.png">
		<title>Tynylove</title>
		<link type="text/css" rel="stylesheet" href="./renxi/passs.css">
	<style>
	body {background-image:url('./image/bg.png');
		background-color:#ffe;
		background-repeat:no-repeat;
		background-position:center top;
		}
	</style>
</head>
    <body>
	<form class="form-3" background="./image/hematology.jpg" action="index.php" method="post">
        <p><input type="password" name="password" id="password" placeholder="Password"></p>
</form>
    </body>
</html>
<?php 
} // kết thúc else
// kết thúc code :)
?> 