let joinApp = null;

class JoinApp {
	constructor(){

		this.init();

		this.id_pat = /^[a-z0-9]{5,16}$/;
		this.pwd_pat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^0-9a-zA-Z]).{8,}$/;
		this.name_pat = /^[가-힣]{2,6}$/;

	}

	init(){
		this.addEvent();
		
	}

	addEvent(){
		$(".join_btn").on("click", this.btnClick);
		$(biz_number).on("input", this.numberInput);
	}

	numberInput = e => {
		let number = e.target.value.replace(/[^\d+$]/g,"");
		number = number.replace(/(\d{3})(\d{2})(\d{5})/,'$1-$2-$3');
		e.target.value = number;
	}

	btnClick = e => {
		let target = e.target.dataset.target;
		$(".join_btn").remove();
		$(`#${target}`).fadeIn();
	}

	biz_validate(){
		let id = $(biz_id).val();
		let pwd = $(biz_pwd).val();
		let pwd2 = $(biz_pwd2).val();
		let number = $(biz_number).val();

		if(!this.id_pat.test(id)){
			alert("아이디 형식 안마즘");
			return false;
		}
		if(!this.pwd_pat.test(pwd)){
			alert("비밀번호 형식 안마즘");
			return false;
		}
		if(pwd !== pwd2){
			alert("비밀번호 확인 안똑가틈");
			return false;	
		}

		if(number.length != 12){
			alert("사업자 등록번호 똑바로 입력하셈");
			return false;		
		}

		return true;
	}

	common_validate(){
		let id = $(join_id).val();
		let pwd = $(join_pwd).val();
		let pwd2 = $(join_pwd2).val();
		let name = $(join_name).val();
		
		if(!this.id_pat.test(id)){
			alert("아이디 형식 안마즘");
			return false;
		}
		if(!this.pwd_pat.test(pwd)){
			alert("비밀번호 형식 안마즘");
			return false;
		}
		if(pwd !== pwd2){
			alert("비밀번호 확인 안똑가틈");
			return false;	
		}
		if(!this.name_pat.test(name)){
			alert('이름이 잘못댐');
			return false;
		}

		return true;
	}
}

window.addEventListener("load",()=>{
	joinApp = new JoinApp();
});

function common_join(){
	return joinApp.common_validate();
}

function biz_join(){
	return joinApp.biz_validate();
}
