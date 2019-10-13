# 历史记录
>2019.6.26
- 默认安装的postgresql为9.2版本的，默认数据目录在/var/lib/pgsql/data下，未安装扩展
- yum install httpd 默认配置文件路径在/etc/httpd/conf
- 安装apache使用的教程https://blog.csdn.net/Freshair_x/article/details/80387418 ，Apaceh版本2.4.
- Apache配置文件路径在/etc/httpd/conf,日志在/etc/httpd/logs，httpd模块在/etc/httpd/modules/，默认主页存放目录为/var/www/html
- 安装PHP的过程：
1. 安装epel
2. rpm更新 rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
3. yum install php70w
4. 可用yum search php70w查看可安装的php7的扩展包
5. 安装了php70w php70w-fpm php70w-cli php70w-common php70w-devel php70w-gd php70w-pgsql php70w-mbstring php70w-bcmath
                  
## 尝试重新安装postgresql11版本
- yum remove postgresql-server.x86_64
- rpm -i https://yum.postgresql.org/11/redhat/rhel-7.5-x86_64/pgdg-redhat11-11-2.noarch.rpm 使用新的rpm
- 出现warning: /var/tmp/rpm-tmp.Ij3IhE: Header V4 DSA/SHA1 Signiture, key ID 442df0f8: NOKEY
- yum remove postgresql* 包括删除了php70w-pgsql
- 使用rpm --import /etc/pki/rpm-gpg/RPM* 解决warning
- rpm -i https://yum.postgresql.org/11/redhat/rhel-7.5-x86_64/pgdg-redhat11-11-2.noarch.rpm 使用新的rpm
- yum install postgresql11-server.x86_64 安装postgresql11版本
- yum install php70w-pgsql
- 设备名为postgresql-11
- 经过调试可以运行postgresql
- 运行方式：su - postgres 然后 psql

## 三者的连接

- 使用vim更改httpd.conf中的：
1. 添加 index.php
2. LoadModule php7_module modules/libphp7.so
3. <FilesMatch \.php$>
      SetHandler application/x-httpd-php
   </FilesMatch>
4. AddType aplication/x-httpd-php .php
   AddType aplication/x-httpd-php-source .phps
5. PHPIniDir /etc/php.ini /*找到/etc/php.ini*/

- 使用php7的php.ini-development替代原有的php.ini

##  公网IP地址为47.111.115.187
- 访问使用教程https://www.cnblogs.com/sunlxp/p/8006979.html

##  Postgresql和php连接
- 尝试更改/var/lib/pgsql/11/data/pg_hba.conf 加入host all all 0.0.0.0/0 trust
- 尝试设置postgres用户的密码为vs19space
- 尝试更改/var/lib/pgsql/11/data/pg_hba.conf 将host 本地 ident 改为md5，将外界IP访问也改为md5
- 成功

##  添加中文
- 添加成功，但是不能用网页端访问，原因可能是网页端的显示无法使用UTF-8，只能用英文，使用PUTTY即可解决，如何使用可以参考阿里云的连接帮助或问我

##  安装Python
- 使用教程https://blog.csdn.net/u013214212/article/details/81540840
- 安装了web.py
- test.py在/usr/muyifei中，测试使用微信的接口

##  使用python连通微信测试号
- 成功，见/home/muyifei/main.py
- 接下来使用php代替python进行开发

##  php遇到的问题
- $GLOBALS["HTTP_RAW_POST_DATA"] 获取不到数据：改用file_get_contents('php://input')
