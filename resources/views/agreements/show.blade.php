<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Kalkulasi Textbox Secara Otomatis Di HTML, PHP, Dan JQuery</title>
                <link href="assets/css/bootstrap.css" rel="stylesheet">
<!--kalian bisa download file jquery dan masukkan ke dalam folder assets/js/-->
 <!--atau bisa juga masukkan script berikut ini bila anda terhubung ke dalam internet tanpa harus mendownloadnya-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
 
<body>
<legend class="text-success"><?php echo 'Kalkulasi Textbox Secara Otomatis Di HTML, PHP, Dan JQuery';?></legend>
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-lg-3 control-label">Qty</label>
<div class="col-lg-3">
<input type="number" step="any" min="0" name="volume" id="volume" class="form-control"></div>
</div>
<div class="form-group">
<label class="col-lg-3 control-label">Satuan</label>
<div class="col-lg-3">
<input type="text" name="satuan" class="form-control"></div>
</div>
<div class="form-group">
<label class="col-lg-3 control-label">Harga Satuan</label>
<div class="col-lg-3">
<input type="number" step="any" min="0" name="harga" id="harga" class="form-control"></div>
</div>
<div class="form-group">
<label class="col-lg-3 control-label">Jumlah Total</label>
<div class="col-lg-3">
<input type="text" name="jumlah" id="jumlah" class="form-control" Readonly></div>
</div>
</form>
</body>
</html>
 
<script type="text/javascript">
 $("#volume").keyup(function(){
 total = $("#volume").val()* $("#harga").val();
 $("#jumlah").val(total);
 });
 
$("#harga").keyup(function(){
 total = $("#volume").val()* $("#harga").val();
 $("#jumlah").val(total);
 });
 
</script>