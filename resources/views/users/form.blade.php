<div class="form-group">
	<label for="nip">Nomor Induk Pegawai (NIP)</label>
	<input type="text" name="nip" class="form-control" id="nip" placeholder="Input NIP tanpa spasi">
</div>
<div class="form-group">
	<label for="nama_lengkap">Nama Lengkap</label>
	<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
</div>
@if('<input type="text" name="status" id="status" value="">' == '')
<div class="form-group">
	<label for="status_admin">Status Admin</label>
  <small class="text-muted"><i>Default : user</i></small>
	<select class="form-control" name="status_admin" id="status_admin">
		<option value="0" disabled selected>Pilih Status User</option>
		<option value="user">User</option>
		<option value="administrator">Administrator</option>
	</select>
</div>
@endif
<div class="form-group">
	<label for="email">Email</label>
  <small class="text-muted"><i>Default : nip@rskk.com</i></small>
	<input type="email" name="email" class="form-control" id="email" value="nip@rskk.com" readonly>
</div>
<div class="form-group">
	<label for="email">Password</label>
  <small class="text-muted"><i>Default : 123456</i></small>
	<input type="password" name="password" class="form-control" id="password" value="123456" readonly>
</div>
