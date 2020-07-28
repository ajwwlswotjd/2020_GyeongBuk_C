<div class="row">
			<div class="col-6 mt-5">
				<h4>부스 지도</h4>
				<canvas width="400" height="400" id="map"></canvas>
			</div>
			<div class="col-6 mt-5">
				<form method="POST" onsubmit="return false;">
					<h4>정보 입력 폼</h4>
					<div class="form-group">
						<label for="info_name">부스 이름</label>
						<input type="text" class="form-control" id="info_name">
					</div>
					<div class="form-group">
						<label for="info_price">부스 이용료</label>
						<input type="number" class="form-control" id="info_price">
					</div>
					<div class="form-group">
						<label for="info_age">추천 연령대</label>
						<select multiple class="form-control" id="info_age" style="height: 160px;">
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
						<select class="form-control" id="info_gender">
							<option value="male">남성</option>
							<option value="female">여성</option>
						</select>
					</div>
					<div class="form-group">
						<label for="info_locate">부스 위치</label>
						<input type="text" class="form-control" id="info_locate" readonly>
					</div>
					<button type="submit" class="btn btn-primary">제출</button>
				</form>
			</div>
		</div>