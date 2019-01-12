<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>最萌班级合照秀</title>
    <link rel="stylesheet" href="{{asset('tp')}}/css/celebrity.css">
</head>
<body>
    <div id="wrap_popup">
        <div id="popup_rule">
            <div class="popup">
                <div class="head">
                    <h4>最萌班级合照秀 · 活动规则</h4>
                    <a href="index.blade.php" class="btn-close-wrap">
                        <span class="s btn-close"></span></a>
                </div>
                <div class="body" style="padding:0 20px;">
                    <div class="wrap-rule">
                        <h5>活动介绍：</h5>
                        <p>{!! $res->hdjs !!}</p>

                    </div>
                    <div class="wrap-rule">
                        <h5>温馨提示：</h5>
                        <p>{{$res->message}}</p>
                    </div>
                    <div class="wrap-rule">
                        <h5>奖品设置：</h5>
                        <p>{{$res->jxsz}}</p>
                    </div>
                    <div class="wrap-rule">
                        <h5>关于作弊：</h5>
                        <p>{{$res->gyzb}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('tp')}}/js/zepto.js"></script>
    <script src="{{asset('tp')}}/js/jweixin-1.js"></script>
    <script src="{{asset('tp')}}/js/celebrity.js"></script>
</body>

</html>
