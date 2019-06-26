## 历史记录
>2019.6.26
>    默认安装的postgresql为9.2版本的，默认数据目录在/var/lib/pgsql/data下，未安装扩展
>    yum install httpd 默认配置文件路径在/etc/httpd/conf
>    安装apache使用的教程https://blog.csdn.net/Freshair_x/article/details/80387418
>    配置文件路径在/etc/httpd/conf,日志在/etc/httpd/logs，httpd模块在/etc/httpd/modules/，默认主页存放目录为/var/www/html
>    安装PHP的过程：1、安装epel
>                  2、rpm更新 rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
>                  3、yum install php70w
>                  4、可用yum search php70w查看可安装的php7的扩展包
>                  5、安装了php70w php70w-fpm php70w-cli php70w-common php70w-devel php70w-gd php70w-pgsql php70w-mbstring php70w-bcmath
>                  6、
