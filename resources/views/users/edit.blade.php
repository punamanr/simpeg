<div class="form-group">
	<label for="nip">Nomor Induk Pegawai (NIP)</label>
	<input type="text" name="nip" class="form-control" id="nip" placeholder="Input NIP tanpa spasi" required>
</div>
<div class="form-group">
	<label for="name">Nama Lengkap</label>
	<input type="text" name="name" class="form-control" id="nama_lengkap" required>
</div>
<div class="form-group">
	<label for="status">Status Admin</label>
  <small class="text-muted"><i>Default : user</i></small>
	<select class="form-control" name="status" id="status">
		<option value="0" disabled selected>Pilih Status User</option>
		<option value="user">User</option>
		<option value="administrator">Administrator</option>
	</select>
</div>
<div class="form-group">
	<label for="email">Password</label>
  <small class="text-muted"><i>Penting : Kosongkan jika tidak ingin mengganti password!</i></small>
	<input type="password" name="password" class="form-control" id="password">
</div>
