<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的收益</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="./js/echarts..js"></script>
		<style>
			section{
        margin:0 10px;
      }
		</style>
	</head>
	<body>
      <div class="page_title">
        <h2 class="fl">我的收益</h2>
      </div>
      <section>
      		<table class="table">
      			<tr>
      				<th>场馆</th>
      				<th>办卡收益</th>
      				<th>场地收益</th>
      				<th>客流量收益</th>
      				<th>课程收益</th>
      				<th>总收益</th>
      				<th>操作</th>
      			</tr>
      			<tr>
      				<td>152622</td>
      				<td></td>
      				<td></td>
      				<td></td>
      				<td></td>
      				<td></td>
      				<td></td>
      			</tr>
      		</table>
          <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
          <div id="main" style="width: 600px;height:400px;"></div> 
          <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));

            // 指定图表的配置项和数据
            option = {
                title : {
                    text: '场馆收益图',
                    subtext: '来源场馆数据',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ['办卡收益','场地收益','客流量收益','课程收益']
                },
                series : [
                    {
                        name: '各收益比例',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[
                            {value:335, name:'办卡收益'},
                            {value:310, name:'场地收益'},
                            {value:234, name:'客流量收益'},
                            {value:135, name:'课程收益'}
                            // {value:1548, name:'总收益'}
                        ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>           
     </section>
    </form>
	
		
		
	</body>
</html>
