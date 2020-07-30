<h1 class="mt-5">로그인</h1>
<form method="POST" action="/login/process">
	<div class="form-group">
		<label for="login_id">아이디</label>
		<input type="text" class="form-control" id="login_id" name="id" required>
	</div>
	<div class="form-group">
		<label for="login_pwd">비밀번호</label>
		<input type="password" class="form-control" id="login_pwd" name="pwd" required>
	</div>
	<button type="submit" class="btn btn-primary">로그인</button>
</form>

<a href="/join" class="btn btn-info mt-4">회원가입</a>