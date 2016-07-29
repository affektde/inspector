<?php 
	$sql = $collectors['SQLs']['items'];
	//dd($sql);
$i=0; ?>
<div class="container-fluid inspector-panel" id='panel-SQLs'>
	@foreach($sql['items'] as $item)		
	<div style="border:1px solid #ddd; box-shadow: 0px 0px 2px #ccc;">
		<div style="border-bottom:1px solid #ddd; padding:5px">
			<?php $i++;?>
			<span class="badge badge-info">{{$i}}</span>&nbsp; 
			<code>{{$item['time']}}ms {{round($item['time']*100/$sql['time'],2)}}%</code>
			<span class="label label-info pull-right" style="font-size:14px">{{$item['connection'] }}</span>
		</div>
		
		<div>	
			<div style="padding:15px 5px 5px 5px">
				<pre style="background: #fff; color: #c7254e; font-size:15px;border:0">{{$item['sql']}}</pre>
			</div>
			<div style="padding:5px; border-top:1px solid #ddd;background-color: #fafafa" >
				@foreach($item['files'] as $file)
					<strong>{{$file['fileName']}} #{{$file['line']}}</strong><span>
					&nbsp;
						@if(isset($file['tag']) && $file['tag']=='my code')
							<span style="margin-left:5px;font-size:11px;position: relative; top: -1px" class="label label-danger">MY CODE</span>
						@endif
						@if(isset($file['tag']) && $file['tag']=='vendor')
							<span style="margin-left:5px;font-size:11px;position: relative; top: -1px" class="label label-warning">VENDOR</span>
						@endif
						<pre style="background: #fafafa; border:0">{!! $file['src'] !!}</pre>		
					
					
				@endforeach
			</div>	
		</div>

	</div>
	<br>

	@endforeach

</div>