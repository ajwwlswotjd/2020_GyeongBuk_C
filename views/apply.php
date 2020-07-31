<script src="/js/BoothApplyApp.js"></script>
<script>document.querySelectorAll(".nav-link")[2].classList.add("active");</script>
<div class="popup booth_list_popup">
	<div class="popup_container booth_list_container">
		<div class="div-wrapper">
			<table class="table" >
				<thead align="center">
					<tr>
						<th scope="col" width="25%">이름</th>
						<th scope="col" width="35%">부스</th>
						<th scope="col" width="10%">연령대</th>
						<th scope="col" width="10%">성별</th>
						<th scope="col" width="20%">신청 상태</th>
					</tr>
				</thead>
				<tbody align="center">
					<tr>
						<td scope="row">정재성</td>
						<td>탑1차타워</td>
						<td>10대</td>
						<td>남</td>
						<td>승인 대기</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-6 mt-5">
			<h4>부스 지도</h4>
			<canvas width="400" height="400" id="map"></canvas>
		</div>
		<div class="col-6 mt-5">
			<form method="POST" action="/booth/apply" onsubmit="return apply_submit();">
				<h4>정보 입력 폼</h4>
				<input type="hidden" id="info_position">
				<div class="form-group">
					<label for="info_name">부스 이름</label>
					<input type="text" class="form-control" id="info_name" name="name" required>
				</div>
				<div class="form-group">
					<label for="info_price">부스 이용료</label>
					<input type="number" class="form-control" id="info_price" name="price" required min="0">
				</div>
				<div class="form-group">
					<label for="info_age">추천 연령대</label>
					<select multiple class="form-control" id="info_age" style="height: 160px;" name="age" required>
						<option value="10">10대</option>
						<option value="20">20대</option>
						<option value="30">30대</option>
						<option value="40">40대</option>
						<option value="50">50대</option>
						<option value="60">60대</option>
						<option value="70">70대</option>
					</select>
				</div>
				<div class="form-group">
					<label for="info_gender">추천 성별</label>
					<select class="form-control" id="info_gender" name="gender">
						<option value="male">남성</option>
						<option value="female">여성</option>
					</select>
				</div>
				<div class="form-group">
					<label for="info_locate">부스 위치</label>
					<input type="text" class="form-control" id="info_locate" readonly name="position" required>
				</div>
				<button type="submit" class="btn btn-primary">제출</button>
			</form>
		</div>
	</div>

	<script>
		let type = <?= $_SESSION['user']->type ?>;
	</script>