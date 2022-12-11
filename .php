<?php
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
session_start();
// $iduser=$_SESSION['user']['id'];
$dsbl = loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .all {
      max-width: 100%;
      margin: 0 auto;
      padding: 0 auto;
      font-family: 'Poor Story', cursive;
      cursor: grab;
    }

    /*header*/
    .Hedear {
      display: flex;
      justify-content: space-around;
      background-color: floralwhite;
      margin-bottom: 20px;

    }

    /*logo*/
    .logo img {
      margin-left: 50px;
      width: 160px;
      height: 100px;
    }

    /*menu*/
    .menu {

      display: flex;
      justify-content: space-between;
    }

    .menu li {
      list-style: none;

      margin: 60px 30px;
    }

    .menu li a {
      padding: 10px;
      text-decoration: none;
      font-size: 17px;
      color: #666666D9;
    }

    .menu li:hover a:hover {
      background-color: #8CC63F;
      border-radius: 5px;
    }

    .menu li a:hover {
      color: #FFFFFF;
    }

    /*search*/
    .search {
      padding: 50px 20px;
    }

    .search input {
      border-radius: 10px;
      padding: 10px 20px;
      width: 230px;
      height: 35px;
      color: #8CC63F;
      background-color: floralwhite;

    }

    .search button {
      height: 35px;
      width: 60px;
      border-radius: 10px;
      color: #FFFFFF;
      background-color: #8CC63F;
    }

    .search button:hover {
      color: #FFFFFF;
      background-color: #8CC63F;
    }

    textarea {
      font-size: 1rem;
      letter-spacing: 1px;
      padding: 10px;
      max-width: 100%;
      line-height: 1.5;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-shadow: 1px 1px 1px #999;
    }

    .post {
      background-color: white;
    color: #8CC63F;
    padding: 5px;
      /* background-color: #8CC63F;
      border: 0; */
      border-radius: 10px;
      padding: 10px;
    }
    .post:hover{
      color: #FFFFFF;
    background-color: #8CC63F; 
    }
    .binhluan {
      display: flex;
      justify-content: center;
      margin: 8px;
    }

    .cmt {
      overflow: auto;
      margin: 0px 10px;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      width: 600px;
   
      box-shadow: 1px 1px 1px #999;
    
    }
    
    .guibinhluan{
      margin: 300px 10px 0 0  ;
    }
    p{
      word-wrap: break-word;
    }
    #hearts { color: #FF0000;}
#hearts-existing { color: #87bad7;}
   
  </style>
</head>

<body>
  <div class="binhluan">
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">


    <div class="col-lg-12 col-sm-6 text-center">
    <div class="well">
        <h4 style="color: #8CC63F">What is on your mind?</h4>
    <div class="input-group" >
    <input type="hidden" name="idpro" value="<?= $idpro ?>">
      <input type="text" id="userComment" class="form-control input-sm chat-input"  name="noidung" placeholder="Write your message here..." style="height:44px" />
	    <span class="input-group-btn" onclick="addComment()" style="padding:0 20px">   
     
      <input class="post" class="btn btn-primary btn-sm"type="submit" value="Gửi bình luận" name="guibinhluan" style="padding:10px 20px">
        </span>
    </div>  
    </div>
    <div class="container" style="width:700px">
	<div class="row">
		<h3 style="  color:black;">Hãy đánh giá độ hài lòng của bạn khi mua hàng tại Mona shop nào ??? </h3>
	</div>
    <div class="row lead">
        <div id="hearts" class="starrr"></div>
     
	</div>
    
    
</div>
</div>



     
    </form>
    <div class="cmt" style="height:450px;">
    <div class="container" style="width:400px">
          <div class="row">
            <div class="span4 well">
                    <div class="row">
                    <div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="view/img/anhabout.jpg" alt=""></a></div>
                    <div class="span3">
                      <p>admin</p>
                            <p ><strong >Cảm ơn quý khách đã mua hàng! những góp ý của quý khách chúng tôi xin ghi nhận và thời gian sắp tới chung tôi sẽ thay đổi để quý khách có những thời gian mua sản phẩm một cách hài lòng nhất . XIN CẢM ƠN!</strong></p>
                      <span class=" badge badge-warning">8 messages</span> <span class=" badge badge-info">15 followers</span>
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <?php
        foreach ($dsbl as $bl) {
          extract($bl);
       
          echo '<p style="font-weight: bold;">'.$bl['content'].'</p>';
          echo '<p>'.$bl['commentdate'].'</p> <hr>'; 
          
        }
        ?>
      
      
    </div>
  </div>
  <?php
  if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    if (isset($_SESSION['user']['id']) && ($_SESSION['user']['id'] > 0)) {
      $iduser = $_SESSION['user']['id'];
    } else {
      $iduser = 0;
    }
    // $iduser = $_SESSION['user']['id'];
    $ngaybinhluan = date('h:i:sa d/m/Y');
    insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
    echo '<script>
         window.location.href="'.$_SERVER['HTTP_REFERER'].'";
         </script>';
  }

  ?>

</body>

</html>
<script>// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-heart-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#hearts').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#hearts-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});</script>
