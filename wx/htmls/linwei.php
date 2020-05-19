<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>天文数据---表格与饼状图显示</title>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
</head>

   <body>
    <table border="1" align="center" bgcolor="F166E7">
	<caption> AO data </caption>
        <tr>
		    <th> 序号 </th>
			<th> 名称 </th>
			<th> 百分比 </th>
        </tr>	    
		<tr>
		    <td> 1</td>
			<td> 怀柔太阳磁场望远镜数据集 </td>
			<td> 3.6 </td>
		</tr>
		<tr>
		    <td> 2</td>
			<td> 中国SONG项目1米望远镜 </td>
			<td> 2.2 </td>
		</tr>
		<tr>
		    <td> 3</td>
			<td> 中国天文底片库 </td>
			<td> 31.3 </td>
		</tr>
		<tr>
		    <td> 4 </td>
			<td> 南银冠U波段巡天数据集 </td>
			<td> 24.1 </td>
		</tr>
		<tr>
		    <td> 5</td>
			<td> 丽江2.4米望远镜数据集 </td>
			<td> 13.3 </td>
		</tr>
		<tr>
		    <td> 6</td>
			<td> SAGE银河系巡天 </td>
			<td> 9.7 </td>
		</tr>
		<tr>
		    <td> 7</td>
			<td> 兴隆80cm望远镜 </td>
			<td> 3.7 </td>
		</tr>
		<tr>
		    <td> 8 </td>
			<td> 怀柔太阳射电望远镜数据集 </td>
			<td> 4.9</td>
		</tr>
		<tr>
		    <td> 9</td>
			<td> 兴隆2.16米望远镜数据集 </td>
			<td> 3.2</td>
		</tr>
		<tr>
		    <td> 10 </td>
			<td> BATC大视场多色巡天数据集 </td>
			<td> 3.9</td>
		</tr>
	</table>
	</br>
	</br>
	</br>
	</br>
   
   <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
<script language="JavaScript">
$(document).ready(function() {  
   var chart = {
       plotBackgroundColor: null,
       plotBorderWidth: null,
       plotShadow: false
   };
   var title = {
      text: '天文台数据集'   
   };      
   var tooltip = {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
   };
   var plotOptions = {
      pie: {
		
         allowPointSelect: true,
         cursor: 'pointer',
         dataLabels: {
            enabled: true,
            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
            style: {
               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
         }
      }
   };
   
   var series= [{
      type: 'pie',
      name: 'VO_data',
      data: [
         ['怀柔太阳磁场望远镜数据集', 3.6],
         ['中国SONG项目1米望远镜', 2.2],
         {
            name: '中国天文底片库',
            y: 31.3,
            sliced: true,
            selected: true
         },
         ['南银冠U波段巡天数据集',  24.1],
         ['丽江2.4米望远镜数据集',  13.3],
         ['SAGE银河系巡天',  9.7],
		 ['兴隆80cm望远镜' , 3.7],
		 ['怀柔太阳射电望远镜数据集',  4.9],
		 ['兴隆2.16米望远镜数据集',  3.2],
		 ['BATC大视场多色巡天数据集',  3.9]
      ]
   }];     
   var json = {};   
   json.chart = chart; 
   json.title = title;     
   json.tooltip = tooltip;  
   json.series = series;
   json.plotOptions = plotOptions;
   $('#container').highcharts(json);  
});
		
</script>
</body>
</html>
