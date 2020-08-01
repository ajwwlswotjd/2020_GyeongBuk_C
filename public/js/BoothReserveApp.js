let boothReserveApp;
class BoothReserveApp {

	constructor(boothList){
		this.boothList = boothList;
		this.unReservedBoothList = booths.slice(0,3);
		this.canvas = document.querySelector("#map");
		this.ctx = this.canvas.getContext("2d");
		this.width = this.canvas.width;
		this.height = this.canvas.height;
		this.size = this.width/10;
		this.userColor = randomRGBColor();
		this.init();
	}

	init(){
		this.friendList = [];
		this.ctxFormat();
		this.mapLoading();
		this.addEvent();
	}

	ctxFormat(){
		this.ctx.textBaseline = "middle";
		this.ctx.textAlign = 'center';
		this.ctx.font = "12px Arial";
	}

	addEvent(){
		$(this.canvas).on("click",this.canvasClick);
		$("#btn_attend_step_2").on("click", this.friend_popup);
		$("#friend_close_btn").on("click", this.friend_close);
		$("#friend_add_btn").on('click', this.friend_add);
		$("#auto_btn").on('click', this.showAutoBooth);
		$("#auto_reserve_btn").on("click", this.autoReserve);
	}

	autoReserve = e => {
		let list = JSON.stringify(this.unReservedBoothList,null,0);
		let data = {};
		data.list = list;
		$.ajax({
			data:data,
			url:"/booth/reserve/auto",
			method:"POST",
			success : this.autoReserveResult
		});
	}

	autoReserveResult = e => {
		alert("자동부스 신청이 완료되었습니다.");
		location.reload();
	}

	showAutoBooth = e => {
		this.unReservedBoothList.forEach(x=>{
			let card = this.makeAutoCard(x);
			$('.auto_list').append(card);
		});
		$("#auto_reserve_btn").show();
	}

	makeAutoCard(booth){
		let div = document.createElement("div");
		$(div).addClass('card');
		$(div).addClass('col-4');
		$(div).html(`
			<h5 class="card-title mt-3">${booth.name}</h5>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">부스 위치 : ${booth.position}</li>
				<li class="list-group-item">추천 연령대 : ${booth.age}</li>
				<li class="list-group-item">추천 성별 : ${booth.gender}</li>
			</ul>
		`);
		return div;
	}

	friend_add = (e)=> {

		if(this.friendList.length >= 5){
			alert("친구는 최대 5명까지");
			return;
		}

		let id = $(friend_add_input).val().trim();
		let find = this.friendList.find(x=> {return id == x});
		if(find !== undefined){
			alert("이미 추가한 사람임");
			return;
		}

		$.ajax({
			data:{"id":id},
			url:"/friend/find",
			method:"POST",
			success : this.friend_find
		});
	}

	friend_find = (e)=> {
		let json = JSON.parse(e);
		let result = json.result;
		if(!result){
			alert("존재하지 않는 아이디 이거나, 사용자의 아이디와 같습니다.");
			return;
		} else {
			let name = json.name;
			this.friendList.push($(friend_add_input).val());
			$(".friend_list").append(`<p>${name}</p>`);
		}
	}

	friend_popup = (e)=> {
		$('.friend_popup').fadeIn();
	}

	friend_close = (e)=> {
		$('.friend_popup').fadeOut();
	}

	canvasClick = e =>{

		let x = Math.floor(e.offsetX/this.size)+1;
		let y = Math.floor(e.offsetY/this.size)+1;
		// log(this.boothList);
		
		let item = null;
		this.boothList.forEach(booth=> {
			let find = booth.postList.find(post=>{
				return post[0] == x && post[1] == y;
			});
			if(find !== undefined) item = booth;
		});
		if(item !== null){
			document.querySelector("#info_name").value = item.name;
			document.querySelector("#booth_idx").value = item.idx;
			document.querySelector("#info_price").value = item.price.toLocaleString();
			document.querySelector("#btn_attend_step_1").style.display = "block";
			document.querySelector("#btn_attend_step_2").style.display = "block";
			document.querySelector("#btn_attend_step_3").style.display = "block";
		}


	}

	mapLoading(){
		this.ctx.clearRect(0,0,this.width,this.height);
		for(let y = 0; y < this.width; y++){
			for(let x = 0; x < this.height; x++){
				this.strokeRect(x,y);
			}
		}
		this.boothList.forEach(booth=> this.drawBooth(booth));
	}

	strokeRect(x,y,color = "#a7a7a7"){
		this.ctx.strokeStyle = color;
		this.ctx.strokeRect(x * this.size, y * this.size, this.size,this.size);;
	}

	fillRect(x,y,color = "#a7a7a7"){
		this.ctx.fillStyle = color;
		this.ctx.fillRect(x * this.size, y * this.size, this.size,this.size);;
	}	

	drawBooth(booth){
		let y = booth.position.split(",")[1]-1;
		let posts = booth.postList;
		posts.forEach(post=>{
			let x = post[0]-1;
			let y = post[1]-1;
			this.fillRect(x,y,booth.backColor);
		});

		let firstX = (posts[0][0]-1) * this.size;
		let lastX = (posts[posts.length-1][0]-1) * this.size;
		let center = firstX + ((lastX + this.size) - firstX) / 2;
		this.ctx.fillStyle = booth.fontColor;
		this.ctx.fillText(booth.name,center,y * this.size + this.size/2);
	}

	reserve_submit(){
		this.friendList.push(user_id.value);
		let list = JSON.stringify(this.friendList,null,0);
		let data = {};
		data.list = list;
		data.idx = booth_idx.value;
		$.ajax({
			data:data,
			method:"POST",
			url:"/friend/reserve",
			success : this.friend_result
		});

	}

	friend_result = e => {
		let json = JSON.parse(e);
		let result = json.result;
		if(!result){
			alert("이미 누가 신청했음 ㅋㅋ;");
			return;
		} else {
			alert("신청 완뇨 ㅋㅋ;");
			location.reload();
		}


	}
}


window.addEventListener("load",()=>{

	// fetch('js/booth.json').then(res=> {return res.json()}).then(json=>{
	// 	boothReserveApp = new BoothReserveApp(json.map(x=>{return new Booth(x.lv,x.name,x.position,x.price)}));
	// });
	boothReserveApp = new BoothReserveApp(list.map(x=>{return new Booth(x.idx,x.type,x.name,x.position,x.price)}));

});

class Booth {
	constructor(idx,lv,name,position,price){
		this.idx = idx;
		this.lv = lv*1;
		this.name = name;
		this.position = position;
		this.price = price*1;
		this.postList = [];
		for(let i = 0; i <= this.lv; i++){
			let x = this.position.split(",")[0]*1;
			let y = this.position.split(",")[1]*1;
			this.postList.push([x+i,y]);
		}
		this.backColor = randomRGBColor();
		this.fontColor = reversedRGBColor(this.backColor);
	}
}

function randomRGBColor(){
	// return `rgb(${Math.floor(Math.random()*256)},${Math.floor(Math.random()*256)},${Math.floor(Math.random()*256)})`;
	return `rgb(${Math.floor(Math.random()*56+200)},${Math.floor(Math.random()*56+200)},${Math.floor(Math.random()*56+200)})`;
}

function reversedRGBColor(rgb){
	// let colors = rgb.split(",").map(x=> 255 - x.replace(/[^\d+$]/g,"")*1);
	// return `rgb(${colors[0]},${colors[1]},${colors[2]})`;
	return `rgb(0,0,0)`;
}


function reserve_submit(){
	boothReserveApp.reserve_submit();
	return false;
}
