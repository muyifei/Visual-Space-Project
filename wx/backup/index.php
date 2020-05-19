<!DOCTYPE html>
<?php
	if (isset($_SESSION['authority'])){
		//echo('有session');
		echo "<script>var session=1;</script>";
	}else{
		session_destroy();
		session_start();
		if (isset($_SESSION['authority'])){
			//echo('有session');
			echo "<script>var session=1; var usr_name=1</script>";
		}else{
			//echo('没有session');
			echo "<script>var session=0;</script>";
		}
	}		
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <title>中国虚拟天文台-首页</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/index.css">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<!--Vue.js-->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<!-- Vuerouter.js -->
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<!-- ElementUI -->
	<!-- 引入样式 -->
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
	<!-- 引入组件库 -->
	<script src="https://unpkg.com/element-ui/lib/index.js"></script>
	<!-- axios -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- layui和样式 -->
	<script src="../javascript/layui/layui.all.js"></script>
	<link rel="stylesheet" href="../javascript/layui/css/layui.mobile.css">
</head>

<body>
<div id = "app">
    <main>
        <header>
            <div class="navigation">
                <a href="#">
                    <img src="../resources/Logo.png" width="240" height="42"/></a>

				<a href="#" class="login" @click="dialogFormVisible = true">登录</a>
                <a href="#" class="register" @click="registerMenu = true">注册</a>
            </div>
        </header>

        <div class="banner">
            <ul>
                <li><a href="#"><img src="../resources/l1.jpg" alt=""></a></li>
                <li><a href="#"><img src="../resources/l2.jpg" alt=""></a></li>
                <li><a href="#"><img src="../resources/l3.jpg" alt=""></a></li>
            </ul>
            <ul class="cur_li">
                <li class="cur"></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <nav>
            <ul class="clearFix">
                <li><a href="#"><img src="../resources/nav0.png" alt="">
                        <p>个人中心</p>
                    </a></li>
                <li><a href="#"><img src="../resources/nav1.png" alt="">
                        <p>望远镜查询</p>
                    </a></li>
                <li><a href="#"><img src="../resources/nav2.png" alt="">
                        <p>数据统计</p>
                    </a></li>
                <li><a href="#"><img src="../resources/nav3.png" alt="">
                        <p>用户绑定</p>
                    </a></li>
            </ul>
        </nav>

        <div class="products">
            <section class="pro">
                <h3>经典服务案例</h3>
                <div class=" clearFix">
                    <ul class="news">
                        <li class="list list-right-img"> 
                            <div class="left">
                                <div class="new">
                                    <p class="title list-ellipsis-1">郭守敬望远镜光谱巡天数据全生命周期服务</p>
                                    <p class="content">郭守敬望远镜（LAMOST）是中国天文界第一个国家重大科技基础设施，是世界上光谱获取率最高的天文望远镜。中心为LAMOST设计开发了世界上最大的天文光谱数据库，提供包括原始数据传输、归档、备份，产品数据归档、备份，发布、共享、在线分析和数据融合等全方位的服务。</p>
                                </div>
                                <span class="time">2019-10-22</span>
                            </div>
                            <div class="right">
                                <img src="../resources/cp1.jpg" alt="">
                            </div> 
                        </li>
                        <li class="list list-right-img"> <a href="case5.html">
                            <div class="left">
                                <div class="new">
                                    <p class="title list-ellipsis-1">500米口径球面射电望远镜技术支持服务</p>
                                    <p class="content">500米口径球面射电望远镜（FAST）是国家“十一五”重大科技基础设施，是世界最大单口径、最灵敏的射电望远镜，被誉为“中国天眼”。FAST于2016年9月25日落成，2020年1月11日通过国家验收，正式开放运行。中心为FAST科学观测和运行管理提供系统研发、数据管理、分析挖掘等多种支撑服务。</p>
                                </div>
                                <span class="time">2018-10-22</span>
                            </div>
                            <div class="right">
                                <img src="../resources/cp2.jpg" alt="">
                            </div> </a>
                        </li>
                        <li class="list list-right-img"> <a href="case6.html">
                            <div class="left">
                                <div class="new">
                                    <p class="title list-ellipsis-1">国内核心地基望远镜数据全生命周期服务</p>
                                    <p class="content">为兴隆2.16米望远镜、丽江2.4米望远镜、抚仙湖1米新真空太阳望远镜等一批国内核心天文观测设备提供时间申请、数据管理、传输、归档、备份、融合的统一服务，实现了数据和设备的开放共享，为研究人员提供资源集成平台，为望远镜运管团队提供个性化服务。</p>
                                </div>
                                <span class="time">2018-10-22</span>
                            </div>
                            <div class="right">
                                <img src="../resources/cp3.jpg" alt="">
                            </div> </a>
                        </li>
                        <li class="list list-right-img"> <a href="case7.html">
                            <div class="left">
                                <div class="new">
                                    <p class="title list-ellipsis-1">天文底片数字化项目数据汇交与技术服务</p>
                                    <p class="content">国家科技基础性工作专项项目“天文底片数字化”通过高精度底片扫描仪完成对国家天文台、紫金山天文台、上海天文台、云南天文台等自1901年至1999年跨越一个世纪的天文底片进行扫描和数字化。中心为项目提供数据清洗、数据整理服务和资料汇交，完成珍贵历史资料的开放共享。</p>
                                </div>
                                <span class="time">2018-10-22</span>
                            </div>
                            <div class="right">
                                <img src="../resources/cp4.jpg" alt="">
                            </div> </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </main>
	
	
<!-- 登录界面 -->

  <el-dialog center top="50%" width="250px" destroy-on-close :visible.sync="dialogFormVisible" class="login_container">
    <div class="login_box">
      <!--头像区域-->
      <div class="avatar_box">
        <img src="../resources/topNavSmallLogo.png" width="200" height="60">
      </div>
      <!--表单区域-->
      <el-form ref="loginFormRef"  :model="LoginForm" :rules="loginFormRules" label-width="0px" class="login_form">
        <el-form-item prop="username">
          <el-input prefix-icon="el-icon-user"  placeholder="请输入账号" v-model="LoginForm.username" ></el-input>
        </el-form-item>
        <el-form-item prop="passwd">
          <el-input prefix-icon="el-icon-key"  placeholder="请输入密码" v-model="LoginForm.passwd" show-password ></el-input>
        </el-form-item>
        <el-form-item class="btns">
          <el-button type="primary" @click="submitLogin">登录</el-button>
          <el-button type="info" @click="resetLoginForm">重置</el-button>
        </el-form-item>
      </el-form>
    </div>
  </el-dialog>
</div>
</body>
<script src="../javascript/index.js"></script>
<script>
	//Vuerouter
	//可以使用VueRouter，这样是一个单页的应用，在这里选择多页应用
	//Vue
	//Vue.prototype.$message = Element.Message

	let vm = new Vue({
		el : "#app",
		data: {
			LoginForm:{
				username: '',
				passwd: '',
			},
			loginFormRules: {
				username: [
				  { required: true, message: '请输入登录名称', trigger: 'blur' },
				  { min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur' }
				],
				passwd: [
				  { required: true, message: '请输入登录密码', trigger: 'blur' },
				  { min: 6, max: 15, message: '长度在 6 到 15 个字符', trigger: 'blur' }
				]
			},
			dialogFormVisible: false,
			registerMenu: false
		},
		
		methods: {
		// 点击重置按钮 重置表单
			submitLogin () {
				this.$refs.loginFormRef.validate(async valid => {
					console.log(valid);
					if (!valid) return
					const { data: res } = axios.post('http://47.111.115.187/wx/php/response.php', this.LoginForm)
					.then(function (response) {
						console.log(response);
						//状态不是200,ok
						//rec_data = json.decode(response.data);
						if (response.status !== 200){
							alert('登陆失败 '+response.status+' '+response.statusText)
							return -1
						}else{//状态是200，ok
							//window.sessionStorage.setItem('token', res.data.token);//设置token
							layui.use('layer', function(){
							  var layer = layui.layer;
							}); 
							if (response.data.token == true){
								
								layer.msg('登陆成功', {
									offset: 't',
									time: 1000,
								});
								//登陆成功part
								//跳转到index
								//window.sessionStorage.setItem('token', response.data.token)
								setTimeout(function(){ location.href = 'http://47.111.115.187/wx/htmls/index.php'; }, 1000);
								
							}else{
								layer.msg(response.data.error, {
									offset: 't',
									time: 1000,
								});
							}
							
							
							
						}
						//this.$message.error('登录失败')
						//alert(response.data.token)
						// 将登录成功之后的token保存到客户端的sessionStorage中
						
					})
					  .catch(function (error) {
						console.log(error);
						alert(error)
					});
					
				})
			},
			resetLoginForm () {
			  // console.log(this)
			  this.$refs.loginFormRef.resetFields()
			}
		}
	});
	
</script>
</html>
