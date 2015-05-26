<?php
        include_once('DataAccess.php');
        $da = new DataAccess();
        $res = $da->getTiposAutos();
?>


<div class="large-70 pull-right">
	<table class="ink-table bordered alternating hover">
		<thead>
			<tr>
				<th class='content-center' colspan='2'>Criar Auto</th>				
			</tr>
		</thead>
		<tbody>
		<?php		
			while($row = mysql_fetch_assoc($res)){		
				echo "<tr>
						<td>".$row['tipo']."</td>
						<td align='center'>
							<a href='".$row['url'].".php'><input type='button' value='Criar' class='ink-button'/></a>
						</td>
					</tr>";
			}
		?>
		</tbody>
	</table>
</div>