<div class="container-fluid">
    
<div class="card">
  <div class="card-header"> Detail Menu</div>
  <div class="card-body">

    <?php foreach ($menu as $mn): ?>

    <div class="row">
        <div class="col-md-4">  
        	<img src="<?php echo base_url().'/menu
        	/'.$mn->foto_menu ?>" class="card-img-top">

	 </div>
	<div class="col-md-8"> 
    <table class="table">
    	<tr>
    		<td>Nama Menu</td>
    		<td><strong><?php echo $mn->nama_menu ?></strong></td>
    	</tr>
    	<tr>
    		<td>Harga</td>
    		<td><strong><div class="btn btn-sm btn-success"> <?php echo $mn->harga ?></div></strong></td>
    	</tr>
    	<tr>
    		<td>Kategori</td>
    		<td><strong><div class="btn btn-sm btn-primary"> <?php echo $mn->kategori ?></div></strong></td>
    	</tr>


    	<tr>
    		<td>Keterangan</td>
    		<td><strong><?php echo $mn->keterangan ?></strong></td>
    	</tr>
    	
    </table>
    </div>
	<?php endforeach; ?>

 		</div>
	</div>

</div>