class AttendApp {
	constructor(){

		this.init();
	}

	init(){
		this.addEvent();
	}

	addEvent(){
		$(".btn-fx").on("click", this.booth_fx);
	}

	booth_fx = e => {
		let idx = e.target.dataset.idx;
		let fx = e.target.dataset.fx;
		
		let data = {};
		data.idx = idx;
		let link = `/reserve/${fx}`;
		$.ajax({
			data:data,
			url: link,
			method : "POST",
			success : this.fx_result
		});
	}

	fx_result = e => {
		location.reload();
	}

}

window.addEventListener("load",()=>{
	let attendApp = new AttendApp();
});