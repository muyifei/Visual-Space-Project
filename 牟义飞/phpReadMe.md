## php的问题
- php对xml的处理：使用simplexml_load_string，将XML转换为Object，使用方法见php官方文档https://www.php.net/simplexml_load_string
- php返回值：1. 对于被动消息回复接口，将客户端视为界面，使用echo
- 然鹅php并不能像python一样返回正确，未调通。
- 现在是测试工具可以通过，但手机无法返回值
>10.17
## 上述问题解决
- 原因是设置url时使用了host/wx，应使用host/wx/，（在python中使用了/wx）,注意到有没有“/”对访问的影响是很大的。
- 可能的情况是：有/会在这个目录下查找，而没有/的话会发起两次get请求，先在外目录找，在进入目录找
- 但是网上并没有这方面的详细资料，需要通过继续系统地学习来认识

