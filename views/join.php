<script src="js/JoinApp.js"></script>
<div class="row join_btn_box mt-5">
	<div data-target="common" class="join_btn btn-lg btn btn-primary mr-2">일반 회원</div>
	<div data-target="biz" class="join_btn btn-lg btn btn-info">BIZ 회원</div>
</div>
<form onsubmit="return common_join();" method="POST" action="/join/common" class="join_form" id="common">
	<h1 class="mt-5">일반회원 회원가입</h1>
	<div class="form-group">
		<label for="join_id">아이디</label>
		<input type="text" class="form-control" id="join_id" required name="id">
		<small class="from-text">5~16자 사이 영소문자와 숫자로 구성</small>
	</div>
	<div class="form-group">
		<label for="join_pwd">비밀번호</label>
		<input type="password" class="form-control" id="join_pwd" required name="pwd">
		<small class="from-text">8자 이상 영대문자와 숫자, 특수문자로 구성</small>
	</div>
	<div class="form-group">
		<label for="join_pwd2">비밀번호 확인</label>
		<input type="password" class="form-control" id="join_pwd2" required name="
		pwd2">
		<small class="from-text">비밀번호와 일치</small>
	</div>
	<div class="form-group">
		<label for="join_name">이름</label>
		<input type="text" class="form-control" id="join_name" required name="name">
		<small class="from-text">2~6자 사이 한글로 구성</small>
	</div>
	<div class="form-group">
		<label for="join_gender">성별</label>
		<select class="form-control" id="join_gender" required name="gender">
			<option value="male">남성</option>
			<option value="female">여성</option>
		</select>
	</div>
	<div class="form-group">
		<label for="join_age">연령대</label>
		<select class="form-control" id="join_age" required name="age">
			<option value="10">10대</option>
			<option value="20">20대</option>
			<option value="30">30대</option>
			<option value="40">40대</option>
			<option value="50">50대</option>
			<option value="60">60대</option>
			<option value="70">70대</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">회원가입</button>
</form>

<form method="POST" action="/join/biz" class="join_form" id="biz" onsubmit="return biz_join();">
	<h1 class="mt-5">BIZ 회원 회원가입</h1>
	<div class="form-group">
		<label for="biz_id">아이디</label>
		<input type="text" class="form-control" id="biz_id" required name="id">
		<small class="from-text">5~16자 사이 영소문자와 숫자로 구성</small>
	</div>
	<div class="form-group">
		<label for="biz_pwd">비밀번호</label>
		<input type="password" class="form-control" id="biz_pwd" required name="pwd">
		<small class="from-text">8자 이상 영대문자와 숫자, 특수문자로 구성</small>
	</div>
	<div class="form-group">
		<label for="biz_pwd2">비밀번호 확인</label>
		<input type="password" class="form-control" id="biz_pwd2" required name="pwd2">
		<small class="from-text">비밀번호와 일치</small>
	</div>
	<div class="form-group">
		<label for="biz_name">상호</label>
		<input type="text" class="form-control" id="biz_name" required name="name">
	</div>
	<div class="form-group">
		<label for="biz_number">사업자 등록번호</label>
		<input type="text" class="form-control" id="biz_number" required name="number" maxlength="12">
		<small class="from-text">000-00-00000 형태 유지</small>
	</div>
	<div class="form-group">
		<label for="biz_lv">타입</label>
		<select class="form-control" id="biz_lv" required name="type">
			<option value="0">브론즈</option>
			<option value="1">실버</option>
			<option value="2">골드</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">회원가입</button>
</form>