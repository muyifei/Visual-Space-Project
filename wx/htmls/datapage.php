 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
<link rel="stylesheet" href="datapage.css">
<script type="text/javascript" src="echarts.min.js"></script>
<title>数据页</title>

</head>
<?php
  $host    = "host=localhost";
  $port    = "port=5432";
  $dbname   = "dbname=space";
  $credentials = "user=postgres";
  $password = "password=vs19space";
  $db = pg_connect( "$host $port $dbname $credentials $password" );
  if(!$db){
   echo "Error : Unable to open database\n";
	exit;
  } 
  //else {
   //echo "Opened database successfully\n";
  //}
   $sql =<<<EOF
   SELECT * from guidang;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret){
   echo pg_last_error($db);
   exit;
  }
  $arr1=array();
   $a=0;
    $arr2=array();
  
  while($row = pg_fetch_row($ret)){
    
    $arr1[$a]=$row[0];
	$arr2[$a]=(float)$row[1] ;
	//echo "NAME = ". $arr2[$a] ."\n";
	 
  $a++;
  }
 
  //Spg_close($db);
?>
<body>

<div class="header">
  <img src="images/Logo.png" width="240" height="42"/>
</div>

<div class="topnav">
  <a href="#">平台综合数据</a>
  <a href="#">望远镜</a>
  <a href="#">数据归档</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card" id="data_archiving" style= 'height: 400px'></div>
		<script type="text/javascript"  > 
		var arr_js1 = <?php echo json_encode($arr1)?>; 
       var arr_js2 = <?php echo json_encode($arr2)?>; 
        var dom = document.getElementById("data_archiving");
			var myChart = echarts.init(dom);
			
			var option = {
				dataset:{
					sourceHeader: true,
					source: [
						['dataset_name',	'数据量_TB'                                                   ],
						[arr_js1[0],	arr_js2[0]                                          ],
						[ arr_js1[1],	arr_js2[1]                                           ],
						[arr_js1[2],	arr_js2[2]                                       ],
						[arr_js1[3],	arr_js2[3]                                                   ],
						[arr_js1[4],	arr_js2[4]                                           ],
						[arr_js1[5],	arr_js2[5]                                                   ],
						[arr_js1[6],	arr_js2[6]                                                   ],
						[arr_js1[7],	arr_js2[7]                                        ],
						[arr_js1[8],	 arr_js2[8]],
						[arr_js1[9],	arr_js2[9]                                      ],
						[arr_js1[10],	arr_js2[10]                                       ],
						[arr_js1[11],	arr_js2[11]                                   ],
						[arr_js1[12],	arr_js2[12]                                           ],
						[arr_js1[13],	arr_js2[13]                                                 ],
						[arr_js1[14],	arr_js2[14]                                                 ],
						[arr_js1[15],	arr_js2[15]                                          ],
						[arr_js1[16],arr_js2[16]  ],
				[arr_js1[17],arr_js2[17]   ],
				[arr_js1[18],arr_js2[18]   ]
					]
				},
				tooltip: {
					trigger: 'item',
					formatter: "{a} <br/>{b}: {c} ({d}%)",
					confine: true
				},
				legend: {
					show: false,
					orient: 'vertical',
					textStyle: {
            			color: '#fff',
            			fontSize: 10,
            			fontWeight: 400,
        			}
				},
				title:{
					text: '数据归档（TB）',
					left: 'center',
					textStyle:{
						color: '#c23531',
						fontSize:16
					},
					textShadowColor: 'rgba(0, 0, 0, 0.5)'
				},
				series: [{
					name: '数据集名称',
					type: 'pie',
					width: '90%',
					radius: ['65%', '90%'],
					center: ['50%', '50%'],
					avoidLabelOverlap: false,
					label: {
						normal: {
							show: false,
							position: 'center'
						},
						emphasis: {
							show: true,
							textStyle: {
								fontSize: '20',
								color: '#000'
							}
						}
					},
					itemStyle: {
                    	emphasis: {
                    		shadowBlur: 10,
                    		shadowOffsetX: 0,
                    		shadowColor: 'rgba(0, 0, 0, 0.5)',
                		}
            		}
				}]
			};
			if(option && typeof option === "object") {
				myChart.setOption(option, true);
			}
			</script>
             <?php
  $host    = "host=localhost";
  $port    = "port=5432";
  $dbname   = "dbname=space";
  $credentials = "user=postgres";
  $password = "password=vs19space";
  $db = pg_connect( "$host $port $dbname $credentials $password" );
  if(!$db){
   echo "Error : Unable to open database\n";
  } 
  //else {
   //echo "Opened database successfully\n";
  //}
   $sql =<<<EOF
   SELECT * from tiaoxing;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret){
   echo pg_last_error($db);
   exit;
  }
  $arr3=array();
   $a=0;
    $arr4=array();
  
  while($row = pg_fetch_row($ret)){
    
    $arr3[$a]=$row[0];
	$arr4[$a]=(float)$row[1] ;
	//echo "NAME = ". $arr2[$a] ."\n";
	 
  $a++;
  }
 
  //Spg_close($db);
?>
    <div class="card" id='data_query' style="height: 500px;"></div>
    <script type="text/javascript">
	 
var arr_js3 = <?php echo json_encode($arr3)?>; 
       var arr_js4 = <?php echo json_encode($arr4)?>; 
	var barchart = echarts.init(document.getElementById('data_query'));
var baroption = {
	dataset:{
		sourceHeader: true,
		source:[
			['数据集名称'	,'query_count'                                             ],
			     
			 [arr_js3[0],arr_js4[0]   ],
			[arr_js3[1],arr_js4[1]    ],
			[arr_js3[2],arr_js4[2]    ],
				[arr_js3[3],arr_js4[3]   ],
				[arr_js3[4],arr_js4[4]    ],
			 [arr_js3[5],arr_js4[5]    ],
			[arr_js3[6],arr_js4[6]   ],
				[arr_js3[7],arr_js4[7]   ],
				[arr_js3[8],arr_js4[8]   ],
				[arr_js3[9],arr_js4[9]   ],
				[arr_js3[10],arr_js4[10]   ],
				[arr_js3[11],arr_js4[11]   ],
			 [arr_js3[12],arr_js4[12]   ],
				[arr_js3[13],arr_js4[13]   ],
				[arr_js3[14],arr_js4[14]   ],
				[arr_js3[15],arr_js4[15]   ],
				[arr_js3[16],arr_js4[16]  ],
				[arr_js3[17],arr_js4[17]   ],
				[arr_js3[18],arr_js4[18]   ],
				[arr_js3[19],arr_js4[19]   ],
				[arr_js3[20],arr_js4[20]  ],
				[arr_js3[21],arr_js4[21]  ],
				[arr_js3[22],arr_js4[22] ],
				[arr_js3[23],arr_js4[23] ],
				[arr_js3[24],arr_js4[24]  ],
				[arr_js3[25],arr_js4[25]  ],
				[arr_js3[26],arr_js4[26]  ],
				[arr_js3[27],arr_js4[27]  ],
				[arr_js3[28],arr_js4[28]  ],
				[arr_js3[29],arr_js4[29]  ],
				[arr_js3[30],arr_js4[30] ],
				[arr_js3[31],arr_js4[31]  ],
				[arr_js3[32],arr_js4[32]  ],
				[arr_js3[33],arr_js4[33]  ],
				[arr_js3[34],arr_js4[34]  ],
				[arr_js3[35],arr_js4[35]  ],
				[arr_js3[36],arr_js4[36]  ],
				[arr_js3[37],arr_js4[37]  ],
				[arr_js3[38],arr_js4[38]   ],
				[arr_js3[39],arr_js4[39]  ],
				[arr_js3[40],arr_js4[40]  ],
				[arr_js3[41],arr_js4[41]  ]
			 ]
	},
	tooltip : {
		trigger: 'axis',
		axisPointer: {
			type: 'shadow',
			label: {
				show: true
			}
		}
	},
	label: {
		show: false,
		position: 'right',
		color: 'auto'
	},
	textStyle:{
		color: '#3FD0F9'
	},
	title:{
		text: '数据库访问',
		left: 'center',
		textStyle:{
			color: '#c23531',
			fontSize:16
		},
		textShadowColor: 'rgba(0, 0, 0, 0.5)'
	},
	grid: {
		containLabel: true,
		left:'0%',
		right:'12%',
		bottom:'0%'
	},
	xAxis: {
		name: '查询\n次数',
		nameLocation: 'end',
		type: 'value',
		nameTextStyle: {
			color: '#fe8104'
		},
		axisLabel: {
			interval:0,
			rotate:'45'
		}
	},
	yAxis: {
		name: '查询数据库',
		type: 'category',
		nameTextStyle: {
			color: '#fe8104',
		},
		axisLabel: {
			formatter: function (name) {
				  if (name.length > 5) {
					return name.slice(0,5) + '...';
				  }
				  else{
					  return name;
				  }
			}
		}
	},
	series: [
		{
			type: 'bar',
			encode: {
				// Map the "amount" column to X axis.
				x: 'query_count',
				// Map the "product" column to Y axis
				y: '数据集名称'
			},
			
			color: 'orange'
		}
	]	
};

barchart.setOption(baroption);
</script>
 <?php
  $host    = "host=localhost";
  $port    = "port=5432";
  $dbname   = "dbname=space";
  $credentials = "user=postgres";
  $password = "password=vs19space";
  $db = pg_connect( "$host $port $dbname $credentials $password" );
  if(!$db){
   echo "Error : Unable to open database\n";
  } 
  //else {
   //echo "Opened database successfully\n";
  //}
   $sql =<<<EOF
   SELECT * from yonghu;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret){
   echo pg_last_error($db);
   exit;
  }
  $arr5=array();
   $a=0;
    $arr6=array();
  
  while($row = pg_fetch_row($ret)){
    
    $arr5[$a]=$row[0];
	$arr6[$a]=(float)$row[1] ;
	//echo "NAME = ". $arr2[$a] ."\n";
	 
  $a++;
  }
 
  //Spg_close($db);
?>
    <div class="card" id="user_unit" style= 'height: 400px'></div>
    <script type="text/javascript" >
	var piechart = echarts.init(document.getElementById('user_unit'));
	var arr_js5 = <?php echo json_encode($arr5)?>; 
       var arr_js6 = <?php echo json_encode($arr6)?>; 
	var pieoption = {
        dataset:{
			sourceHeader: true,
			source: [
				['dataset_name',	'数据量_TB'                                                   ],
				[arr_js5[0] ,	    arr_js6[0]                               ],
				[arr_js5[1] ,	arr_js6[1]                                              ],
				[ arr_js5[2],	arr_js6[2]                                            ],
				[arr_js5[3],	arr_js6[3]                                                  ],
				[arr_js5[4],	arr_js6[4]                                             ],
				[arr_js5[5],	arr_js6[5]                                                     ],
				[arr_js5[6],	arr_js6[6]                                                     ],
				[arr_js5[7],	arr_js6[7]                                       ],
				[arr_js5[8],	arr_js6[8]  ],
				[arr_js5[9],	arr_js6[9]                                       ],
				[arr_js5[10],	arr_js6[10]                                        ],
				[arr_js5[11],arr_js6[11]                                     ],
				[arr_js5[12],	arr_js6[12]                                           ],
				[arr_js5[13],	arr_js6[13]                                                    ],
				[arr_js5[14],	arr_js6[14]                                                     ],
				[arr_js5[15],	arr_js6[15]                                            ],
				[arr_js5[16],	arr_js6[16]                            ],
				[arr_js5[17],	arr_js6[17]                                             ],
				[arr_js5[18],	arr_js6[18]                                        ]
			]
		},
		tooltip: {//提示框，可以在全局也可以在
            trigger: 'item',
			formatter: "{a} <br/>{b}: {c} ({d}%)",
			confine: true
        },
        legend: {  //图例
            show: false,
            orient: 'vertical',  //图例的布局，竖直    horizontal为水平
            x: 'right',//图例显示在右边
            textStyle:{    //图例文字的样式
                color:'#3',  //文字颜色
                fontSize:12    //文字大小
            }
        },
        title:{
            text: '用户单位',
            left: 'center',
            textStyle:{
                color: '#c23531',
                fontSize:16
            },
            textShadowColor: 'rgba(0, 0, 0, 0.5)'
        },
        series: [
            {
                name:'访问来源',
                type:'pie', //环形图的type和饼图相同
                radius: ['65%', '90%'],//饼图的半径，第一个为内半径，第二个为外半径
                //dimensions:['dataset_name',	'数据量_TB' ],
                color:['#D1FBEF','#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                           '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                           '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'],
				avoidLabelOverlap: true,
                label: {
                    normal: {  //正常的样式
                        show: false,
                        position: 'center',
						formatter: function(params){
							var tmp1 = "";
							tmp1 = "("+params.name+") ";
							tmp1 += params.value[1]+" ";
							tmp1 += "("+params.percent+"%)";
							return tmp1;
						},
                    },
                    emphasis: { //选中时候的样式
                        show: true,
                        textStyle: {
                            fontSize: '20',
                            fontWeight: 'bold',
                            color: '#000'
                        },
						formatter: function(params){
							var tmp1 = "";
							tmp1 = "("+params.name+") ";
							tmp1 += params.value[1]+" ";
							tmp1 += "("+params.percent+"%)";
							return tmp1;
						},
                    }
                },  //提示文字
                labelLine: {
                    normal: {
                        show: true
                    }
                },
				tooltip: {//提示框，可以在全局也可以在
					trigger: 'item',  //提示框的样式
					formatter: function(params){
						var tmp = "";
						tmp = params.name + "<br>数据量_TB: ";
						tmp += params.value[1];
						tmp += "("+params.percent+"%)";
						return tmp;
					},
					color:'#000', //提示框的背景色
					textStyle:{ //提示的字体样式
						color:"white",
					}
				},
            }
        ]
    };
	piechart.setOption(pieoption);
	</script>
    <?php
  $host    = "host=localhost";
  $port    = "port=5432";
  $dbname   = "dbname=space";
  $credentials = "user=postgres";
  $password = "password=vs19space";
  $db = pg_connect( "$host $port $dbname $credentials $password" );
  if(!$db){
   echo "Error : Unable to open database\n";
  } 
  //else {
   //echo "Opened database successfully\n";
  //}
   $sql =<<<EOF
   SELECT * from pingtai;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret){
   echo pg_last_error($db);
   exit;
  }
  $arr7=array();
   $a=0;
    $arr8=array();
  
  while($row = pg_fetch_row($ret)){
    
    $arr7[$a]=$row[0];
	$arr8[$a]=(float)$row[1] ;
	//echo "NAME = ". $arr2[$a] ."\n";
	 
  $a++;
  }
 
  //Spg_close($db);
?>
    <div class="card" id="registered_users" style= 'height: 400px'></div>
		<script type="text/javascript" >
		var myChart = echarts.init(document.getElementById('registered_users'));
	var arr_js7 = <?php echo json_encode($arr7)?>; 
       var arr_js8 = <?php echo json_encode($arr8)?>; 
	var option = {
		dataset:{
			source: [
				['register_date(month)','users'],
				[arr_js7[0],arr_js8[0]   ],
				[arr_js7[1],arr_js8[1]    ],
				[arr_js7[2],arr_js8[2]    ],
				[arr_js7[3],arr_js8[3]   ],
				[arr_js7[4],arr_js8[4]    ],
				[arr_js7[5],arr_js8[5]    ],
				[arr_js7[6],arr_js8[6]   ],
				[arr_js7[7],arr_js8[7]   ],
				[arr_js7[8],arr_js8[8]   ],
				[arr_js7[9],arr_js8[9]   ],
				[arr_js7[10],arr_js8[10]   ],
				[arr_js7[11],arr_js8[11]   ],
				[arr_js7[12],arr_js8[12]   ],
				[arr_js7[13],arr_js8[13]   ],
				[arr_js7[14],arr_js8[14]   ],
				[arr_js7[15],arr_js8[15]   ],
				[arr_js7[16],arr_js8[16]  ],
				[arr_js7[17],arr_js8[17]   ],
				[arr_js7[18],arr_js8[18]   ],
				[arr_js7[19],arr_js8[19]   ],
				[arr_js7[20],arr_js8[20]  ],
				[arr_js7[21],arr_js8[21]  ],
				[arr_js7[22],arr_js8[22] ],
				[arr_js7[23],arr_js8[23] ],
				[arr_js7[24],arr_js8[24]  ],
				[arr_js7[25],arr_js8[25]  ],
				[arr_js7[26],arr_js8[26]  ],
				[arr_js7[27],arr_js8[27]  ],
				[arr_js7[28],arr_js8[28]  ],
				[arr_js7[29],arr_js8[29]  ],
				[arr_js7[30],arr_js8[30] ],
				[arr_js7[31],arr_js8[31]  ],
				[arr_js7[32],arr_js8[32]  ],
				[arr_js7[33],arr_js8[33]  ],
				[arr_js7[34],arr_js8[34]  ],
				[arr_js7[35],arr_js8[35]  ],
				[arr_js7[36],arr_js8[36]  ],
				[arr_js7[37],arr_js8[37]  ],
				[arr_js7[38],arr_js8[38]   ],
				[arr_js7[39],arr_js8[39]  ],
				[arr_js7[40],arr_js8[40]  ],
				[arr_js7[41],arr_js8[41]  ],
				[arr_js7[42],arr_js8[42]  ],
				[arr_js7[43],arr_js8[43]  ],
				[arr_js7[44],arr_js8[44]  ],
				[arr_js7[45],arr_js8[45]  ],
				[arr_js7[46],arr_js8[46]  ],
				[arr_js7[47],arr_js8[47]  ],
				[arr_js7[48],arr_js8[48]  ],
				[arr_js7[49],arr_js8[49]  ],
				[arr_js7[50],arr_js8[50]  ],
				[arr_js7[51],arr_js8[51]   ],
				[arr_js7[52],arr_js8[52]  ],
				[arr_js7[53],arr_js8[53]   ],
				[arr_js7[54],arr_js8[54]   ],
				[arr_js7[55],arr_js8[55]  ],
				[arr_js7[56],arr_js8[56]   ],
				[arr_js7[57],arr_js8[57]   ],
				[arr_js7[58],arr_js8[58]  ],
				[arr_js7[59],arr_js8[59]  ],
				[arr_js7[60],arr_js8[60]   ],
				[arr_js7[61],arr_js8[61]  ],
				[arr_js7[62],arr_js8[62]  ],
				[arr_js7[63],arr_js8[63]   ],
				[arr_js7[64],arr_js8[64]  ],
				[arr_js7[65],arr_js8[65]   ],
				[arr_js7[66],arr_js8[66]   ],
				[arr_js7[67],arr_js8[67]   ],
				[arr_js7[68],arr_js8[68]   ],
				[arr_js7[69],arr_js8[69]   ],
				[arr_js7[70],arr_js8[70]  ],
				[arr_js7[71],arr_js8[71]   ],
				[arr_js7[72],arr_js8[72]  ],
			]
		},
        title: {
            text: '平台注册用户数历史数据',
			left: 'center',
			textStyle:{
				color: '#c23531',
				fontSize:16
			},
				textShadowColor: 'rgba(0, 0, 0, 0.5)'
        },
        grid: {
            bottom: '8%'
        },
		tooltip: {
			trigger: 'axis'
		},
		xAxis:{
			type: 'category',
			nameTextStyle:{
			color: '#ffde33'
			},
			axisLine:{
			lineStyle:{
				color: '#ffde33'
			}
			}
		},
        yAxis: {
            nameTextStyle:{
				color: '#ffde33'
					},
						axisLine:{
							lineStyle:{
							color: '#ffde33'
				}
            },
            axisLabel:{
                interval:0,
			    rotate:'45'
            }
        },
        toolbox: {
            left: 'left',
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                restore: {},
                saveAsImage: {}
            }
        },
        dataZoom: [{
            startValue: '201611'
        }, {
            type: 'inside'
        }],
        series: {
            name: 'Linetest1',
            type: 'line',
			//symbol: 'none',
			smooth: true,
			//itemStyle : { normal: {label : {show: true}}},
			color: {
				type: 'linear',
				x: 0,
				y: 0,
				x2: 0,
				y2: 1,
				colorStops: [{
					offset: 0, color: 'orange' // 0% 处的颜色
				}, {
					offset: 1, color: 'red' // 100% 处的颜色
				}],
				global: false // 缺省为 false
			}
        }
    }

	myChart.setOption(option);
	</script>
        
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h4>平台注册用户数</h4>
      <p class="blueword">22361</p>
    </div>
    <div class="card">
      <h4>望远镜时间申请</h4>
      <div class="cardterm">
        <b>获取国际望远镜观测计划</b>
        <p>有效申请数</p>
        <p class="blueword">411</p>
        <p>用户数&nbsp&nbsp&nbsp328</p>
      </div>
      <div class="cardterm">
        <b>获取国际望远镜观测计划</b>
        <p>有效申请数</p>
        <p class="blueword">411</p>
        <p>用户数&nbsp&nbsp&nbsp328</p>
      </div>
      <div class="cardterm" style="border-bottom-style:none">
        <b>获取国际望远镜观测计划</b>
        <p>有效申请数</p>
        <p class="blueword">411</p>
        <p>用户数&nbsp&nbsp&nbsp328</p>
      </div>
    </div>
    <div class="card">
      <h4>云节点</h4>
      <div class="cardterm">
        <b>紫金山天文台</b>
        <p>虚拟机数量</p>
        <p class="blueword">9</p>
        <p>模板数量&nbsp&nbsp&nbsp1</p>
        <p>总存储容量&nbsp&nbsp&nbsp0.48TB</p>
      </div>
      <div class="cardterm">
        <b>国家天文台</b>
        <p>虚拟机数量</p>
        <p class="blueword">815</p>
        <p>模板数量&nbsp&nbsp&nbsp84</p>
        <p>总存储容量&nbsp&nbsp&nbsp74.76TB</p>
      </div>
      <div class="cardterm" style="border-bottom-style:none">
        <b>南京大学</b>
        <p>虚拟机数量</p>
        <p class="blueword">7</p>
        <p>模板数量&nbsp&nbsp&nbsp6</p>
        <p>总存储容量&nbsp&nbsp&nbsp0.48TB</p>
      </div>
    </div>
  </div>
</div>


<div class="footer">
  <h2>感谢支持中国虚拟天文台</h2>
</div>

</body>
</html>
