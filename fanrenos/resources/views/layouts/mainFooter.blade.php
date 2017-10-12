<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>网站简介</h3>
            <p class="am-text-sm">{!!config('blog.des')!!}</p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href="javascript:;"><span data-am-popover="{content: 'MomentD的 QQ-3484368175' ,trigger: 'hover focus'}" class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href="https://github.com/MomentD" target="_blank"><span data-am-popover="{content: 'MomentD的 Github' ,trigger: 'hover focus'}" class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href="javascript:;"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href="https://gitee.com/fanrenos" target="_blank"><span data-am-popover="{content: 'MomentD的 码云' ,trigger: 'hover focus'}" class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                <a href="javascript:;"><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
            <h3>坚信</h3>
            <p>{!!config('blog.credits')!!}</p>          
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
              <h1>站在巨人的肩膀上就是爽</h1>
             <h3>Heroes</h3>
            <p>
                <ul>
                    <li>Laravel</li>
                    <li>PHP</li>
                    <li>jQuery</li>
                    <li>MySql</li>
                    <li>...</li>
                </ul>
            </p>
        </div>
    </div>
    <div class="blog-text-center">Copyright © {{ config('blog.author') }} 2017. <a href="{{config('blog.subtitle')}}">{{config('blog.subtitle')}}</a> Made with love <a href="{{url('/')}}">{{config('blog.name')}}</a><br><a href="http://webscan.360.cn/index/checkwebsite/url/www.fanrenos.com" name="b2499ba2411b04498798829c2deb02d3" >360网站安全检测平台</a></div>
  </footer>